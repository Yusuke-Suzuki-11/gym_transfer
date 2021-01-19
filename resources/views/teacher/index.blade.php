@extends('layout')

@section('content')
{{Auth::user()->name}}

@endsection