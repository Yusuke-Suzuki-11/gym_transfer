<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use DateTime;
use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$StudentRowset = Student::all();
		foreach ($StudentRowset as $StudentRow) {
			foreach ($StudentRow->getCourseRowsetByRowset()->get() as $CourseRow) {
				$targetWeekDate = date('Y-m-d', strtotime('next Monday'));

				while (date('m', strtotime($targetWeekDate)) == date('m')) {
					$LessonRow = new Lesson();
					$LessonRow->course_id = $CourseRow->id;
					$LessonRow->student_id = $StudentRow->id;
					$LessonRow->lesson_date = $targetWeekDate;
					$LessonRow->save();
					$targetWeekDate = date('Y-m-d', strtotime('next week', strtotime($targetWeekDate)));
				}
			}
		}
	}
}
