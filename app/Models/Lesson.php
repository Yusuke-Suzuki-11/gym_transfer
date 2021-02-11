<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	use HasFactory;

	public function getCourseRowByRow()
	{
		return $this->belongsTo(Course::class, 'course_id');
	}

	public function getWeekRow()
	{
		return $this->getCourseRowByRow()->first()->week()->first();
	}
}
