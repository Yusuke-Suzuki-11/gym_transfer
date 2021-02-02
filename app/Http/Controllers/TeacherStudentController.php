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

	public function update($id, Request $request)
	{
		$StudentRow = Student::find($id);

		$fullName = $request->last_name . ' ' . $request->first_name;

		$StudentRow->last_name = $request->last_name;
		$StudentRow->first_name = $request->first_name;
		$StudentRow->full_name = $fullName;
		$StudentRow->phone = $request->phone;
		$StudentRow->email = $request->email;
		$StudentRow->birthday = $request->birthday;
		$StudentRow->member_num = $request->member_num;
		$StudentRow->stress_point = $request->stress_point;
		$StudentRow->gender = $request->gender;
		$StudentRow->save();

		return redirect(route('tc.student.show', ['id' => $StudentRow->id]));
	}
}
