@extends('layout')

@section('content')
	@include('elements.tc_sidebar')
	<div class="st-index">
        <div class="tc-title-top">
            <p class="tc-title-txt">
                練習計画表
            </p>
        </div>
		<div class="st-calendar" id="app">
			<select-lesson-calendar v-bind:date-data="{{ json_encode($dateDataForJson) }}">
			</select-lesson-calendar>
		</div>
        <div class="calender-btn-box">
            <a href="{{route('tc.lesson.calendar.edit', ['yearMonth' => date('Y-m')])}}" class="btn btn-info">練習計画を修正する</a>
        </div>
	</div>
@endsection