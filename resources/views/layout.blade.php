<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>With gymnastics | 動的タイトル</title>
		<link href="/css/app.css" rel="stylesheet" type="text/css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.css" rel='stylesheet'>
		<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.css" rel='stylesheet'>
		<link href="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css" rel='stylesheet'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.4.0/main.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.3.0/main.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/vue@4.2.2/main.umd.min.js"></script>
	</head>
	<header>
		@auth('teachers')
			@include('elements.admin_header')
		@else
			@include('elements.header')
		@endauth
	</header>
	<body>
		@yield('content')
		@include('js.session_message_js')
		<script src="{{mix('js/app.js')}}"></script>
	</body>
</html>