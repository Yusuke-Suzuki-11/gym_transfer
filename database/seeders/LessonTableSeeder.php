<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use DateTime;
use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
	public function run()
	{
		$weeks = [
			'Sunday',
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
		];


		$StudentRowset = Student::all();
		foreach ($StudentRowset as $StudentRow) {


			foreach ($StudentRow->getCourseRowsetByRowset()->get() as $CourseRow) {

				$targetWeekDate = date('Y-m-d', strtotime('next ' . $weeks[$CourseRow->week_id - 1]));

				while (date('m', strtotime($targetWeekDate)) == date('m')) {
					echo $targetWeekDate;
					echo "\n";
					$LessonRow = new Lesson();
					$LessonRow->course_id = $CourseRow->id;
					$LessonRow->student_id = $StudentRow->id;
					$LessonRow->lesson_date = $targetWeekDate;
					$LessonRow->save();
					$targetWeekDate = date('Y-m-d', strtotime('+1 week', strtotime($targetWeekDate)));
				}
				echo "\n";
			}
		}
	}
}
