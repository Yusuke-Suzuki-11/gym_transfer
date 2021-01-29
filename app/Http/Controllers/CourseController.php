<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonTime;
use App\Models\Student;
use App\Models\Week;
use App\Models\Transfer;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
	public function index()
	{
		$WeekRowset = Week::all();
		$LessonTimeRowset = LessonTime::all();
		$courseArry = [];

		foreach (Course::all() as $course) {
			$lessonTime = $LessonTimeRowset->where('id', $course->course_times_id)->first()->lesson_time;
			$weekDay = $WeekRowset->where('id', $course->week_id)->first()->day_of_week;

			$courseArry[] = $weekDay . ' ' . $lessonTime;
		}
		$CourseRowset = Course::all();
		return view('teacher.course.index')->with(['courseArry' => $courseArry, 'CourseRowset' => $CourseRowset, 'StudentRowset' => Student::all()]);
	}

	public function add()
	{
		return view('course.add');
	}

	public function create(Request $request)
	{
		return redirect('tc.course.add');
	}
}
