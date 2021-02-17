<div class="tc-sidebar">
	<div class="tc-events">
		<div class="tc-event-item">
			<img class="tc-event-item-img" src="/image/test2.jpg">
			<span class="tc-event-name">{{Auth::user()->full_name}}</span>
		</div>
	</div>
	<div class="tc-side-menu-box">
		<div class="tc-side-menu">
			<ul>
				<li class="tc-side-menu-li">
					<div class="tc-side-menu-item">
						<a href="">
							コースを編集する
						</a>
					</div>
				</li>
				<li class="tc-side-menu-li">
					<a href="{{route('tc.student.add')}}">
						<div class="tc-side-menu-item">
							新規入会者登録
						</div>
					</a>
				</li>
				<li class="tc-side-menu-li">
					<a href="{{route('tc.student.index')}}">
						<div class="tc-side-menu-item">
							生徒を編集する
						</div>
					</a>
				</li>
				<li class="tc-side-menu-li">
					<div class="tc-side-menu-item">
						本日の練習
					</div>
				</li>
				<li class="tc-side-menu-li">
					<div class="tc-side-menu-item">
						告知をする
					</div>
				</li>
				<li class="tc-side-menu-li">
					<div class="tc-side-menu-item">
						<a href="{{route('tc.course')}}">
							レッスン一覧
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>