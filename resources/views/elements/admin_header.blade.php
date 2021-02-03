<div class="admin-header-top">
	<div class="header">
		<div class="header-container">
			<p class="header-logo">With Gymnastics</p>
		</div>

		<div class="header-menu">
			<ul>
				@auth('teachers')
					<li class="header-menu-item">
						<a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
							ログアウト
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
                    </li>
					<li class="header-menu-item">
						<a href="#">
                            本日の練習
						</a>
                    </li>
					<li class="header-menu-item">
						<a href="{{route('tc.student.index')}}">
                            生徒一覧
						</a>
                    </li>
				@endauth
			</ul>
		</div>
	</div>

</div>