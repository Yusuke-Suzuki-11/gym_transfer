@extends('layout')
@inject('utility', 'App\Library\Utility')
@section('content')

@include('elements.st_sidebar')
	<div class="st-index" id="app">
		<div class="st-title-top">
			<p class="st-title-txt">
				振替申請
			</p>
			<p class="st-sub-title-text">
				【{{$utility->formatDate($LessonRow->lesson_date) }}】
				<br>
				<span>
					の練習を変更します。
				</span>
			</p>
		</div>

		<div class="st-transfer">
			<p>
				※ご都合の良い日付を選択してください
			</p>
			<form action="{{route('st.lesson.transfer')}}" method="POST">
				@csrf
				{{-- ここからコンポーネント --}}
				<student-transfer-select-component
					:lesson-data-for-select={{$LessonSelectItemForJson}}
					>
				</student-transfer-select-component>
			</form>
		</div>
	</div>


@endsection