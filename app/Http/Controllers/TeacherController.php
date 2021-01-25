<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonTime;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Week;


class TeacherController extends Controller
{
	public function index()
	{
		$className = [];
		foreach(Course::all() as $CourseRow){
		}
		return view('teacher.index')->with('CourseRowset' ,Course::all());
	}
}
