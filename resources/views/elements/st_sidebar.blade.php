<div class="st-sidebar">
	<div class=""></div>
	<div class="st-events">
		<div class="st-event-item">
			<img class="st-event-item-img" src="/image/test2.jpg">
			<span class="st-event-name">床:{{$AuthStudentRow->getFloorRow()->first()->getLevel()}}</span>
		</div>
		<div class="st-event-item">
			<img class="st-event-item-img" src="/image/test2.jpg">
			<span class="st-event-name">鉄棒:{{$AuthStudentRow->getBarRow()->first()->getLevel()}}</span>
		</div>
		<div class="st-event-item">
			<img class="st-event-item-img" src="/image/test2.jpg">
			<span class="st-event-name">とび箱:{{$AuthStudentRow->getVaultingHourseRow()->first()->getLevel()}}</span>
		</div>
	</div>
	<div class="st-side-menu-box">
		<div class="st-side-menu">

			<div class="st-side-sub-menu">
				<a href="#">
					<div class="st-side-menu-item">
						<div class="st-side-menu-icon">
							<i class="fas fa-user-alt"></i>
						</div>
						<div class="st-side-menu-title">
							プロフィール
						</div>
					</div>
				</a>
			</div>

			<div class="st-side-sub-menu">
				<a href="{{route('students')}}">
					<div class="st-side-menu-item">
						<div class="st-side-menu-icon">
							<i class="fas fa-star"></i>
						</div>
						<div class="st-side-menu-title">
							今月の練習
						</div>
					</div>
				</a>
			</div>

			<div class="st-side-sub-menu">
				<a href="{{route('st.calendar')}}">
					<div class="st-side-menu-item">
						<div class="st-side-menu-icon">
							<i class="fas fa-calendar-alt"></i>
						</div>
						<div class="st-side-menu-title">
							カレンダー
						</div>
					</div>
				</a>
			</div>

			<div class="st-side-sub-menu">
				<a href="https://with-gym.com/contact.html" target="_blank" rel="noopener noreferrer">
					<div class="st-side-menu-item">
						<div class="st-side-menu-icon">
							<i class="fas fa-question-circle"></i>
						</div>
						<div class="st-side-menu-title">
							お問いあわせ
						</div>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>