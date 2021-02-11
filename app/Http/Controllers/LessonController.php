<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonTime;
use App\Models\Lesson;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
	public function detail($id)
	{
		$LessonRow = Lesson::find($id);

		return view('student.lesson.detail')->with(['LessonRow' => $LessonRow, 'LessonTimeRowset' => LessonTime::all()]);
	}

	public function transfer(Request $request)
	{
		$AuthStudentRow = Auth::user();

		$gradeId = $AuthStudentRow->getCourseRowsetByRowset()->first()->grade_id;

		$LessonRow = new Lesson();
		$LessonRow->course_id = $CourseRow->id;
		$LessonRow->student_id = $AuthStudentRow->id;
		$LessonRow->lesson_date = $$request->targetDate;
		$LessonRow->save();

		// dd($gradeId);
		// dd($request->targetDate);

		return redirect(route('st.course.index'));
	}
}
