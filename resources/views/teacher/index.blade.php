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
				{{$utility->getTodayDateString()}}
			</p>
		</div>
	@else
		{{-- タイトル --}}
		<div class="tc-title-top">
			<p class="tc-title-txt">
				本日の練習
				<span>
					@if (!empty($todayLessons))
						（{{$todayLessons}}）
					@endif
				</span>
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
					@php
						$count = 0;
						$__LessonRowset = $__TodayCourseRow->getTodayLessonRowset()->get();
					@endphp
					@if (count($__LessonRowset) > 0)
						@foreach ($__LessonRowset as $__LessonRow)
							@php
								$StudentRow = $__LessonRow->getStudentRow()->first();
							@endphp
							<div class="tc-top-lesson-mem-box">
								<div class="tc-top-lesson-mem-num">
									<span>{{$count += 1}}</span>：
								</div>
								<div class="tc-top-lesson-membox">
									<p>{{$StudentRow->full_name}}</p>
									<p>{{$utility->getAgeByBirthDay($StudentRow->birthday). '歳'}}</p>
									<p>鉄棒{{$StudentRow->getBarLevel()}}</p>
									<p>マット{{$StudentRow->getFloorLevel()}}</p>
									<p>とび箱{{$StudentRow->getVaultingHourseLevel()}}</p>
									<p>振替ではない</p>
								</div>
							</div>
						@endforeach
					@else
						<div class="tc-top-lesson-mem-emp">
							<p class="text font-error">
								参加生徒はいません
							</p>
						</div>
					@endif
				</div>
			</div>
		@endforeach
	@endif
</div>

@endsection