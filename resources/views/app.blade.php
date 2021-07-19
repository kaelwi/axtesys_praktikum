<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Manager</title>
	
	<link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">

</head>
<body>

	<header>
		<h1><a href="http://localhost/lumen/public/">Contact Manager</a></h1>
	</header>
	
	<section>
		<nav>
			@yield('order')
		</nav>
		
		<article>
			@yield('content')
		</article>
	</section>
	
	<footer>
		<p>praktikum wild/axtesys</p>
	</footer>

</body>
</html>