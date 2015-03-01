<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>{{ wp_title('|', false, 'right') }}</title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="{{ get_bloginfo('pingback_url') }}">

    <link rel="stylesheet" href="{{ larapress_assets() . '/css/style.css' }}"/>

    <script src="{{ larapress_assets() . '/js/app.js' }}" type="text/javascript"></script>
    <script src="{{ larapress_assets() . '/vendor/jquery/dist/jquery.min.js' }}"
            type="text/javascript"></script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(! empty($page) ? $page->slug : '') ?>>

    <header class="row">
        <h1>{{ get_bloginfo('site_title') }}</h1>
    </header>

    @yield('content')

    <footer class="row">
        Produced by <a href="http://portonefive.com">Port One Five</a>
    </footer>

    <?php wp_footer(); ?>

</body>

</html>
