<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonDate;
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

		return view('teacher.calendar.edit')->with([
			'start' => $start,
			'dateArray' => $dateArray,
			'LessonDateInstance' => new LessonDate
		]);
	}

	public function calendar_update(Request $request)
	{
		$dateArray = json_decode($request->dateArray);


		foreach ($dateArray as $date) {
			$LessonDateRow = LessonDate::all()->where('date', $date)->isEmpty() ? new LessonDate() : LessonDate::where('date', $date)->first();
			$dateItem = $request[$date];

			if (LessonDate::all()->where('date', $date)->isEmpty()) {
				$LessonDateRow = new LessonDate();
				$LessonDateRow->date = $date;
				if (!isset($dateItem)) {
					$LessonDateRow->save();
					continue;
				}
			} else {
				$LessonDateRow = LessonDate::where('date', $date)->first();
			}

			$LessonDateRow->floor_flag = isset($dateItem['floor']) ? $dateItem['floor'] : null;
			$LessonDateRow->bar_flag = isset($dateItem['bar']) ? $dateItem['bar'] : null;
			$LessonDateRow->vaulting_flag = isset($dateItem['vaulting']) ? $dateItem['vaulting'] : null;
			$LessonDateRow->trampoline_flag = isset($dateItem['trampoline']) ? $dateItem['trampoline'] : null;
			$LessonDateRow->other_flag = isset($dateItem['other']) ? $dateItem['other'] : null;
			$LessonDateRow->save();
		}

		return redirect(route('tc.lesson.calendar'));
	}
}
