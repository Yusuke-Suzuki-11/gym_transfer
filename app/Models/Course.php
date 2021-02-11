<?php

namespace App\Models;

use GuzzleHttp\Promise\Is;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\LinesOfCode\Counter;

use function PHPUnit\Framework\isNull;

class Course extends Model
{
	private $__name = 'courses';
	use HasFactory;

	public function week()
	{
		return $this->belongsTo('App\Models\Week');
	}

	public function getLessonTimeRowByRow()
	{
		return $this->belongsTo('App\Models\LessonTime', 'lesson_time_id');
	}

	public function getGradeRowByRow()
	{
		return $this->belongsTo('App\Models\Grade', 'grade_id');
	}

	public function getLessonRowsetByRow()
	{
		return $this->belongsToMany('App\Models\Lesson');
	}

	public function getWeekAndLessonTimes()
	{
		$weekAndLessonTime = $this->week()->first()->day_of_week . ' ' . $this->getLessonTimeRowByRow()->first()->lesson_time;
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

	public function getRowByLessonTimeAndWeek($weekId, $lessonTimeId)
	{
		$weekId += 1;
		$CourseRow = DB::table($this->__name)
			->select('*')
			->where('week_id', $weekId)
			->where('lesson_time_id',  $lessonTimeId)
			->first();
		if (isset($CourseRow) <= 0) {
			$CourseRow = '';
		}

		return $CourseRow;
	}
}
