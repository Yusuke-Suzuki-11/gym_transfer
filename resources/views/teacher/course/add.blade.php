@extends('layout')

@section('content')
	<form action="{{route('teachers.course.create')}}">


		<div class="form-content">
			<span>許容人数</span><br>
			<input type="text" placeholder="例）17" name="email"><br>
			<span>レッスンの日付</span><br>
			<input type="text" placeholder="例）17" name="email"><br>

		</div>
	</form>
@endsection