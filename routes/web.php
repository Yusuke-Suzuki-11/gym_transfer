<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherStudentController;
use Illuminate\Support\Facades\Route;


// 認証

Route::get('/login', [MultiAuthController::class, 'showLoginForm'])->name('show_login_form');
Route::post('/login', [MultiAuthController::class, 'login'])->name('login');

// 生徒ページ
Route::prefix('students')->middleware('auth:students')->group(function () {

	// カレンダー
	Route::get('/my_calendar', [StudentController::class, 'my_calendar'])->name('st.calendar');

	// コースの登録
	Route::get('/course', [CourseController::class, 'index'])->name('st.course.index');

	// 練習一覧
	Route::get('/{month}', [StudentController::class, 'index'])->name('students');

	// 振替処理
	Route::get('/lesson/detail/{id}', [LessonController::class, 'detail'])->name('st.lesson.detail');
	Route::get('/lesson/comparison_lesson/{id}', [LessonController::class, 'comparison_lesson'])->name('st.lesson.comparison_lesson');
	Route::post('/lesson/transfer', [LessonController::class, 'transfer'])->name('st.lesson.transfer');
});

// 先生ページ
Route::prefix('teachers')->middleware('auth:teachers')->group(function () {
	Route::get('', [TeacherController::class, 'index'])->name('tc');

	// 生徒管理
	Route::get('/student', [TeacherStudentController::class, 'index'])->name('tc.student.index');
	Route::get('/student/search', [TeacherStudentController::class, 'axios_search'])->name('tc.student.search');
	Route::get('/student/add', [TeacherStudentController::class, 'add'])->name('tc.student.add');
	Route::get('/student/{id}', [TeacherStudentController::class, 'show'])->name('tc.student.show');
	Route::get('/student/{id}/edit', [TeacherStudentController::class, 'edit'])->name('tc.student.edit');
	Route::post('/student/{id}/update', [TeacherStudentController::class, 'update'])->name('tc.student.update');
	Route::post('/student/register', [TeacherStudentController::class, 'register_student'])->name('tc.student.register');

	// コース
	Route::get('/courses', [CourseController::class, 'index'])->name('tc.course');
	Route::get('/courses/add', [CourseController::class, 'add'])->name('tc.course.add');
	Route::post('/courses/create', [CourseController::class, 'create'])->name('tc.course.create');
});
