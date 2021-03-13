<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
	public function index($month)
	{
		if ($month > intval(date('m')) + 3 || $month < intval(date('m'))) {
			abort(500);
		}

		$AuthStudentRow = Auth::user();
		$CourseStudentInstance = new CourseStudent();

		$LessonRowset = $AuthStudentRow->getAliveLessonRowset($month);


		return view('student.index')->with([
			'AuthStudentRow' => $AuthStudentRow,
			'CourseStudentInstance' => $CourseStudentInstance,
			'LessonRowset' => $LessonRowset,
			'selectMonth' => $month,
		]);
	}

	public function my_calendar()
	{
		$AuthStudentRow = Auth::user();
		return view('student.my_calendar')->with([
			'JsonLessonDate' => $AuthStudentRow->getJsonLessonDateAndTitle(),
			'AuthStudentRow' => $AuthStudentRow,
		]);
	}
}
