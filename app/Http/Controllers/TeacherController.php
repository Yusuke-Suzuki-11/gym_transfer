<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonDate;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
	public function index()
	{
		$CourseInstans = new Course;
		$TodayCourseRowset = $CourseInstans->getRowsetByWeekId(date('w'));
		$LessonDateInstance = new LessonDate;

		return view('teacher.index')->with([
			'TodayCourseRowset' => $TodayCourseRowset,
			'todayLessons' => $LessonDateInstance->getTodayLessonType(date('Y-m-d')),
		]);
	}

	public function calendar()
	{
		$LessonDateInstance = new LessonDate;

		$dateDataForJson = [];
		foreach ($LessonDateInstance->all() as $LessonDateRow) {

			if (isset($LessonDateRow->floor_flag)) {
				$floorData = [];
				$floorData['date'] = $LessonDateRow->date;
				$floorData['title'] = config('const.LESSON_TYPE')['floor'];
				$floorData['color'] = 'crimson';
				$dateDataForJson[] = $floorData;
			}

			if (isset($LessonDateRow->bar_flag)) {
				$barData = [];
				$barData['date'] = $LessonDateRow->date;
				$barData['title'] = config('const.LESSON_TYPE')['bar'];
				$barData['color'] = 'royalblue';
				$dateDataForJson[] = $barData;
			}

			if (isset($LessonDateRow->vaulting_flag)) {
				$vaultingData = [];
				$vaultingData['date'] = $LessonDateRow->date;
				$vaultingData['title'] = config('const.LESSON_TYPE')['vaulting'];
				$vaultingData['color'] = 'springgreen';
				$vaultingData['textColor'] = 'dimgray';

				$dateDataForJson[] = $vaultingData;
			}

			if (isset($LessonDateRow->trampoline_flag)) {
				$trampolineData = [];
				$trampolineData['date'] = $LessonDateRow->date;
				$trampolineData['title'] = config('const.LESSON_TYPE')['trampoline'];
				$trampolineData['color'] = 'darkviolet';
				$dateDataForJson[] = $trampolineData;
			}

			if (isset($LessonDateRow->other_flag)) {
				$otherData = [];
				$otherData['date'] = $LessonDateRow->date;
				$otherData['title'] = config('const.LESSON_TYPE')['other'];
				$otherData['color'] = 'dimgray';
				$dateDataForJson[] = $otherData;
			}
		}

		return view('teacher.calendar.index')->with([
			'dateDataForJson' => $dateDataForJson
		]);
	}

	public function calendar_edit($yearMonth)
	{
		$start = date('Y-m-d', strtotime($yearMonth));
		$last = date('Y-m-d', strtotime('last day of ' . date('Y-m', strtotime($start))));
		$targetDate = $start;
		$dateArray = [];
		while ($targetDate <= $last) {
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
