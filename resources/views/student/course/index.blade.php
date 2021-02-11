@extends('layout')

@section('content')
@php
    $__count = 1;
@endphp
<div>
    @foreach ($AuthStudentRow->getLessonRowsetByRow()->get() as $__LessonRow)
    <a href="{{route('st.lesson.detail', ['id' => $__LessonRow->id])}}">
        <p>今月の練習{{$__count}}</p>
    </a>
    @php
        $__count ++;
    @endphp
    <p>日付</p>
    {{$__LessonRow->lesson_date}}
    {{$__LessonRow->getCourseRowByRow()->first()->getWeekAndLessonTimes()}}
    <br>
    <br>

    @endforeach
</div>


@endsection