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

		$WeekRowset = Week::all();


		foreach ($WeekRowset as $WeekRow) {
			$LessonTimeRowset = $WeekRow->lessonTimes()->get();
			foreach ($LessonTimeRowset as $LessonTimeRow) {
				$course = new Course();
				$course->lesson_time_id = $LessonTimeRow->id;
				$course->week_id = $WeekRow->id;
				$course->grade_id = $LessonTimeRow->grade_id;
				$course->stress_point_capacity = 45;
				$course->people_capacity = 15;
				$course->save();
			}
		}
	}
}
