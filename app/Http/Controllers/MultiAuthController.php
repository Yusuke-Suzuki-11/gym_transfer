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

		if(Auth::guard($guardType)->attempt($authCredentials)){
			return redirect($guardType);
		}
		return back()->withErrors(['auth' => ['ログインに失敗しました']]);
	}

	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		session()->flash('flash_message', 'ログアウトしました');
		return redirect(route('login'));
	}
}
