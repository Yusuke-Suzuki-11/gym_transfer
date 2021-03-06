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
				<input type="hidden" name="nowLessonTimeId" value="{{$LessonRow->getCourseRowByRow()->first()->lesson_time_id}}">
				<input type="hidden" name="nowLessonId" value="{{$LessonRow->id}}">
				<input type="date" name='targetDate'>
				<br>

				<div class="st-top-lesson-container">
					{{-- レッスンタイトル枠 --}}
					<div class="st-top-lesson-title">
						<div class="st-top-lesson-title-sub">
							<p class="st-top-lesson-date">振替対象の練習</p>
						</div>
					</div>
					{{-- メイン情報 --}}
					<div class="st-top-lesson-main">
						<div class="st-top-lesson-mem-box">
							<div class="st-top-lesson-mem-category">
								<div class="st-top-sub-title-box">
									<i class="fas fa-user"></i>
									<p class="st-top-sub-title">日時</p>
								</div>
								<p class="st-top-sub-contents">{{$utility->formatDate($LessonRow->lesson_date)}}</p>
							</div>
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
						</div>
					</div>
				</div>
			</form>
		</div>




	</div>


@endsection