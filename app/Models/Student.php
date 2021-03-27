<?php

namespace App\Models;

use App\Library\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class Student extends Authenticatable
{
	use HasFactory;

	private $__name = 'students';

	protected $fillable = [
		'first_name',
		'last_name',
		'full_name',
		'email',
		'password',
		'member_num',
		'birthday',
		'gender',
		'stress_point',
		'phone',
		'bar_id',
		'floor_id',
		'vaulting_hourse_id',
	];

	public function getCourseRowsetByRowset()
	{
		return $this->belongsToMany("App\Models\Course", 'course_student', 'student_id', 'course_id');
	}

	public function getLessonRowset()
	{
		return $this->hasMany('App\Models\Lesson');
	}

	public function getCourseAndLessonTimes()
	{
		$CourseRowset = $this->getCourseRowsetByRowset()->get();

		$courseArray = [];
		foreach ($CourseRowset as $CourseRow) {
			$courseArray[] = [
				'week' => $CourseRow->week()->first()->day_of_week,
				'lessonTime' => $CourseRow->getLessonTimeRowByRow()->first()->lesson_time,
			];
		}
		return $courseArray;
	}

	public function getAliveLessonRowset($month)
	{
		return $this->getLessonRowset()
			->orderBy('lesson_date', 'asc')
			->whereMonth('lesson_date', $month)
			->where('valid', 1)
			->get();
	}

	public function getJsonLessonDateAndTitle()
	{
		$LessonRowset = $this->getLessonRowset()->get();
		if (!isset($LessonRowset)) {
			return '';
		}
		$array = [];
		foreach ($LessonRowset as $LessonRow) {
			$array[] = ['title' => $LessonRow->getLessonTime(), 'date' => $LessonRow->lesson_date];
		}
		return json_encode($array);
	}

	public function getStudentRowsetForSearch($name, $dayOfWeek, $gender, $grade, $transfer)
	{
		$StudentRowset = DB::table($this->__name)
			->join('course_student', $this->__name . '.id', 'course_student.student_id')
			->join('courses', 'course_student.course_id', 'courses.id');
		if (!empty($name)) {
			$StudentRowset = $StudentRowset->where('full_name', 'like', '%' . addcslashes($name, '%_\\') . '%');
		}
		if (isset($gender)) {
			$StudentRowset = $StudentRowset->where('students.gender', $gender);
		}
		if (isset($dayOfWeek)) {
			$StudentRowset = $StudentRowset->where('courses.week_id', $dayOfWeek);
		}
		if (isset($grade)) {
			$StudentRowset = $StudentRowset->where('courses.grade_id', $grade);
		}
		if (isset($transfer)) {
			$StudentRowset = $StudentRowset->where('course_student.transfer_enabled', $transfer);
		}
		$StudentRowset->select('students.id', 'students.last_name', 'students.first_name', 'students.email', 'students.gender', 'students.birthday', 'students.phone');

		$cashList = [];

		$data = [];
		if (!$StudentRowset->get()->isEmpty()) {
			foreach ($StudentRowset->get() as $StudentRow) {
				//TODO::処理時間を考えてin_arrayより良い方法を考える
				if (!in_array($StudentRow->id, $cashList)) {
					$data[] = [
						'id' => $StudentRow->id,
						'lastName' => $StudentRow->last_name,
						'firstName' => $StudentRow->first_name,
						'courseAndLessonTime' => $this->find($StudentRow->id)->getCourseAndLessonTimes(),
						'email' => $StudentRow->email,
						'birthday' => $StudentRow->birthday,
						'gender' => $StudentRow->birthday,
						'phone' => $StudentRow->phone,
						'showUrl' => route('tc.student.show', ['id' => $StudentRow->id])
					];
					$cashList[] = $StudentRow->id;
				}
			}
		} else {
			return '';
		}
		return $data;
	}

	public function getStudentAllForJson()
	{
		$utility = new Utility;
		$StudentRowset = DB::table($this->__name)->select('id', 'last_name', 'first_name', 'email', 'birthday', 'gender', 'phone');
		$data = [];
		if (!$StudentRowset->get()->isEmpty()) {
			foreach ($StudentRowset->get() as $StudentRow) {
				$data[] = [
					'id' => $StudentRow->id,
					'lastName' => $StudentRow->last_name,
					'firstName' => $StudentRow->first_name,
					'courseAndLessonTime' => $this->find($StudentRow->id)->getCourseAndLessonTimes(),
					'email' => $StudentRow->email,
					'birthday' => $utility->getAgeByBirthDay($StudentRow->birthday),
					'gender' => $StudentRow->gender,
					'phone' => $StudentRow->phone,
					'showUrl' => route('tc.student.show', ['id' => $StudentRow->id])
				];
			}
		} else {
			return '';
		}
		return $data;
	}

	public function createCourseStudentRow($courseId)
	{
		DB::table('course_student')
			->insert([
				'student_id' => $this->id,
				'course_id' => $courseId,
			]);
	}

	public function getCourseRowForTransfer($course_id)
	{
		return $this->getCourseRowsetByRowset()->find($course_id);
	}

	public function getLessonDate()
	{
		$LessonDates = [];
		foreach ($this->getLessonRowset()->get() as $LessonRow) {
			$LessonDates[] = $LessonRow->lesson_date;
		}
		return $LessonDates;
	}

	public function getBarRow()
	{
		return $this->belongsTo("App\Models\Bar", 'bar_id');
	}

	public function getBarLevel()
	{
		return $this->getBarRow()->first()->getLevel();
	}

	public function getBarNowPractice()
	{
		return $this->getBarRow()->first()->name;
	}

	public function getFloorRow()
	{
		return $this->belongsTo("App\Models\Floor", 'floor_id');
	}

	public function getFloorLevel()
	{
		return $this->getFloorRow()->first()->getLevel();
	}

	public function getFloorNowPractice()
	{
		return $this->getFloorRow()->first()->name;
	}

	public function getVaultingHourseRow()
	{
		return $this->belongsTo("App\Models\VaultingHourse", 'vaulting_hourse_id');
	}

	public function getVaultingHourseLevel()
	{
		return $this->getVaultingHourseRow()->first()->getLevel();
	}

	public function getVaultingNowPractice()
	{
		return $this->getVaultingHourseRow()->first()->name;
	}

	public function getCourseStudentRow()
	{
		return $this->hasMany("App\Models\CourseStudent");
	}

	public function isTransferEnabled($courseId)
	{
		return $this->getCourseStudentRow()->where('course_id', $courseId)->first()->transfer_enabled;
	}
}
