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
			[
				['lessonTime' => "10:00~10:50", 'grId' => 2],
			],
			[
				['lessonTime' => "10:30~11:15", 'grId' => 1],
			],
			[
				['lessonTime' => "11:00~11:50", 'grId' => 3],
			],
			[
				['lessonTime' => "13:20~14:10", 'grId' => 2],
			],
			[
				['lessonTime' => "14:20~15:10", 'grId' => 3],
			],
			[
				['lessonTime' => "15:10~16:00", 'grId' => 2],
			],
			[
				['lessonTime' => "15:20~16:10", 'grId' => 4],
			],
			[
				['lessonTime' => "16:10~17:00", 'grId' => 3],
			],
			[
				['lessonTime' => "16:20~17:10", 'grId' => 5],
			],
			[
				['lessonTime' => "17:10~18:00", 'grId' => 4],
			],
			[
				['lessonTime' => "17:20~18:10", 'grId' => 6],
			],
			[
				['lessonTime' => "18:10~19:00", 'grId' => 5],
			],
			[
				['lessonTime' => "19:10~20:00", 'grId' => 6],
			],
		];

		foreach ($lessonTimes as $lessonTime) {
			$LessonTimeRow = new LessonTime;
			$LessonTimeRow->lesson_time = $lessonTime['lessonTime'];
			$LessonTimeRow->grade_id = $lessonTime['grId'];
			$LessonTimeRow->save();
		}
	}
}
