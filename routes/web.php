<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


// 認証

Route::get('/login', [MultiAuthController::class, 'showLoginForm'])->name('show_login_form');
Route::post('/login', [MultiAuthController::class, 'login'])->name('login');

// 生徒ページ
Route::prefix('students')->middleware('auth:students')->group(function(){
	Route::get('', [StudentController::class, 'index'])->name('students');
	Route::get('/course', [CourseController::class, 'index'])->name('students.course');
});

// 先生ページ
Route::prefix('teachers')->middleware('auth:teachers')->group(function(){
	Route::get('', [TeacherController::class, 'index'])->name('teachers');
	Route::get('/courses', [CourseController::class, 'admin_index'])->name('teachers.course');
	Route::get('/courses/add', [CourseController::class, 'admin_add'])->name('teachers.course.add');
	Route::post('/courses/create', [CourseController::class, 'admin_create'])->name('teachers.course.create');
});

