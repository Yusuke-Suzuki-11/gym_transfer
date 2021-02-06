<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTime extends Model
{
	use HasFactory;

	public function weeks()
	{
		return $this->belongsToMany('App\Models\LessonTime', 'lesson_time_week', 'lesson_time_id', 'week_id');
	}

	public function getGradeRowByRow()
	{
		return $this->belongsTo('App\Course');
	}
}
