@extends('layout')

@section('content')
<p>
	現在のレッスン
</p>
@php

	$__week = $LessonRow->getCourseRowByRow()->first()->week()->first()->day_of_week;
@endphp
{{$LessonRow->lesson_date . '('. $__week .')'}}


<form action="{{route('st.lesson.transfer')}}" method="POST">
	@csrf
	<input type="hidden" name="nowLessonId" value="{{$LessonRow->getCourseRowByRow()->first()->lesson_time_id}}">

	<p>日付を選択してください</p>
	<input type="date" name='targetDate'>
	<br>
	<button type="submit">test</button>
</form>

@endsection