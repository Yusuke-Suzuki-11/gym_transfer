<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonTime;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Week;


class TeacherController extends Controller
{
	public function index()
	{
		$weekRowset = Week::all();
		$lessonTimeRowset = LessonTime::all();
		$courseArry = [];

		foreach (Course::all() as $course) {
			$lessonTime = $lessonTimeRowset->where('id', $course->course_times_id)->first()->lesson_time;
			$weekDay = $weekRowset->where('id', $course->week_id)->first()->day_of_week;

			$courseArry[] = $weekDay . ' ' . $lessonTime;
		}
		$courseRowset = Course::all();

		return view('teacher.index')->with(['courseArry' => $courseArry, 'courseRowset' => $courseRowset]);
	}
}
