<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>With gymnastics | 動的タイトル</title>
		<link href="/css/app.css" rel="stylesheet" type="text/css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	</head>
	<header>
		@include('elements.header')
	</header>

	<body>
		@yield('content')
		@include('js.session_message_js')
	</body>
</html>
