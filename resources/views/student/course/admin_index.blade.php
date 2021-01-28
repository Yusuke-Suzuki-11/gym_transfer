@extends('layout')

@section('content')

<div>レッスン一覧</div>
@foreach ($CourseRowset as $CourseRow)

{{$CourseRow->week()->first()->day_of_week . ' ' .$CourseRow->lessonTime()->first()->lesson_time}}
<br>
@endforeach
<br>
<br>
<br>
<div>生徒一覧</div>
@foreach ($StudentRowset as $StudentRow)
{{$StudentRow->name}}
<br>

@endforeach
@endsection