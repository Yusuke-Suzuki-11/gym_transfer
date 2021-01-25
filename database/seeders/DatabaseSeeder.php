<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(MultiAuthTableSeeder::class);
		$this->call(WeeksTableSeeder::class);
		$this->call(LessonTimesTableSeeder::class);
		$this->call(LessonTimeWeekTableSeeder::class);
	}
}
