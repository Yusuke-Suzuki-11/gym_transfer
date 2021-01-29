@extends('layout')

@section('content')
@foreach ($courseArry as $item)
{{$item}}
<br>

@endforeach
@endsection