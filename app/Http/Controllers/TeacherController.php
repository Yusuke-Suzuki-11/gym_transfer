<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class TeacherController extends Controller
{
	public function index()
	{
		return view('teacher.index');
	}
}
