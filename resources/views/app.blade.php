<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ get_template_directory_uri() }}/assets/css/style.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <?php wp_head(); ?>

</head>
<body>

    <header id="header" class="row">
        <div class="columns small-12 large-6">
            <h1 class="logo"><span class="lara">Lara</span><span class="press">Press</span></h1>
        </div>
        <nav class="columns small-12 large-6">
            <ul>
                <li><a href="#">Learn</a></li>
                <li><a href="#">Install</a></li>
                <li><a href="#">Documentation</a></li>
            </ul>
        </nav>
    </header>

    <div id="callout">
        <h1>Introducing you to easy Wordpress development, that's right we said easy Wordpress development.</h1>
        <h2>Laravel + Wordpress</h2>
        <a id="intrigued" href="#" class="button radius">Tell me more</a>
    </div>

    <div id="content">
        @yield('content')
    </div>

	<!-- Scripts -->

	<script src="{{ get_template_directory_uri() }}/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ get_template_directory_uri() }}/assets/vendor/jquery/dist/jquery.min.map"></script>
    <script src="{{ get_template_directory_uri() }}/assets/js/app.js"></script>
</body>

<?php wp_footer(); ?>

</html>
