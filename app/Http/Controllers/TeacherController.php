<?php

namespace App\Http\Controllers;

use App\Models\LessonTime;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Week;


class TeacherController extends Controller
{
	public function index()
	{
		return view('teacher.index');
	}
}
