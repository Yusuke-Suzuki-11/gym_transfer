@extends('layout')

@section('content')
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
			<form action="{{}}" method="POST">
				@csrf

				<input class="auth-login-input" type="text" placeholder="会員番号を入力してください">

				<input class="auth-login-input" type="text" placeholder="パスワードを入力してください">

				<button class="auth-submit-btn" type="submit">ログイン</button>
			</form>
		</div>
	</div>
@endsection