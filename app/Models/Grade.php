<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
	use HasFactory;

	private $__name = 'grades';

	public function getCourseRowsetByRow()
	{
		return $this->belongsToMany('App\Models\Course');
	}

	public function getGradeNameForSearchForm()
	{
		$IdAndGradeArray = DB::table($this->__name)
			->select('id', 'grade')
			->get();

		$dataForForm = ['' => '----'];
		foreach ($IdAndGradeArray as $IdAndGrade) {
			$dataForForm[$IdAndGrade->id] = $IdAndGrade->grade;
		}

		return $dataForForm;
	}
}
