<?php

namespace Database\Seeders;

use App\Models\ClassLevel;
use Illuminate\Database\Seeder;

class ClassLevelTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$classLevels = [
			'10級',
			'9級',
			'8級',
			'7級',
			'6級',
			'5級',
			'4級',
			'3級',
			'2級',
			'1級',
			'初段',
			'2段',
			'3段',
			'4段',
			'5段',
		];

		foreach ($classLevels as $classLevel) {
			$ClassLevelRow = new ClassLevel;

			$ClassLevelRow->name = $classLevel;
			$ClassLevelRow->save();
		}
	}
}
