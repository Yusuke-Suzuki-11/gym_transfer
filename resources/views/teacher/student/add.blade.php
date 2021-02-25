@extends('layout')

@section('content')
@include('elements.tc_sidebar')

<div class="tc-index" id="app">

	{{-- タイトル --}}
	<div class="tc-title-top">
		<p class="tc-title-txt">
			新規入会者登録
		</p>
	</div>

	<form action="{{route('tc.student.register')}}" method="POST" novalidate>
		@csrf
		<div class="tc-stadd-container">
			{{-- 名前ふぉーむ --}}
			<div class="tc-stadd-form-box">
				<div class="tc-stadd-form-name">
					<p>姓</p>
					<input type="text" name="lastName">
				</div>
				<div class="tc-stadd-form-name">
					<p>名</p>
					<input type="text" name="firstName">
				</div>
			</div>
			<div class="tc-stadd-form-mainbox">
				<p>メールアドレス</p>
				<input type="email" name="email">
			</div>
			<div class="tc-stadd-form-btn">
				<button type="submit" class="btn btn-success">登録</button>
			</div>
		</div>
	</form>
</div>
@endsection