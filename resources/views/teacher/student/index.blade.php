@extends('layout')
@inject('utility', 'App\Library\Utility')

@section('content')
@include('elements.tc_sidebar')
<div class="tc-index" id="app">
	<div class="tc-title-top">
		<p class="tc-title-txt">
			生徒一覧
		</p>
	</div>
		<student-search-component
			:form-item={{$formItemJson}}
			:url={{json_encode(route('tc.student.search'))}}
			:studens={{$Students}}
		></student-search-component>
</div>


