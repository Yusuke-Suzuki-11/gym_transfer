<?php

namespace App\Library;

use App\Models\Week;

class Utility
{
	public static function getTodayDateString()
	{
		$weekInstans = new Week;
		$week = $weekInstans->getDayOfWeekById(date('w') + 1);
		$today = date('Y年m月d日');
		return $today . '(' . $week . ')';
	}

	public static function getAgeByBirthDay($birthDay)
	{
		$now = date("Ymd");
		$birthDay = str_replace("-", "", $birthDay);
		return floor(($now - $birthDay) / 10000);
	}
}
