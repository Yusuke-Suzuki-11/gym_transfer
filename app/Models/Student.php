<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Student extends Authenticatable
{
	use HasFactory;

	private $__name = 'students';

	protected $fillable = [
		'last_name',
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

	public function getStudentRowsetBy($name, $dayOfWeek, $gender, $grade, $transfer)
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

		$StudentRowset->select('students.id', 'students.full_name', 'students.email', 'students.birthday', 'students.phone');

		$data = [];
		if (!$StudentRowset->get()->isEmpty()) {
			foreach ($StudentRowset->get() as $StudentRow) {
				$data[] = [
					'name' => $StudentRow->full_name,
					'courseAndLessonTime' => $this->find($StudentRow->id)->getCourseAndLessonTimes(),
					'email' => $StudentRow->email,
					'gender' => $StudentRow->birthday,
					'phone' => $StudentRow->phone,
				];
			}
		} else {
			return '';
		}
		return $data;
	}
}
