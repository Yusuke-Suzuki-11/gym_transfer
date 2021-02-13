<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
	public function index()
	{
		$AuthStudentRow = Auth::user();
		return view('student.index')->with(['JsonLessonDate' => $AuthStudentRow->getJsonLessonDateAndTitle()]);
	}
}
