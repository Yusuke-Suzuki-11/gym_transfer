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
		$weekAndLessonTime = $this->lessonTime()->first()->lesson_time . ' ' . $this->week()->first()->day_of_week;
		return $weekAndLessonTime;
	}
}
