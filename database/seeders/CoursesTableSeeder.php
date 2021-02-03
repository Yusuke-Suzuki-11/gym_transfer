<?php

namespace Database\Seeders;

use App\Models\Week;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$weeks = Week::all();

		foreach ($weeks as $week) {
			$lessonTimes = $week->lessonTimes()->get();
			foreach ($lessonTimes as $lessonTime) {
				$course = new Course();
				$course->lesson_time_id = $lessonTime->id;
				$course->week_id = $week->id;
				$course->stress_point_capacity = 45;
				$course->people_capacity = 15;
				$course->save();
			}
		}
	}
}
