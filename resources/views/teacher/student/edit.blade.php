@extends('layout')

@section('content')

<form action="{{route('tc.student.update', ['id' => $StudentRow->id])}}">
	@csrf
	<p>名前</p>
	<input type="name" value="{{old('name', $StudentRow->name)}}">
	<p>年齢</p>
	<input type="text" value="" name="age">
	<p>メールアドレス</p>
	<input type="text" value="" name="gender">
	<p>生年月日</p>
	<input type="text" value="{{old('birthday', $StudentRow->birthday)}}">
	<p>会員番号</p>
	<input type="text" value="{{old('member_num', $StudentRow->member_num)}}">
	<p>ストレスポイント</p>
</form>

@endsection