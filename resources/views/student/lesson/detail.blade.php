@extends('layout')
@inject('utility', 'App\Library\Utility')
@section('content')

@include('elements.st_sidebar')
	<div class="st-index">
		<div class="st-title-top">
			<p class="st-title-txt">
				振替申請
			</p>
		</div>

		<div class="st-top-lesson-container">
			{{-- レッスンタイトル枠 --}}
			<div class="st-top-lesson-title">
				<div class="st-top-lesson-title-sub">
					<p class="st-top-lesson-date">{{$utility->formatDate($LessonRow->lesson_date)}}</p>
					<div class="st-top-lesson-category">
						<i class="fas fa-clock"></i>
						<span class="st-top-lesson-time">{{$LessonRow->getLessonTime()}}</span>
					</div>
				</div>
				<div class="st-top-transfer-button">
					<a href="{{route('st.lesson.detail', ['id' => $LessonRow->id])}}" class="btn btn-success">
						振替可能
					</a>
				</div>
			</div>
			{{-- メイン情報 --}}
			<div class="st-top-lesson-main">
				<div class="st-top-lesson-mem-box">

					<div class="st-top-lesson-mem-category">
						<div class="st-top-sub-title-box">
							<i class="fas fa-user"></i>
							<p class="st-top-sub-title">担当コーチ</p>
						</div>
						<p class="st-top-sub-contents">岸本 鷹斗<span> コーチ</span></p>
					</div>

					<div class="st-top-lesson-mem-category">
						<div class="st-top-sub-title-box">
							<i class="fas fa-star"></i>
							<p class="st-top-sub-title">クラス</p>
						</div>
						<p class="st-top-sub-contents">{{$LessonRow->getGrade()}}<span> クラス</span> </p>
					</div>

					<div class="st-top-lesson-mem-category">
						<div class="st-top-sub-title-box">
							<i class="fas fa-check-circle"></i>
							<p class="st-top-sub-title">練習項目１</p>
						</div>
						<p class="st-top-sub-contents">ここに練習項目の説明や名前が入ります。</span> </p>
					</div>

					<div class="st-top-lesson-mem-category">
						<div class="st-top-sub-title-box">
							<i class="fas fa-check-circle"></i>
							<p class="st-top-sub-title">練習項目２</p>
						</div>
						<p class="st-top-sub-contents">ここに練習項目の説明や名前が入ります。</span> </p>
					</div>

				</div>
			</div>
		</div>



		{{-- <p>
			現在のレッスン
		</p>
		@php
			$__week = $LessonRow->getCourseRowByRow()->first()->week()->first()->day_of_week;
		@endphp
		{{$LessonRow->lesson_date . '('. $__week .')'}}


		<form action="{{route('st.lesson.transfer')}}" method="POST">
			@csrf
			<input type="hidden" name="nowLessonTimeId" value="{{$LessonRow->getCourseRowByRow()->first()->lesson_time_id}}">
			<input type="hidden" name="nowLessonId" value="{{$LessonRow->id}}">

			<p>日付を選択してください</p>
			<input type="date" name='targetDate'>
			<br>
			<button type="submit">test</button>
		</form> --}}
	</div>


@endsection