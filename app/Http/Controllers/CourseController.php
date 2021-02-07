<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonTime;
use App\Models\Student;
use App\Models\Week;
use App\Models\Transfer;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
	public function index()
	{
		$AuthStudentRow = Auth::user();

		return view('student.course.index')->with(['AuthStudentRow' => $AuthStudentRow]);
	}

	public function add()
	{
		return view('course.add');
	}

	public function create(Request $request)
	{
		return redirect('tc.course.add');
	}
}
