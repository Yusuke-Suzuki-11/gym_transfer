@extends('layout')

@section('content')
<div class="tc-index">
	@include('elements.tc_sidebar')

	<div class="tc-main">
		<div class="tc-title-top">
			<p>
				<span>{{$StudentRow->full_name}}</span><span style="font-size: 0.8rem">{{$StudentRow->gender == 1 ? 'くん' : 'さん'}}</span>
				<span>プロフィール編集</span>
			</p>
		</div>
		<form action="{{route('tc.student.update', ['id' => $StudentRow->id])}}" method="POST">
			@csrf
			<p>姓</p>
			<input type="name" value="{{old('last_name', $StudentRow->last_name)}}" name="last_name">
			<p>名</p>
			<input type="name" value="{{old('first_name', $StudentRow->first_name)}}" name="first_name">
			<p>電話番号</p>
			<input type="text" value="{{old('phone', $StudentRow->phone)}}" name="phone">
			<p>メールアドレス</p>
			<input type="text" value="{{old('email', $StudentRow->email)}}" name="email">
			<p>生年月日</p>
			<input type="date" value="{{old('birthday', $StudentRow->birthday)}}" name="birthday">
			<p>会員番号</p>
			<input type="text" value="{{old('member_num', $StudentRow->member_num)}}" name="member_num">
			<p>ストレスポイント</p>
			<select id="stress_point" name="stress_point">
				@foreach (config('const.STUDENTS.STRESS_POINT') as $key => $val)
					<option value="{{ $key }}" {{ $key == old('stress_point', $StudentRow->stress_point) ? "selected" : "" }} >{{ $val }}</option>
				@endforeach
			</select>
			<p>性別</p>
			@for ($count = 1; $count <= count(config('const.STUDENTS.GENDER_TYPE')); $count++)
				<input type="radio" name="gender" {{ $count == old('gender', $StudentRow->gender) ? 'checked' : '' }} value="{{$count}}">{{config('const.STUDENTS.GENDER_TYPE')[$count]}}
			@endfor
			<p>通っているクラス</p>
			@php
				$__StudentCourseRowset = $StudentRow->getCourseRowsetByRowset()->get();
			@endphp
			@if (count($__StudentCourseRowset))
				@foreach ($__StudentCourseRowset as $__StudentCourseRow)
					{{$__StudentCourseRow->getWeekAndLessonTimes()}}
				@endforeach

			@endif
			<br>

			<p>クラスを追加する</p>
			<select name="course_id" id="course">
				@foreach ($CourseRowset as $CourseRow)
					<option value="{{$CourseRow->id}}">{{$CourseRow->getWeekAndLessonTimes()}}</option>
				@endforeach
			</select>

			<button type="submit">送信</button>

		</form>
	</div>
</div>


@endsection