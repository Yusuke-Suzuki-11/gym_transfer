@extends('layout')

@section('content')
<div class="tc-index">
	@include('elements.tc_sidebar')

	<div class="tc-main">
		ここにカレンダー
	</div>
</div>

<a href="{{route('tc.course')}}">レッスン一覧</a>


@endsection