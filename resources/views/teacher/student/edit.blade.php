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
		<form action="{{route('tc.student.update', ['id' => $StudentRow->id])}}">
			@csrf
			<p>姓</p>
			<input type="name" value="{{old('last_name', $StudentRow->last_name)}}">
			<p>名</p>
			<input type="name" value="{{old('first_name', $StudentRow->first_name)}}">
			<p>電話番号</p>
			<input type="text" value="{{old('email', $StudentRow->email)}}" name="gender">
			<p>メールアドレス</p>
			<input type="text" value="{{old('email', $StudentRow->phone)}}" name="phone">
			<p>生年月日</p>
			<input type="text" value="{{old('birthday', $StudentRow->birthday)}}">
			<p>会員番号</p>
			<input type="text" value="{{old('member_num', $StudentRow->member_num)}}">
			<p>ストレスポイント</p>
			<select id="stress_point" name="stress_point">
				@foreach (config('const.STUDENTS.STRESS_POINT') as $key => $val)
					<option value="{{ $key }}" {{ $key == 3 ? "selected" : "" }} >{{ $val }}</option>
				@endforeach
			</select>
			<p>性別</p>
			@for ($count = 1; $count <= count(config('const.STUDENTS.GENDER_TYPE')); $count++)
				<input type="radio" name="gender" value="{{$count}}">{{config('const.STUDENTS.GENDER_TYPE')[$count]}}
			@endfor
		</form>
	</div>
</div>


@endsection