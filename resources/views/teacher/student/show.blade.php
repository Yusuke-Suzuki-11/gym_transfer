@extends('layout')

@section('content')
<a href="{{route('tc.student.edit', ['id' => $StudentRow->id])}}">
	編集
</a>

名前
{{$StudentRow->name}}



@endsection