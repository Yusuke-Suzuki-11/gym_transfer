@extends('layout')

@section('content')
	@if(Session::has("flash_message"))
		<div id="session-success">
			<p class="session-success-message" > {{ session('flash_message') }}</p>
		</div>
	@endif
	<div class="st-index">
		@include('elements.st_sidebar')

		<div class="st-calendar">
			ここにカレンダー

		</div>
	</div>

@endsection