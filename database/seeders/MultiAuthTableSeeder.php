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
			$StudentRow = new Student();

			$StudentRow->name = $student['name'];
			$StudentRow->email = $student['email'];
			$StudentRow->password = Hash::make($student['password']);
			$StudentRow->member_num = $student['member_num'];
			$StudentRow->birthday = $student['birthday'];
			$StudentRow->gender = $student['gender'];
			$StudentRow->save();
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
			$TeacherRow = new Teacher();

			$TeacherRow->name = $teacher['name'];
			$TeacherRow->email = $teacher['email'];
			$TeacherRow->password = Hash::make($teacher['password']);
			$TeacherRow->member_num = $teacher['member_num'];
			$TeacherRow->birthday = $teacher['birthday'];
			$TeacherRow->gender = $teacher['gender'];
			$TeacherRow->save();
		}
	}
}
