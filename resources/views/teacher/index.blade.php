@extends('layout')

@section('content')
@foreach ($CourseRowset as $CourseRow)
{{$CourseRow->id}}
<br>

@endforeach

@endsection