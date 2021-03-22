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
	use HasFactory;
	private $__name = 'courses';

	public function week()
	{
		return $this->belongsTo('App\Models\Week');
	}

	public function getWeek()
	{
		return isset($this->week_id) ? $this->week()->first()->day_of_week : '';
	}

	public function getLessonTimeRowByRow()
	{
		return $this->belongsTo('App\Models\LessonTime', 'lesson_time_id');
	}

	public function getWeekAndLessonTimes()
	{
		$weekAndLessonTime = $this->week()->first()->day_of_week . ' ' . $this->getLessonTimeRowByRow()->first()->lesson_time;
		return $weekAndLessonTime;
	}

	public function getGradeRow()
	{
		return $this->belongsTo('App\Models\Grade', 'grade_id');
	}

	public function getGradeName()
	{
		return $this->getGradeRow()->first()->grade;
	}

	public function getLessonRowset()
	{
		return $this->hasMany('App\Models\Lesson');
	}

	public function getTodayLessonRowset()
	{
		return $this->getLessonRowset()->where('lesson_date', date('Y-m-d', strtotime('2021-03-23')));
	}

	public function getLessonTime()
	{
		return $this->getLessonTimeRowByRow()->first()->lesson_time;
	}

	public function getLessonTimesByWeek()
	{
		return $this->week()->lessonTimes()->get();
	}

	public function getRowByLessonTimeAndWeek($weekId, $lessonTimeId)
	{
		$weekId;
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

	public function getRowsetByWeekId($weekId)
	{
		$weekId;
		$CourseRowset = $this->where('week_id', $weekId)->get();
		if ($CourseRowset->isEmpty()) {
			$CourseRowset = '';
		}

		return  $CourseRowset;
	}

	public function getRowsetByGradeId($gradeId)
	{
		return $this->where('grade_id', $gradeId)->get();
	}
}
