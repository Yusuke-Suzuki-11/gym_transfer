@extends('layout')

@section('content')
@foreach ($CourseRowset as $CourseRow)
	{{$CourseRow->getWeekAndLessonTimes()}}
	<br>

@endforeach
@endsection