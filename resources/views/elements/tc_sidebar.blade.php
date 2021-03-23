<div class="tc-sidebar">
	<div class="tc-events">
		<div class="tc-event-item">
			<img class="tc-event-item-img" src="/image/test2.jpg">
			<span class="tc-event-name">{{Auth::user()->full_name}}</span>
		</div>
	</div>

	<div class="tc-side-menu-box">

		<div class="tc-side-sub-menu">
			<a href="{{route('tc')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fas fa-check"></i>
					</div>
					<div class="tc-side-menu-title">
						本日の練習
					</div>
				</div>
			</a>
		</div>

		<div class="tc-side-sub-menu">
			<a href="{{route('tc.lesson.calendar')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fas fa-calendar-alt"></i>
					</div>
					<div class="tc-side-menu-title">
						練習計画
					</div>
				</div>
			</a>
		</div>

		<div class="tc-side-sub-menu">
			<a href="{{route('tc.student.index')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fas fa-users"></i>
					</div>
					<div class="tc-side-menu-title">
						生徒一覧
					</div>
				</div>
			</a>
		</div>

		<div class="tc-side-sub-menu">
			<a href="{{route('tc.student.add')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fas fa-user-plus"></i>
					</div>
					<div class="tc-side-menu-title">
						新規生徒登録
					</div>
				</div>
			</a>
		</div>

		<div class="tc-side-sub-menu">
			<a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fas fa-sign-out-alt"></i>
					</div>
					<div class="tc-side-menu-title">
						ログアウト
					</div>
				</div>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</a>
		</div>

	</div>
</div>