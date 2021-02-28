@extends('layout')

@section('content')
	@if(Session::has("flash_message"))
		<div id="session-success">
			<p class="session-success-message" > {{ session('flash_message') }}</p>
		</div>
	@endif
	@include('elements.st_sidebar')
	<div class="st-index">
		<div class="st-calendar" id="app">
			<full-calendar-component v-bind:date-data="{{ $JsonLessonDate }}">
			</full-calendar-component>
		</div>
	</div>

@endsection