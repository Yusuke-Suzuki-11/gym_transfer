@extends('layout')
@inject('utility', 'App\Library\Utility')
@section('content')

	@include('elements.st_sidebar')
	<div class="st-index">
		<div class="st-title-top">
			<p class="st-title-txt">
				{{$utility->formatDate($LessonRow->lesson_date) }}<span >の振替前</span>
			</p>
		</div>

		<div class="compare-box">
			<div class="compare-title">
				<p>
					※こちらは振り替え済の練習になります。
				</p>
			</div>

			<div class="st-top-lesson-container">
				{{-- レッスンタイトル枠 --}}
				<div class="st-top-lesson-title">
					<div class="st-top-lesson-title-sub">
						<p class="st-top-lesson-date">{{$utility->formatDate($OldLessonRow->lesson_date)}}</p>
						<div class="st-top-lesson-category">
							<i class="fas fa-clock"></i>
							<span class="st-top-lesson-time">{{$OldLessonRow->getLessonTime()}}</span>
						</div>
					</div>
					<div class="st-top-transfer-button">
						<a href="{{route('st.lesson.comparison_lesson', ['id' => $OldLessonRow->id])}}" class="btn btn-danger transfered" style="color:white;ß">
							振替したため参加できません
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
							<p class="st-top-sub-contents">{{$OldLessonRow->getGrade()}}<span> クラス</span> </p>
						</div>




						@php
							$LessonDateRow = $LessonDateInstance->where('date', $OldLessonRow->lesson_date)->first();
							$i = 0;
						@endphp
						@if (isset($LessonDateRow->floor_flag))
							@php
								$i += 1
							@endphp
							<div class="st-top-lesson-mem-category">
								<div class="st-top-sub-title-box">
									<i class="fas fa-check-circle"></i>
									<p class="st-top-sub-title">練習項目{{$i}}：{{config('const.LESSON_TYPE')['floor']}}</p>
								</div>
								<p class="st-target-lesson-sub-title first">練習中の技</p>
								<p class="st-target-lesson-sub-content">　{{$AuthStudentRow->getFloorNowPractice()}}</p>
								<br>
								<p class="st-target-lesson-sub-title">練習のポイント</p>
								@if (isset($AuthStudentRow->getFloorRow()->first()->first_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getFloorRow()->first()->first_description}}</p>
								@endif
								@if (isset($AuthStudentRow->getFloorRow()->first()->second_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getFloorRow()->first()->second_description}}</p>
								@endif
								@if (isset($AuthStudentRow->getFloorRow()->first()->third_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getFloorRow()->first()->third_description}}</p>
								@endif
							</div>
						@endif


						@if (isset($LessonDateRow->bar_flag))
							@php
								$i += 1
							@endphp
							<div class="st-top-lesson-mem-category">
								<div class="st-top-sub-title-box">
									<i class="fas fa-check-circle"></i>
									<p class="st-top-sub-title">練習項目{{$i}}：{{config('const.LESSON_TYPE')['bar']}}</p>
								</div>
								<p class="st-target-lesson-sub-title first">練習中の技</p>
								<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getBarNowPractice()}}</p>
								<br>
								<p class="st-target-lesson-sub-title">練習のポイント</p>
								@if (isset($AuthStudentRow->getBarRow()->first()->first_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getBarRow()->first()->first_description}}</p>
								@endif
								@if (isset($AuthStudentRow->getBarRow()->first()->second_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getBarRow()->first()->second_description}}</p>
								@endif
								@if (isset($AuthStudentRow->getBarRow()->first()->third_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getBarRow()->first()->third_description}}</p>
								@endif
							</div>
						@endif

						@if (isset($LessonDateRow->vaulting_flag))
							@php
								$i += 1
							@endphp
							<div class="st-top-lesson-mem-category">
								<div class="st-top-sub-title-box">
									<i class="fas fa-check-circle"></i>
									<p class="st-top-sub-title">練習項目{{$i}}：{{config('const.LESSON_TYPE')['vaulting']}}</p>
								</div>
								<p class="st-target-lesson-sub-title first">練習中の技</p>
								<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getVaultingNowPractice()}}</p>
								<br>
								<p class="st-target-lesson-sub-title">練習のポイント</p>
								@if (isset($AuthStudentRow->getVaultingHourseRow()->first()->first_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getVaultingHourseRow()->first()->first_description}}</p>
								@endif
								@if (isset($AuthStudentRow->getVaultingHourseRow()->first()->second_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getVaultingHourseRow()->first()->second_description}}</p>
								@endif
								@if (isset($AuthStudentRow->getVaultingHourseRow()->first()->third_description))
									<p class="st-target-lesson-sub-content">　・{{$AuthStudentRow->getVaultingHourseRow()->first()->third_description}}</p>
								@endif
							</div>
						@endif

						@if (isset($LessonDateRow->trampoline_flag))
							@php
								$i += 1
							@endphp
							<div class="st-top-lesson-mem-category">
								<div class="st-top-sub-title-box">
									<i class="fas fa-check-circle"></i>
									<p class="st-top-sub-title">練習項目{{$i}}：{{config('const.LESSON_TYPE')['trampoline']}}</p>
								</div>
								<p class="st-target-lesson-sub-title first">練習中の技</p>
								<p class="st-target-lesson-sub-content">　・跳躍力を鍛えよう！</p>
								<br>
								<p class="st-target-lesson-sub-title">練習のポイント</p>
								<p class="st-target-lesson-sub-content">　・跳躍力を鍛えよう！</p>
							</div>
						@endif

						@if (isset($LessonDateRow->other_flag))
							@php
								$i += 1
							@endphp
							<div class="st-top-lesson-mem-category">
								<div class="st-top-sub-title-box">
									<i class="fas fa-check-circle"></i>
									<p class="st-top-sub-title">練習項目{{$i}}：{{config('const.LESSON_TYPE')['other']}}</p>
								</div>
								<p class="st-target-lesson-sub-title first">練習中の技</p>
								<p class="st-target-lesson-sub-content">　{{$AuthStudentRow->getVaultingNowPractice()}}</p>
								<br>
								<p class="st-target-lesson-sub-title">練習のポイント</p>
								<p class="st-target-lesson-sub-content">　・その他の練習は何が起きるのか</p>
							</div>
						@endif
					</div>
				</div>
				<a class="btn btn-info st-compare-back-btn" href="{{route('students', ['month' => intval(date('m', strtotime($LessonRow->lesson_date)))])}}">練習一覧にもどる</a>
			</div>
		</div>
	</div>
@endsection