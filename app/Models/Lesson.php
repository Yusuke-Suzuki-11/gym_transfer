<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
	use HasFactory;

	private $__name = 'lessons';

	protected $fillable = [
		'course_id',
		'student_id',
		'lesson_date',
	];

	public function getCourseRowByRow()
	{
		return $this->belongsTo(Course::class, 'course_id');
	}

	public function getCourseId()
	{
		return $this->getCourseRowByRow()->first()->id;
	}

	public function getLessonTime()
	{
		return $this->getCourseRowByRow()->first()->getLessonTime();
	}

	public function getWeekRow()
	{
		return $this->getCourseRowByRow()->first()->week()->first();
	}

	public function getLessonRowsetByNowDate($date)
	{
		// デバッグ用
		// $date = date('Y-m-d', strtotime('+6 day', strtotime($date)));
		$LessonRowset = DB::table($this->__name)
			->select('*')
			->where('lesson_date', $date)
			->get();

		if (count($LessonRowset) <= 0) {
			$LessonRowset = '';
		}

		return $LessonRowset;
	}

	public function getStudentRow()
	{
		return $this->belongsTo(Student::class, 'student_id');
	}

	public function getGrade()
	{
		return $this->getCourseRowByRow()->first()->getGradeRow()->first()->grade;
	}

	public function getGradeId()
	{
		return $this->getCourseRowByRow()->first()->grade_id;
	}
}
