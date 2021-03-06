<?php

namespace App\Library;

use App\Models\Week;

class Utility
{
	public static function getTodayDateString()
	{
		$weekInstans = new Week;
		$week = $weekInstans->getDayOfWeekById(date('w'));
		$today = date('Y年m月d日');
		return $today . '(' . $week . ')';
	}

	public static function getAgeByBirthDay($birthDay)
	{
		$now = date("Ymd");
		$birthDay = str_replace("-", "", $birthDay);
		return floor(($now - $birthDay) / 10000);
	}

	public static function makePass($length = 8)
	{
		return substr(base_convert(hash('sha256', uniqid()), 16, 36), 0, $length);
	}

	public static function makeFullName($lastName, $firstName)
	{
		return $lastName . ' ' . $firstName;
	}

	public function formatDate($date)
	{
		$formatDate = date('Y年m月d日', strtotime($date));
		$formatWeek = '（' . config('const.SHORT_DAY_OF_WEEK')[date('w', strtotime($date))] . '）';
		return $formatDate . $formatWeek;
	}

	public function getShortWeek($date)
	{
		$weekNum = date('w', strtotime($date));
		return '（' . config('const.SHORT_DAY_OF_WEEK')[$weekNum] . '）';
	}

	public function formatNoHyphenPhoneNum($number)
	{
		$result = str_replace(['-', 'ー'], "", $number);
		return $result;
	}
}
