@extends('layout')
@inject('utility', 'App\Library\Utility')
@section('content')
	@if(Session::has("flash_message"))
		<div id="session-success">
			<p class="session-success-message" > {{ session('flash_message') }}</p>
		</div>
	@endif
	@include('elements.st_sidebar')
	<div class="st-index">
		<div class="st-title-top">
			@if (intval(intval(date('m')) == $selectMonth))
				<p class="st-title-txt">
					今月の練習
				</p>
			@else
			<p class="st-title-txt">
				{{$selectMonth}}月の練習
			</p>
			@endif
		</div>
		<div class="st-top-lesson">
			<div class="st-top-month-btn-box">
				@php
					$count = intval(date('m'));
				@endphp
				@for ($i = $count; $i <= intval(date('m')) + 3; $i++)
					<a href="{{route('students', ['month' => $count])}}" class="btn-circle {{$count == $selectMonth ? 'month-btn-active' : ''}}" >{{$count}}月</a>
					@php
					$count = $count < 12 ? $count + 1 : 1;
					@endphp
				@endfor
			</div>
			@foreach ($LessonRowset as $LessonRow)
				<div class="st-top-lesson-container">
					{{-- レッスンタイトル枠 --}}
					<div class="st-top-shadow">
						<div class="st-top-lesson-title">
							<div class="st-top-lesson-title-sub">
								<p class="st-top-lesson-date">{{$utility->formatDate($LessonRow->lesson_date)}}</p>
								<div class="st-top-lesson-category">
									<i class="fas fa-clock"></i>
									<span class="st-top-lesson-time">{{$LessonRow->getLessonTime()}}</span>
								</div>
							</div>
							@if ($CourseStudentInstance->hasTransferEnabled($AuthStudentRow->id, $LessonRow->getCourseRowByRow()->first()->id))
								<div class="st-top-transfer-button">
									<a href="{{route('st.lesson.detail', ['id' => $LessonRow->id])}}" class="btn btn-success transfer-ok">
										振替可能
									</a>
								</div>
							@elseif($LessonRow->attendance == 2)
								<div class="st-top-transfer-button">
									<a href="{{route('st.lesson.comparison_lesson', ['id' => $LessonRow->id])}}" class="btn btn-warning transfered">
										振替済
									</a>
								</div>
							@endif
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

								@php
									$LessonDateRow = $LessonDateInstance->where('date', $LessonRow->lesson_date)->first();
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
										<p class="st-target-lesson-sub-content">　・コーチの指示に従って、当日練習をしよう！</p>
										<br>
										<p class="st-target-lesson-sub-title">練習のポイント</p>
										<p class="st-target-lesson-sub-content">　・コーチの指示に従って、当日練習をしよう！</p>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection