<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DummyTodayLessonDateSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$StudentRowset = Student::all();
		$CourseInstanse = new Course;
		$TodayCourseRowset = $CourseInstanse->getRowsetByWeekId(date('w'));

		foreach ($TodayCourseRowset as $TodayCourseRow) {
			foreach ($StudentRowset as $StudentRow) {
				$LessonRow = new Lesson();

				$LessonRow->course_id = $TodayCourseRow->id;
				$LessonRow->student_id = $StudentRow->id;
				$LessonRow->lesson_date = date('Y-m-d');
				$LessonRow->save();
			}
		}
	}
}
