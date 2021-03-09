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
					※こちらは振り替えた練習になります。
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
	</div>
@endsection