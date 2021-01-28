@extends('layout')

@section('content')
<a href="{{route('')}}">
    編集
</a>

名前
{{$StudentRow->name}}



@endsection