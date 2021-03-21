<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class LessonDate extends Model
{
	use HasFactory;

	protected $fillable = [
		'date',
		'floor_flag',
		'bar_flag',
		'vaulting_flag',
		'trampoline_flag',
		'other_flag',
	];

	public function hasFloorFlag($date)
	{
		return !is_null($this->where('date', $date)->first()->floor_flag);
	}

	public function getTodayLessonType($date)
	{
		$LessonDateRow = LessonDate::where('date', $date)->first();
		$todayLessons = [];

		$todayLessons[] = isset($LessonDateRow->floor_flag) ? config('const.LESSON_TYPE')['floor'] : '';
		$todayLessons[] = isset($LessonDateRow->bar_flag) ? config('const.LESSON_TYPE')['bar'] : '';
		$todayLessons[] = isset($LessonDateRow->vaulting_flag) ? config('const.LESSON_TYPE')['vaulting'] : '';
		$todayLessons[] = isset($LessonDateRow->trampoline_flag) ? config('const.LESSON_TYPE')['trampoline'] : '';
		$todayLessons[] = isset($LessonDateRow->other_flag) ? config('const.LESSON_TYPE')['other'] : '';

		$todayLessons = array_filter($todayLessons, 'strlen');

		return implode('/', $todayLessons);
	}
}
