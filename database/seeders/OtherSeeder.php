<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
            [
                'first_name' => 'テスト',
                'last_name' => '太郎',
                'email' => 'tatata@example.com',
                'password' => 'WaezyNwM',
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
