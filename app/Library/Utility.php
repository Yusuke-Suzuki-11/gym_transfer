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
}
