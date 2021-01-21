<div class="header">
	<div class="header-container">
		<p class="header-logo">With Gymnastics</p>
	</div>

	<div class="header-menu">
		<ul>
			@auth('students')
				<li class="header-menu-item">
					<a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
						ログアウト
					</a>
				</li>
				<li class="header-menu-item">
					<a href="#">振替申請</a>
				</li>
				<li class="header-menu-item">
					<a href="#">ホームページ</a>
				</li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			@endauth

			@auth('teachers')
				<li class="header-menu-item">
					<a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
						ログアウト
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>


			@endauth
		</ul>
	</div>
</div>