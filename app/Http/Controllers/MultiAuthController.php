<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MultiAuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:students');
		$this->middleware('guest:teachers');
	}


	public function showLoginForm()
	{
		return view('multi_auth.login');
	}

	public function login(Request $request)
	{
		$authCredentials = $request->only('email', 'password');
		$guardType = $request->guard_type;

		if (preg_match('/example/', $request->email)) {
			$guardType = 'teachers';
		}

		if (Auth::guard($guardType)->attempt($authCredentials)) {
			$request->session()->flash('flash_message', 'ログインしました');
			return redirect($guardType);
		}

		$request->session()->flash('flash_message', 'ログインに失敗しました');
		return back();
	}
}
