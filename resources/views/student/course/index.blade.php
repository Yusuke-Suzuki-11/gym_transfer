@extends('layout')

@section('content')
@php
    $__count = 1;
@endphp
<div>
    @foreach ($AuthStudentRow->getLessonRowsetByRow()->get() as $__LessonRow)
    <a href="">
        <p>今月の練習{{$__count}}</p>
    </a>
    @php
        $__count ++;
    @endphp
    <p>日付</p>
    {{$__LessonRow->first()->getCourseRowByRow()->first()->week()->first()->day_of_week}}
    {{$__LessonRow->lesson_date}}
    <br>
    <br>

    @endforeach
</div>


@endsection