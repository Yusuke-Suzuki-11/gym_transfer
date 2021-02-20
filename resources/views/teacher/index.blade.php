@extends('layout')
@inject('utility', 'App\Library\Utility')

@section('content')
@include('elements.tc_sidebar')

<div class="tc-index">

	@if (empty($TodayCourseRowset))
		<div class="tc-title-top">
			<p class="tc-title-txt font-error">
				本日の練習はありません
			<p class="tc-title-date font-error">
				{{$utility->getTodayDate()}}
			</p>
		</div>
	@else
		{{-- タイトル --}}
		<div class="tc-title-top">
			<p class="tc-title-txt">
				本日の練習
			</p>
			<p class="tc-title-date">
				{{$utility->getTodayDateString()}}
			</p>
		</div>

		{{-- 練習情報 --}}
		{{-- 外枠 --}}

		@foreach ($TodayCourseRowset as $__TodayCourseRow)
			<div class="tc-top-lesson-container">
				{{-- レッスンタイトル枠 --}}
				<div class="tc-top-lesson-title">
					<p class="tc-top-lesson-grade">{{$__TodayCourseRow->getGradeRow()->first()->grade}}</p>
					<div class="tc-top-lesson-category">
						<i class="fas fa-clock"></i>
						<span class="tc-top-lesson-time">{{$__TodayCourseRow->getLessonTimeRowByRow()->first()->lesson_time}}</span>
					</div>
					<div class="tc-top-lesson-category">
						<i class="fas fa-user-friends"></i>
						<p class="tc-top-lesson-tc">岸本鷹斗</p>
					</div>
				</div>
				{{-- メイン情報 --}}
				<div class="tc-top-lesson-main">
					@foreach ($__TodayCourseRow->getLessonRowset()->get() as $__LessonRow)
						@php
							$StudentRow = $__LessonRow->getStudentRow()->first();
						@endphp

						<div class="tc-top-lesson-mem-box">
							<div class="tc-top-lesson-mem-num">
								<span>1</span>：
							</div>
							<div class="tc-top-lesson-membox">
								<p>{{$StudentRow->full_name}}</p>
								<p>小学4年生</p>
								<p>鉄棒14級</p>
								<p>マット14級</p>
								<p>引き継ぎなし</p>
								<p>振替ではない</p>
							</div>
						</div>
					@endforeach

				</div>
			</div>
		@endforeach
	@endif
</div>

@endsection