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
					<p>
						姓
						@error('lastName')
							<span class="font-error error-min">※{{ $message }}</span>
						@enderror
					</p>
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

			{{-- <div class="tc-stadd-form-mainbox">
				<p>パスワード</p>
				<input type="password" name="password">
			</div>
			<div class="tc-stadd-form-mainbox">
				<p>パスワード確認</p>
				<input type="password" name="passwordConfirm">
			</div> --}}

			<div class="tc-stadd-form-mainbox">
				<p>生年月日</p>
				<input type="date" name="birthday">
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>性別</p>
				<select name="gender">
					<option class="dummy" disabled selected>
						性別を選択してください
					</option>
					@foreach (config('const.STUDENTS.GENDER_TYPE') as $key => $val)
					<option value="{{$key}}">
						{{$val}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>電話番号</p>
				<input type="text" name="phone">
			</div>

			<div class="tc-stadd-form-mainbox">
				<p>コース</p>
				<select name="courseId">
					<option class="dummy" disabled selected>
						コースを選択してください
					</option>
					@foreach ( $CourseRowset as $CourseRow)
					<option value="{{$CourseRow->id}}">
						{{$CourseRow->getWeekAndLessonTimes()}}
					</option>
					@endforeach
				</select>
			</div>


			<div class="tc-stadd-form-btn">
				<button type="submit" class="btn btn-success">登録</button>
			</div>
		</div>
	</form>
</div>
@endsection