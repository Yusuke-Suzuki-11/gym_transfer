<?php

namespace App\Http\Controllers;

use App\Mail\LessonTransferNotification;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Support\Facades\Mail;
use Symfony\Contracts\Service\Attribute\Required;

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
		return view('teacher.student.edit') > with(['StudentRow' => $StudentRow, 'CourseRowset' => $CourseRowset]);
	}

	public function update($id, Request $request)
	{
		$StudentRow = Student::find($id);

		$fullName = $request->last_name . ' ' . $request->first_name;

		$StudentRow->last_name = $request->last_name;
		$StudentRow->first_name = $request->first_name;
		$StudentRow->full_name = $fullName;
		$StudentRow->phone = $request->phone;
		$StudentRow->email = $request->email;
		$StudentRow->birthday = $request->birthday;
		$StudentRow->member_num = $request->member_num;
		$StudentRow->stress_point = $request->stress_point;
		$StudentRow->gender = $request->gender;
		$StudentRow->save();

		$StudentRow->getCourseRowsetByRowset()->attach($request->course_id);

		Mail::to('mr.suzuki.11@gmail.com')->send(new LessonTransferNotification($StudentRow->full_name));

		return redirect(route('tc.student.show', ['id' => $StudentRow->id]));
	}

	public function add()
	{
		return view('teacher.student.add');
	}

	public function axios_search(Request $request)
	{
		$StudentInstans = new Student();
		$data = $StudentInstans->getStudentRowsetForSearch($request->query('name'), $request->query('dayOfWeek'), $request->query('gender'), $request->query('grade'), $request->query('transfer'));
		return $data;
	}
}
