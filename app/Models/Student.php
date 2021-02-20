<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
	use HasFactory;

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

	public function getCourseAndLessonTimesBy()
	{
		$CourseRowset = $this->getCourseRowsetByRowset()->get();

		$courseArray = [];
		foreach ($CourseRowset as $CourseRow) {
			$courseArray[] = [
				'week' => $CourseRow->week()->first()->day_of_week,
				'lessonTime' => $CourseRow->lessonTime()->first()->lesson_time,
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
}
