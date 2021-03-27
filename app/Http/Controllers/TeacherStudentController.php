<?php

namespace App\Http\Controllers;

use App\Library\Utility;
use App\Mail\LessonTransferNotification;
use App\Mail\StudentRegister;
use App\Models\Bar;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Course;
use App\Models\Floor;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\VaultingHourse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class TeacherStudentController extends Controller
{
	public function index()
	{
		$GradeInstans = new Grade();
		$gender = config('const.STUDENTS.GENDER_TYPE');
		$formItem = [
			'dayOfWeekSelect' => config('const.DAY_OF_WEEK'),
			'gradeSelect' => $GradeInstans->getGradeNameForSearchForm(),
			'gender' => $gender,
		];
		$StudentInstans = new Student();
		return view('teacher.student.index')->with(['Students' => json_encode($StudentInstans->getStudentAllForJson()), 'formItemJson' => json_encode($formItem)]);
	}

	public function show($id)
	{
		$StudentRow = Student::find($id);
		if (empty($StudentRow)) {
			return App::abort(404);
		}
		return view('teacher.student.show')->with(['StudentRow' => $StudentRow]);
	}

	public function edit($id)
	{
		$StudentRow = Student::find($id);
		$CourseRowset = Course::all();
		return view('teacher.student.edit')->with(['StudentRow' => $StudentRow, 'CourseRowset' => $CourseRowset]);
	}

	public function update($id, Request $request)
	{
		$rules = [
			'first_name' => [
				'required',
				'max:100',
				// 'string'
			],
			'last_name' => [
				'required',
				'max:100',
				'string',
			],
			'email' => [
				'required',
				'email',
				'max:100',
			],
			'birthday' => [
				'required',
				'date',
			],
			'gender' => [
				'required',
				'integer',
				'max:2',
				'min:1',
			],
			'phone' => [
				'required',
				'phone',
			],
			'course_id' => [
				'required',
				'integer',
				Rule::exists('courses', 'id'),
			],
		];
		$this->validate($request, $rules);

		$phone = $this->utility->formatNoHyphenPhoneNum($request->phone);


		$this->validate($request, $rules);

		$StudentRow = Student::find($id);

		$fullName = $request->last_name . ' ' . $request->first_name;
		$StudentRow->last_name = $request->last_name;
		$StudentRow->first_name = $request->first_name;
		$StudentRow->full_name = $fullName;
		$StudentRow->phone = $phone;
		$StudentRow->email = $request->email;
		$StudentRow->birthday = $request->birthday;
		$StudentRow->member_num = $request->member_num;
		$StudentRow->stress_point = $request->stress_point;
		$StudentRow->gender = $request->gender;
		$StudentRow->save();

		$StudentRow->getCourseRowsetByRowset()->attach($request->course_id);

		Mail::to('mr.suzuki.11@gmail.com')->send(new LessonTransferNotification($StudentRow->full_name));

		return redirect(route('tc.student.show', ['id' => $StudentRow->id]))->with();
	}

	public function add()
	{
		$bar = new Bar();
		$floor = new Floor();
		$vaulting = new VaultingHourse();
		return view('teacher.student.add')->with([
			'CourseRowset' => Course::all(),
			'barData' => $bar->getRowsetForStudentAdd(),
			'floorData' => $floor->getRowsetForStudentAdd(),
			'vaultingData' => $vaulting->getRowsetForStudentAdd(),
		]);
	}

	public function axios_search(Request $request)
	{
		$StudentInstans = new Student();
		$data = $StudentInstans->getStudentRowsetForSearch($request->query('name'), $request->query('dayOfWeek'), $request->query('gender'), $request->query('grade'), $request->query('transfer'));
		return $data;
	}

	public function register_student(Request $request)
	{
		$rules = [
			'firstName' => [
				'required',
				'max:100',
				// 'string'
			],
			'lastName' => [
				'required',
				'max:100',
				'string',
			],
			'email' => [
				'required',
				'email',
				'max:100',
			],
			'birthYear' => [
				'required',
			],
			'birthMonth' => [
				'required',
			],
			'birthDay' => [
				'required',
			],
			'gender' => [
				'required',
				'integer',
				'max:2',
				'min:1',
			],
			'phone' => [
				'required',
				'phone',
			],
			'courseId' => [
				'required',
				'integer',
				Rule::exists('courses', 'id'),
			],
			'bar' => [
				'required',
				'integer',
				Rule::exists('bars', 'id'),
			],
			'floor' => [
				'required',
				'integer',
				Rule::exists('floors', 'id'),
			],
			'vaulting' => [
				'required',
				'integer',
				Rule::exists('vaulting_hourses', 'id'),
			],
		];
		$this->validate($request, $rules);

		$utility = new Utility();
		$phone = $utility->formatNoHyphenPhoneNum($request->phone);
		$StudentRow = new Student();
		$lastName = $request->lastName;
		$firstName = $request->firstName;
		$password = $utility->makePass();
		$birthDay = implode('-', [$request->birthYear, $request->birthMonth, $request->birthDay]);
		$StudentRow->fill(
			[
				'first_name' => $firstName,
				'last_name' => $lastName,
				'full_name' => $fullName = Utility::makeFullName($lastName, $firstName),
				'email' => $email = $request->email,
				'password' => Hash::make($password),
				'member_num' => '11223344',
				'birthday' => $birthDay,
				'gender' => $request->gender,
				'stress_point' => 3,
				'phone' => $phone,
				'bar_id' => $request->bar,
				'floor_id' => $request->floor,
				'vaulting_hourse_id' => $request->vaulting,
			]
		);
		$StudentRow->save();
		$StudentRow->createCourseStudentRow($request->courseId);

		Mail::to('mr.suzuki.11@gmail.com')
			->send(new StudentRegister($fullName, $email, $password, route('login')));

		$weeks = [
			'Sunday',
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
		];

		foreach ($StudentRow->getCourseRowsetByRowset()->get() as $CourseRow) {
			$targetWeekDate = date('Y-m-d', strtotime('next ' . $weeks[$CourseRow->week_id]));
			$threeLaterMonth = date('m', strtotime($targetWeekDate)) + 3;
			while (date('m', strtotime($targetWeekDate)) <= $threeLaterMonth) {
				$LessonRow = new Lesson();
				$LessonRow->course_id = $CourseRow->id;
				$LessonRow->student_id = $StudentRow->id;
				$LessonRow->lesson_date = $targetWeekDate;
				$LessonRow->save();
				$targetWeekDate = date('Y-m-d', strtotime('+1 week', strtotime($targetWeekDate)));
			}
		}
		return redirect(route('tc.student.show', ['id' => $StudentRow->id]));
	}
}
