<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>With gymnastics | 動的タイトル</title>
		<link href="/css/app.css" rel="stylesheet" type="text/css">
	</head>
	<header>
		@yield('header')
	</header>

	<body class="antialiased">
		@yield('content')
	</body>
</html>
