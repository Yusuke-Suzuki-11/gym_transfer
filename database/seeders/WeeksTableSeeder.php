<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dayOfWeeks = [
            '日曜日',
            '月曜日',
            '火曜日',
            '水曜日',
            '木曜日',
            '金曜日',
            '土曜日',
        ];

        foreach ($dayOfWeeks as $key => $dayofweek) {
            $WeekRow = new Week();
            $WeekRow->id = $key;
            $WeekRow->day_of_week = $dayofweek;
            $WeekRow->save();
        }
    }
}
