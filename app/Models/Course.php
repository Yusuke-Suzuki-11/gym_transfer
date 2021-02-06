<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	use HasFactory;

	public function week()
	{
		return $this->belongsTo('App\Models\Week');
	}

	public function lessonTime()
	{
		return $this->belongsTo('App\Models\LessonTime');
	}

	public function getWeekAndLessonTimes()
	{
		$weekAndLessonTime = $this->week()->first()->day_of_week . ' ' . $this->lessonTime()->first()->lesson_time;
		return $weekAndLessonTime;
	}

	public function getWeek()
	{
		return isset($this->week_id) ? $this->week()->first()->day_of_week : '';
	}

	public function getLessonTimesByWeek()
	{
		return $this->week()->lessonTimes()->get();
	}
}
