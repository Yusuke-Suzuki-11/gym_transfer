<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>With gymnastics | 動的タイトル</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="/css/app.css" rel="stylesheet" type="text/css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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