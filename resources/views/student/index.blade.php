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


		@foreach ($AuthStudentRow->getLessonRowset()->get() as $LessonRow)
			<div class="st-top-lesson-container">
				{{-- レッスンタイトル枠 --}}
				<div class="st-top-lesson-title">
					<p class="st-top-lesson-date">{{$utility->formatDate($LessonRow->lesson_date)}}</p>
					<div class="st-top-lesson-category">
						<i class="fas fa-clock"></i>
						<span class="st-top-lesson-time">時間</span>
					</div>
					<div class="st-top-lesson-category">
						<i class="fas fa-user-friends"></i>
						<p class="st-top-lesson-tc">担当の先生</p>
					</div>
				</div>
				{{-- メイン情報 --}}
				<div class="st-top-lesson-main">
					<div class="st-top-lesson-mem-box">
						<div class="st-top-lesson-mem-num">
							<span>1</span>：
						</div>
						<div class="st-top-lesson-membox">
							<p>名前</p>
							<p>14歳</p>
							<p>鉄棒14級</p>
							<p>マット14級</p>
							<p>引き継ぎなし</p>
							<p>振替ではない</p>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

@endsection