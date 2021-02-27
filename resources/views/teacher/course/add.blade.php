@extends('layout')

@section('content')

@include('elements.tc_sidebar')
{{-- タイトル --}}
<div class="tc-title-top">
	<p class="tc-title-txt">
		本日の練習
	</p>
	<p class="tc-title-date">
		{{$utility->getTodayDateString()}}
	</p>




	<form action="{{route('teachers.course.create')}}">


		<div class="form-content">
			<span>許容人数</span><br>
			<input type="text" placeholder="例）17" name="email"><br>
			<span>レッスンの日付</span><br>
			<input type="text" placeholder="例）17" name="email"><br>

		</div>
	</form>
</div>
@endsection

