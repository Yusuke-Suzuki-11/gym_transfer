<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Week extends Model
{
	use HasFactory;

	public function lessonTimes()
	{
		return $this->belongsToMany("App\Models\LessonTime", 'lesson_time_week', 'week_id', 'lesson_time_id');
	}

	public function getDayOfWeek()
	{
		return $this->day_of_week;
	}

	public function getDayOfWeekById($id)
	{
		return $this->find($id)->day_of_week;
	}
}
