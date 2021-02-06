<?php

namespace Database\Seeders;

use App\Models\LessonTime;
use App\Models\Week;
use Illuminate\Database\Seeder;


class LessonTimeWeekTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$lessonTimes = [
			[
				"10:00~10:50",
				"11:00~11:50",
				"13:20~14:10",
				"14:20~15:10",
				"15:20~16:10",
				"16:20~17:10",
				"17:20~18:10",
			],
			[],
			[
				"15:10~16:00",
				"16:10~17:00",
				"17:10~18:00",
				"18:10~19:00",
			],
			[
				"10:30~11:15",
				"15:10~16:00",
				"16:10~17:00",
				"17:10~18:00",
				"18:10~19:00",
			],
			[
				"15:10~16:00",
				"16:10~17:00",
				"17:10~18:00",
				"18:10~19:00",
				"19:10~20:00",
			],
			[
				"10:30~11:15",
				"15:10~16:00",
				"16:10~17:00",
				"17:10~18:00",
				"18:10~19:00",
			],
			[
				"10:00~10:50",
				"11:00~11:50",
				"13:20~14:10",
				"14:20~15:10",
				"15:20~16:10",
				"16:20~17:10",
				"17:20~18:10",
			],
		];

		$count = 1;
		foreach ($lessonTimes as $lessonTime) {
			foreach ($lessonTime as $time) {
				$week = Week::find($count);
				if (empty($week)) {
					continue;
				}
				$lessonTimeId = LessonTime::where('lesson_time', $time)->first()->id;
				$week->lessonTimes()->attach($lessonTimeId);
			}
			$count++;
		}
	}
}
