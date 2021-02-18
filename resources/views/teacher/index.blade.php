@extends('layout')

@section('content')
@include('elements.tc_sidebar')
<div class="tc-index">
	{{-- タイトル --}}
	<div class="tc-title-top">
		<p class="tc-title-txt">
			本日の練習
		</p>
		<p class="tc-title-date">
			2021年03月21日(火)
		</p>
	</div>


	{{-- 練習情報 --}}
	{{-- 外枠 --}}
	<div class="tc-top-lesson-container">

		{{-- レッスンタイトル枠 --}}
		<div class="tc-top-lesson-title">

			<p class="tc-top-lesson-grade">幼児クラス</p>


			<div class="tc-top-lesson-category">
				<i class="fas fa-clock"></i>
				<span class="tc-top-lesson-time">10:00 ~ 11:00</span>
			</div>
			<div class="tc-top-lesson-category">
				<i class="fas fa-user-friends"></i>
				<p class="tc-top-lesson-tc">岸本鷹斗</p>
			</div>


		</div>

		{{-- メイン情報 --}}
		<div class="tc-top-lesson-main">

			<div class="tc-top-lesson-mem-box">

				<div class="tc-top-lesson-mem-num">
					<span>1</span>：
				</div>

				<div class="tc-top-lesson-membox">
					<p>テスト</p>
					<p>鈴木佑輔</p>
					<p>小学4粘性</p>
					<p>小学4粘性</p>
					<p>小学4粘性</p>
					<p>小学4粘性</p>
				</div>

			</div>


		</div>



	</div>
</div>

@endsection