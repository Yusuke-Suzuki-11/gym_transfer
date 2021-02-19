<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonTime;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Week;


class TeacherController extends Controller
{
	public function index()
	{
		$Lesson = new Lesson;
		$TodayLessonRowset = $Lesson->getLessonRowsetByNowDate(date('Y-m-d'));
		return view('teacher.index')->with('TodayLessonRowset', $TodayLessonRowset);
	}
}
