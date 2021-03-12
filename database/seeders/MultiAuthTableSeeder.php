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
				'last_name' => '鈴木',
				'first_name' => '佑輔',
				'email' => 'mr.suzuki.11@gmail.com',
				'password' => 'Yy46498083',
				'member_num' => '114514',
				'birthday' => '1995-09-07',
				'gender' => '1',
				'stress_point' => '3',
				'phone' => '08055264327',
			],
			[
				'last_name' => '国井',
				'first_name' => 'ゆめ',
				'email' => 'yume@gmail.com',
				'password' => 'Yy46498083',
				'member_num' => '114515',
				'birthday' => '1996-03-05',
				'gender' => '2',
				'stress_point' => '3',
				'phone' => '08055264327',
			],
			[
				'last_name' => '伊藤',
				'first_name' => 'ひろき',
				'email' => 'hiroki@gmail.com',
				'password' => 'Yy46498083',
				'member_num' => '114516',
				'birthday' => '1995-10-30',
				'gender' => '1',
				'stress_point' => '3',
				'phone' => '08055264327',
			],
			[
				'last_name' => '大出',
				'first_name' => 'はるな',
				'email' => 'haruna@gmail.com',
				'password' => 'Yy46498083',
				'member_num' => '114517',
				'birthday' => '1995-10-28',
				'gender' => '1',
				'stress_point' => '3',
				'phone' => '08055264327',
			],
		];

		foreach ($students as $student) {
			$StudentRow = new Student();

			$StudentRow->first_name = $student['first_name'];
			$StudentRow->last_name = $student['last_name'];
			$StudentRow->full_name = $student['last_name'] . ' ' . $student['first_name'];
			$StudentRow->email = $student['email'];
			$StudentRow->password = Hash::make($student['password']);
			$StudentRow->member_num = $student['member_num'];
			$StudentRow->birthday = $student['birthday'];
			$StudentRow->gender = $student['gender'];
			$StudentRow->stress_point = $student['stress_point'];
			$StudentRow->phone = $student['phone'];
			$StudentRow->bar_id = 1;
			$StudentRow->floor_id = 1;
			$StudentRow->vaulting_hourse_id = 1;
			$StudentRow->save();
		}

		$teachers = [
			[
				'first_name' => '岸本',
				'last_name' => '鷹斗',
				'email' => 'takato@example.com',
				'password' => 'Yy46498083',
				'member_num' => '11332244',
				'birthday' => '1996-01-23',
				'gender' => '1',
			],
		];

		foreach ($teachers as $teacher) {
			$TeacherRow = new Teacher();

			$TeacherRow->first_name = $teacher['first_name'];
			$TeacherRow->last_name = $teacher['last_name'];
			$TeacherRow->full_name = $teacher['first_name'] . ' ' . $teacher['last_name'];
			$TeacherRow->email = $teacher['email'];
			$TeacherRow->password = Hash::make($teacher['password']);
			$TeacherRow->member_num = $teacher['member_num'];
			$TeacherRow->birthday = $teacher['birthday'];
			$TeacherRow->gender = $teacher['gender'];
			$TeacherRow->save();
		}
	}
}
