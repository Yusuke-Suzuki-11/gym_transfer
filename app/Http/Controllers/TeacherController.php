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
		$CourseInstans = new Course;
		$TodayCourseRowset = $CourseInstans->getRowsetByWeekId(date('w'));
		return view('teacher.index')->with('TodayCourseRowset', $TodayCourseRowset);
	}
}
