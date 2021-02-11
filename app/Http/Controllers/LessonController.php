<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonTime;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

		//現在の
		$gradeId = $AuthStudentRow->getCourseRowsetByRowset()->first()->grade_id;

		$LessonRow = new Lesson();
		$LessonRow->student_id = $AuthStudentRow->id;

		$CourseRow = new Course();
		$CourseRow = $CourseRow->getRowByLessonTimeAndWeek(date('w', strtotime($request->targetDate)), $request->nowLessonId);
		if (empty($CourseRow)) {
			return App::abort(404);
		}
		$LessonRow->course_id = $CourseRow->id;
		$LessonRow->lesson_date = $request->targetDate;
		$LessonRow->save();

		return redirect(route('st.course.index'));
	}
}
