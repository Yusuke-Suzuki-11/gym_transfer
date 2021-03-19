@extends('layout')

@inject('utility', 'App\Library\Utility')

@section('content')
	@include('elements.tc_sidebar')
	<div class="st-index">
		<div class="tc-title-top">
			<p class="tc-title-txt">
				練習計画編集
			</p>
		</div>

		<div class="st-top-month-btn-box">
			@php
				$now = date('Y-m');
				$threeMonthLater = date('Y-m', strtotime($now . '+3 month'));
				$targetDate = $now;
			@endphp
			@while ($targetDate <= $threeMonthLater)
				<a href="{{route('tc.lesson.calendar.edit', ['yearMonth' => date('Y-m',strtotime($targetDate))])}}" class="btn-circle {{date('Y-m', strtotime($targetDate)) == date('Y-m', strtotime($start)) ? 'month-btn-active' : ''}}" >{{intval(date('m', strtotime($targetDate)))}}月</a>
				@php
					$targetDate = date('Y-m', strtotime($targetDate . '+1 month'))
				@endphp
			@endwhile
		</div>

		<form action="{{route('tc.lesson.calendar.update', ['yearMonth' => date('Y-m', strtotime($start))])}}" method="POST">
			<div class="tc-calendar-edit-list">
				<div class="tc-calendar-edit-header">
					{{intval(date('m', strtotime($start))) . '月'}}
				</div>
				@foreach ($dateArray as $date)
					<div class="tc-date-item-box {{intval(date('w', strtotime($date))) == 0 || intval(date('w', strtotime($date))) == 6 ? 'yattaze' : '' }}">
						<div class="tc-date-title">
							<p class="tc-date-txt">
								{{intval(date('d', strtotime($date)))}}日{{$utility->getShortWeek($date)}}
							</p>
						</div>

						<div class="tc-date-form">
							@csrf
							<div class="tc-date-form-check">
								<input type="checkbox" value="1" name="{{$date}}[floor]" id="{{$date}}-floor">
								<label for="{{$date}}-floor">マット</label>
							</div>
							<div class="tc-date-form-check">
								<input type="checkbox" value="1" name="{{$date}}[bar]" id="{{$date}}-bar">
								<label for="{{$date}}-bar">鉄棒</label>
							</div>
							<div class="tc-date-form-check">
								<input type="checkbox" value="1" name="{{$date}}[vaulting]" id="{{$date}}-vaulting">
								<label for="{{$date}}-vaulting">とび箱</label>
							</div>
							<div class="tc-date-form-check">
								<input type="checkbox" value="1" name="{{$date}}[trampoline]" id="{{$date}}-trampoline">
								<label for="{{$date}}-trampoline">トランポリン</label>
							</div>
							<div class="tc-date-form-check">
								<input type="checkbox" value="1" name="{{$date}}[other]" id="{{$date}}-other">
								<label for="{{$date}}-other">その他</label>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="tc-date-submit">
				<button type="submit" class="btn btn-success tc-date-btn">送信する</button>
			</div>
		</form>
	</div>
@endsection

