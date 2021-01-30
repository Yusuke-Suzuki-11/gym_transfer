<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TeacherStudentController extends Controller
{
	public function index()
	{
		$StudentRowset = Student::all();
		return view('teacher.student.index')->with(['StudentRowset' => $StudentRowset]);
	}

	public function show($id)
	{
		$StudentRow = Student::find($id);
		if (empty($StudentRow)) {
			return App::abort(404);
		}

		return view('teacher.student.show')->with(['StudentRow' => $StudentRow]);
	}

	public function edit($id)
	{
		$StudentRow = Student::find($id);
		return view('teacher.student.edit')->with(['StudentRow' => $StudentRow]);
	}

	public function update($id)
	{
		$StudentRow = Student::find($id);
		dd($StudentRow);
		redirect(route('teacher.student.edit', ['id' => $StudentRow->id]));
	}
}
