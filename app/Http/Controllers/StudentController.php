<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
	public function index()
	{
		$AuthStudentRow = Auth::user();
		$CourseStudentInstance = new CourseStudent();
		return view('student.index')->with(['AuthStudentRow' => $AuthStudentRow, 'CourseStudentInstance' => $CourseStudentInstance]);
	}

	public function my_calendar()
	{
		$AuthStudentRow = Auth::user();
		return view('student.my_calendar')->with(['JsonLessonDate' => $AuthStudentRow->getJsonLessonDateAndTitle()]);
	}
}
