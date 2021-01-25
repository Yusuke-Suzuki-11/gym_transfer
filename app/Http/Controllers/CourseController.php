<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transfer;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
	public function index()
	{
		return view('course.index');
	}

	public function admin_index()
	{

		return view('course.admin_index');
	}

	public function admin_add()
	{
		return view('course.admin_add');
	}

	public function admin_create(Request $request)
	{
		return redirect('teachers.course.add');
	}
}
