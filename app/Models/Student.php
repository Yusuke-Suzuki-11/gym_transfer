<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
	use HasFactory;

	public function courses()
	{
		return $this->belongsToMany("App\Models\Course", 'course_student', 'student_id', 'course_id');
	}

	public function getAgeByBirthDay($birthday)
	{
		$now = date("Ymd");
		$birthday = str_replace("-", "", $birthday);
		return floor(($now - $birthday) / 10000) . '歳';
	}

	public function getCourseAndLessonTimesBy()
	{
		$CourseRowset = $this->courses()->get();

		$courseArray = [];
		foreach ($CourseRowset as $CourseRow) {
			$courseArray[] = [
				'week' => $CourseRow->week()->first()->day_of_week,
				'lessonTime' => $CourseRow->lessonTime()->first()->lesson_time,
			];
		}

		return $courseArray;
	}
}
