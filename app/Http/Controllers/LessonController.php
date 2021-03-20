<?php

namespace App\Http\Controllers;

use App\Library\Utility;
use App\Mail\LessonTransferNotification;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LessonController extends Controller
{
	public function __construct()
	{
		$this->utility = new Utility;
	}

	public function detail($id)
	{
		$AuthStudentRow = Auth::user();
		if (is_null($AuthStudentRow->getLessonRowset()->find($id))) {
			abort(500);
		}

		$LessonRow = Lesson::find($id);

		$CourseStudentInstance = new CourseStudent;

		//今月の振替が可能かどうか
		if (!$CourseStudentInstance->hasTransferEnabled($AuthStudentRow->id, $LessonRow->getCourseId())) {
			return abort(500);
		}

		$CouseInstance = new Course;

		$LessonDataForSelect = [];
		$hasLessonDates = $AuthStudentRow->getLessonDate();

		// TODO:日付でソートできるように
		foreach ($CouseInstance->getRowsetByGradeId($LessonRow->getGradeId()) as $CourseRow) {

			$month = intval(date('m'));
			$twoLaterMonth = $month + 2;
			$targetWeekDate = date('Y-m-d', strtotime('next ' . config('const.DAY_OF_WEEK_EN')[$CourseRow->week_id]));

			while ($month <= $twoLaterMonth) {
				if (in_array($targetWeekDate, $hasLessonDates) || $targetWeekDate <= date('Y-m-d')) {
					continue 2;
				}
				$LessonDataForSelect[] = [
					'courseId' => $CourseRow->id,
					'grade' => $CourseRow->getGradeName(),
					'lessonId' => $id,
					'lessonTime' => $CourseRow->getLessonTime(),
					'lessonDate' => $targetWeekDate,
					'formatLessonDate' => $this->utility->formatDate($targetWeekDate)
				];

				$month = intval(date('m', strtotime('+1 week', strtotime($targetWeekDate))));
				$targetWeekDate = date('Y-m-d', strtotime('+1 week', strtotime($targetWeekDate)));
			}
		}

		return view('student.lesson.detail')->with([
			'LessonRow' => $LessonRow,
			'LessonSelectItemForJson' => json_encode($LessonDataForSelect),
			'AuthStudentRow' => $AuthStudentRow,
		]);
	}


	public function transfer(Request $request)
	{

		// TODO::valid作成する
		//既存のレッスンを削除
		$LessonRow = Lesson::find($request->nowLessonId);
		$LessonRow->valid = 0;
		$LessonRow->save();

		$nowCourseId = $LessonRow->getCourseRowByRow()->first()->id;

		//振替フラグを0にする
		$AuthStudentRow = Auth::user();

		$CourseStudentInstance = new CourseStudent;
		$CourseStudentInstance->transferEnabledByIdAndStudentId($AuthStudentRow->id, $nowCourseId);

		// 振替レッスンを作成
		$NewLessonRow = new Lesson();
		$NewLessonRow->fill(
			[
				'course_id' => $request->courseId,
				'student_id' => $AuthStudentRow->id,
				'lesson_date' => $request->targetLessonDate,
				'change_lesson_id' => null,
			]
		);
		$NewLessonRow->change_lesson_id = $request->nowLessonId;
		$NewLessonRow->attendance = 2;
		$NewLessonRow->save();

		Mail::to('mr.suzuki.11@gmail.com')->send(
			new LessonTransferNotification(
				$AuthStudentRow->full_name,
				$AuthStudentRow->email,
				$this->utility->formatDate($LessonRow->lesson_date),
				$this->utility->formatDate($NewLessonRow->lesson_date)
			)
		);

		return redirect(route('st.lesson.comparison_lesson', ['id' => $NewLessonRow->id]))->with([
			'LessonRow' => $NewLessonRow,
			'OldLessonRow' => $LessonRow,
			'AuthStudentRow' => $AuthStudentRow,
		]);
	}

	public function comparison_lesson($id)
	{
		$AuthStudentRow = Auth::user();
		$LessonRow = Lesson::find($id);
		$OldLessonRow = Lesson::find($LessonRow->change_lesson_id);

		return view('student.lesson.compare')->with([
			'LessonRow' => $LessonRow,
			'OldLessonRow' => $OldLessonRow,
			'AuthStudentRow' => $AuthStudentRow,
		]);
	}
}
