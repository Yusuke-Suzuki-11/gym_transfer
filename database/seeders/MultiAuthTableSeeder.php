<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MultiAuthTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		$students = [
			[
				'name' => '鈴木佑輔',
				'email' => 'mr.suzuki.11@gmail.com',
				'password' => '12345Yy',
				'member_num' => '11223344',
				'birthday' => '1995-09-07',
				'gender' => '1',
			],
		];

		foreach($students as $student){
			$studentRow = new Student();

			$studentRow->name = $student['name'];
			$studentRow->email = $student['email'];
			$studentRow->password = Hash::make($student['password']);
			$studentRow->member_num = $student['member_num'];
			$studentRow->birthday = $student['birthday'];
			$studentRow->gender = $student['gender'];
			$studentRow->save();
		}

		$teachers = [
			[
				'name' => '岸本鷹斗',
				'email' => 'mr.takato@example.com',
				'password' => '12345Yy',
				'member_num' => '11332244',
				'birthday' => '1996-01-23',
				'gender' => '1',
			],
		];

		foreach($teachers as $teacher){
			$teacherRow = new Teacher();

			$teacherRow->name = $teacher['name'];
			$teacherRow->email = $teacher['email'];
			$teacherRow->password = Hash::make($teacher['password']);
			$teacherRow->member_num = $teacher['member_num'];
			$teacherRow->birthday = $teacher['birthday'];
			$teacherRow->gender = $teacher['gender'];
			$teacherRow->save();
		}
	}
}
