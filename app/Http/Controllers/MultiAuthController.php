<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MultiAuthController extends Controller
{
	public function showLoginForm()
	{
		return view('multi_auth.login');
	}

	public function login(Request $request)
	{
		$authCredentials = $request->only('email', 'password');
		$guardType = $request->guard_type;
		dd(Auth::attempt(['email' => $request->email, 'password' => $request->password]));

		dd(Auth::guard('students'));


		if(Auth::guard($guardType)->attempt($authCredentials)){
			dd('test');
			return redirect($guardType.'/dashboard');
		}

		return back()->withErrors(['auth' => ['ログインに失敗しました']]);

	}
}
