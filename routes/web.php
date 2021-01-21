<?php

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
});

// 先生ページ
Route::prefix('teachers')->middleware('auth:teachers')->group(function(){
	Route::get('', [TeacherController::class, 'index'])->name('teachers');
});

