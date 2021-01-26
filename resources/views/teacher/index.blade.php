@extends('layout')

@section('content')
@foreach ($CourseRowset as $CourseRow)
    @foreach ($CourseRow->week()->get() as $week){
        {{$CourseRow->Week()->get()->first()->day_of_week + $week->lesson_times()->get()->id}}
    }
@endforeach

@endsection