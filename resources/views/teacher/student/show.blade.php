@extends('layout')

@section('content')

<div class="tc-index">
	@include('elements.tc_sidebar')

	<div class="tc-main">
		<div class="tc-title-top">
			<p>
				<span>プロフィール</span>
			</p>
		</div>
		<div class="tc-prof-box">
			<div class="tc-prof-content">
				<p>名前　：　{{$StudentRow->full_name}}</p>
			</div>
			<div class="tc-prof-content">
				<p>メールアドレス　：　{{$StudentRow->email}}</p>
			</div>
			<div class="tc-prof-content">
				<p>電話番号　：　{{$StudentRow->phone}}</p>
			</div>
			<div class="tc-prof-content">
				<p>会員番号　：　{{$StudentRow->member_num}}</p>
			</div>
			<div class="tc-prof-content">
				<p>クラス　：　月曜11:00~11:50</p>
			</div>
			<div class="tc-prof-content">
				<p>生年月日　：　{{$StudentRow->birthday}}</p>
			</div>
			<div class="tc-prof-content">
				<p>性別　：　{{$StudentRow->gender}}</p>
			</div>
			<div class="tc-prof-content">
				<p>ストレスポイント　：　{{$StudentRow->stress_point}}</p>
			</div>
			<div class="tc-prof-content">
				<p>今月の振替　：　{{$StudentRow->stress_point}}</p>
			</div>


		</div>

		<a href="{{route('tc.student.edit', ['id' => $StudentRow->id])}}">
			編集
		</a>
	</div>
</div>

{{$StudentRow->name}}



@endsection