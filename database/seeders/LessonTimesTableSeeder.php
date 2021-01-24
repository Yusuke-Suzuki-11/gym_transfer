<?php

namespace Database\Seeders;

use App\Models\LessonTime;
use Illuminate\Database\Seeder;

class LessonTimesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$lessonTimes = [
			"10:00~10:50",
			"10:30~11:15",
			"11:00~11:50",
			"13:20~14:10",
			"14:20~15:10",
			"15:10~16:00",
			"15:20~16:10",
			"16:10~17:00",
			"16:20~17:10",
			"17:10~18:00",
			"17:20~18:10",
			"18:10~19:00",
			"19:10~20:00",
		];

		foreach($lessonTimes as $lessonTime){
			$LessonTimeRow = new LessonTime;
			$LessonTimeRow->lesson_time = $lessonTime;
			$LessonTimeRow->save();
		}
	}
}
