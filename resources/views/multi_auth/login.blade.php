@extends('layout')

@section('content')
	@if(Session::has("flash_message"))
		<p class="alert">{{ Session::get("flash_message") }}</p>
	@endif
	<div class="auth-logo">
		<img src="image/logo.png" alt="ロゴ">
		<span>With Gymnastics</span>
	</div>
	<div class="auth-container">
		<div class="auth-top">
			<p class="auth-top-title">ログイン</p>
			<span>※ウィズ体操クラブ会員専用サイトです</span>
		</div>

		<div class="auth-form">
			<form action="{{route('login')}}" method="POST">
				@csrf
				<input class="auth-login-input" type="text" placeholder="メールアドレス" name="email">

				<input class="auth-login-input" type="password" placeholder="パスワード" name="password">

				<input type="hidden" name="guard_type" value="students">

				<button class="auth-submit-btn" type="submit">ログイン</button>
			</form>
		</div>
	</div>
@endsection