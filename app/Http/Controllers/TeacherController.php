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

	public function calendar()
	{

		return view('teacher.calendar.index');
	}

	public function calendar_edit($yearMonth)
	{
		$start = date('Y-m-d', strtotime($yearMonth));
		$lastDate = date('Y-m-d', strtotime('last day of ' . date('Y-m', strtotime($start))));
		$targetDate = $start;
		$dateArray = [];

		while ($targetDate <= $lastDate) {
			$dateArray[] = $targetDate;
			$targetDate = date('Y-m-d', strtotime($targetDate . "+1 day"));
		}

		return view('teacher.calendar.edit')->with(['start' => $start, 'dateArray' => $dateArray]);
	}

	public function calendar_update(Request $request)
	{
		dd($request->all());
	}
}
