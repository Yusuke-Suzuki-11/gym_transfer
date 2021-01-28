@extends('layout')

@section('content')
<div>ユーザー一覧</div>

@foreach ($StudentRowset as $StudentRow)
    <a href="{{route('tc.student.show', ['id' => $StudentRow->id])}}">
        {{$StudentRow->name}}
    </a>
    <br>
@endforeach

@endsection