<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ wp_title('|', false, 'right') }}</title>

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <?php wp_head(); ?>
    
    {!! HTML::style(larapress_assets('css/style.css')) !!}

</head>
<body <?php body_class(!empty($page) ? $page->slug : '') ?>>

    <header id="header" class="row">
        <div class="columns small-12 large-6">
            <h1 class="logo">
                <a href="/"><span class="lara">Lara</span><span class="press">Press</span></a>
            </h1>
        </div>
        <nav class="columns small-12 large-6">
            <ul>
                <li><a href="#">Learn</a></li>
                <li><a href="#">Install</a></li>
                <li><a href="/docs/1.0">Documentation</a></li>
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

       {!! HTML::script(larapress_assets('vendor/jquery/dist/jquery.min.js')) !!}
       {!! HTML::script(larapress_assets('vendor/foundation/js/foundation.js')) !!}
       {!! HTML::script(larapress_assets('js/app.js')) !!}
       
	<?php wp_footer(); ?>

</body>
</html>
