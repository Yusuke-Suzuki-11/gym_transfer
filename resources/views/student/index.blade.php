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
			<p class="st-title-txt">
				今月の練習
			</p>
		</div>
		<div class="st-top-lesson">
			@foreach ($AuthStudentRow->getLessonRowset()->orderBy('lesson_date', 'asc')->where('valid', 1)->get() as $LessonRow)
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
				</div>
			@endforeach
		</div>
	</div>

@endsection