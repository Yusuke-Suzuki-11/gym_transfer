<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$gradeItemsArray = [
			[
				'grade' => '未就園児',
				'sub' => '（未就園児）',
			],
			[
				'grade' => '幼児',
				'sub' => '（年少～年長）',
			],
			[
				'grade' => '幼児・小学生',
				'sub' => '（年中～小学校低学年）',
			],
			[
				'grade' => '小学生',
				'sub' => '（年長～）',
			],
			[
				'grade' => '小・中学生',
				'sub' => '（小〜中学生）',
			],
			[
				'grade' => 'バク転・アクロバット',
				'sub' => '（小学生～成人）',
			],
		];

		foreach ($gradeItemsArray as $gradeItems) {
			$GradeRow = new Grade();
			$GradeRow->grade = $gradeItems['grade'];
			$GradeRow->grade_sub = $gradeItems['sub'];
			$GradeRow->save();
		}
	}
}
