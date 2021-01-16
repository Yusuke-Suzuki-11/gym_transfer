<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiAuthController extends Controller
{
	public function showLoginForm()
	{
		return view('multi_auth.login');
	}
}
