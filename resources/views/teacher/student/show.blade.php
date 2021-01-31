@extends('layout')

@section('content')

<div class="tc-index">
	@include('elements.tc_sidebar')

	<div class="tc-main">
		<a href="{{route('tc.course')}}">レッスン一覧</a>
		<a href="{{route('tc.student.edit', ['id' => $StudentRow->id])}}">
			編集
		</a>
		名前
	</div>
</div>

{{$StudentRow->name}}



@endsection