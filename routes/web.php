<?php

use App\Http\Controllers\MultiAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [MultiAuthController::class, 'showLoginForm'])->name('show_login_form');