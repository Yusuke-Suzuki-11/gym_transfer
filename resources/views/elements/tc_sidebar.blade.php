<div class="tc-sidebar">
	<div class="tc-events">
		<div class="tc-event-item">
			<img class="tc-event-item-img" src="/image/test2.jpg">
			<span class="tc-event-name">{{Auth::user()->full_name}}</span>
		</div>
	</div>

	<div class="tc-side-menu-box">
		{{-- 一つの項目 --}}
		<div class="tc-side-sub-menu">
			<a href="{{route('tc.student.index')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fab fa-apple"></i>
					</div>
					<div class="tc-side-menu-title">
						生徒一覧
					</div>
				</div>
			</a>
		</div>


		<div class="tc-side-sub-menu">
			<a href="{{route('tc')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fab fa-apple"></i>
					</div>
					<div class="tc-side-menu-title">
						本日の練習
					</div>
				</div>
			</a>
		</div>
		<div class="tc-side-sub-menu">
			<a href="{{route('tc.student.add')}}">
				<div class="tc-side-menu-item">
					<div class="tc-side-menu-icon">
						<i class="fab fa-apple"></i>
					</div>
					<div class="tc-side-menu-title">
						新規会員登録
					</div>
				</div>
			</a>
		</div>





	</div>



</div>