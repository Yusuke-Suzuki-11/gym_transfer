<?php

namespace Database\Seeders;

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

		foreach ($StudentRowset as $StudentRow) {
			$StudentRow->courses()->attach($StudentRow->id);
		}
	}
}
