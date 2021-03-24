<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Seeder;

class CourseStudentTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$StudentRowset = Student::all();
		$count = 1;
		$subCount = 0;
		foreach ($StudentRowset as $StudentRow) {

			if ($subCount < 15) {
				$subCount += 1;
			} else {
				$subCount = 0;
			}

			if ($subCount == 0) {
				$count += 1;
			}

			$StudentRow->getCourseRowsetByRowset()->attach($StudentRow->id * $count);
		}
	}
}
