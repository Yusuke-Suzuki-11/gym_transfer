@extends('layout')

@section('content')

@foreach ($courseRowset as $item)
{{  $item->week()->first()->day_of_week . ' ' .$item->lessonTime()->first()->lesson_time}}

<br>
@endforeach

@endsection