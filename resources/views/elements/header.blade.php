<div class="header">
	<div class="header-container">
		<p class="header-logo">With Gymnastics</p>
	</div>

	<div class="header-menu">
		<ul>
			<li class="header-menu-item">
				<a href="#">ホームページ</a>
			</li>

			@auth('students')
				<li class="header-menu-item">
					<a href="#">振替申請</a>
				</li>
			@endauth

			@auth('teachers')


			@endauth
		</ul>
	</div>
</div>