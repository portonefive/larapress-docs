<?php defined('DS') or die('No direct script access.');

/**
 * Bootstrap LaraPress framework.
 */

require_once(ABSPATH . 'wp-settings.php');

/**
 * Define all framework paths
 * These are real paths, not URLs to the framework files.
 * These paths are extensible with the help of WordPress
 * filters.
 */
// Framework paths.
$paths = apply_filters('larapress_framework_paths', array());

// Plugin base path.
$paths['plugin'] = __DIR__ . DS;

// Framework base path.
$paths['sys'] = dirname(__DIR__) . '/vendor/larapress/framework/src';

// Register globally the paths
foreach ($paths as $name => $path)
{
    if ( ! isset($GLOBALS['larapress_paths'][$name]))
    {
        $GLOBALS['larapress_paths'][$name] = realpath($path) . DS;
    }
}

/*----------------------------------------------------*/
// Set the application instance.
/*----------------------------------------------------*/
$app = new \LaraPress\Core\Application();


$composer->addPsr4('App\\', get_template_directory() . '/app');

/*----------------------------------------------------*/
// Set the application paths.
/*----------------------------------------------------*/
$paths = apply_filters(
    'larapress_application_paths',
    array(
        'plugin' => dirname(__DIR__),
        'sys'    => dirname(__DIR__) . '/vendor/larapress/src'
    )
);


$app->bindInstallPaths($paths);

/*----------------------------------------------------*/
// Bind the application in the container.
/*----------------------------------------------------*/
$app->instance('app', $app);

/*----------------------------------------------------*/
// Load the facades.
/*----------------------------------------------------*/
LaraPress\Facades\Facade::clearResolvedInstances();

LaraPress\Facades\Facade::setFacadeApplication($app);

/*----------------------------------------------------*/
// Register Facade Aliases To Full Classes
/*----------------------------------------------------*/
$app->registerCoreContainerAliases();

/*----------------------------------------------------*/
// Register Core Igniter services
/*----------------------------------------------------*/
$app->registerServiceProviders();

/*----------------------------------------------------*/
// Set application configurations.
/*----------------------------------------------------*/
do_action('larapress_configurations');

/*----------------------------------------------------*/
// Register framework view paths.
/*----------------------------------------------------*/
add_filter(
    'larapressViewPaths',
    function ($paths)
    {
        $paths[] = larapress_path('sys') . 'Metabox/Views/';
        $paths[] = larapress_path('sys') . 'Page/Views/';
        $paths[] = larapress_path('sys') . 'Field/Fields/Views/';
        $paths[] = larapress_path('sys') . 'Route/Views/';

        return $paths;
    }
);

/*----------------------------------------------------*/
// Register framework asset paths.
/*----------------------------------------------------*/
add_filter(
    'larapressAssetPaths',
    function ($paths)
    {

        $coreUrl         = larapress_plugin_url(dirname(__DIR__)) . '/src/LaraPress/_assets';
        $paths[$coreUrl] = larapress_path('sys') . '_assets';

        return $paths;
    }
);

/*----------------------------------------------------*/
// Register framework media image size.
/*----------------------------------------------------*/
add_image_size('_larapress_media', 100, 100, true);

add_filter(
    'image_size_names_choose',
    function ($sizes)
    {

        $sizes['_larapress_media'] = __('LaraPress Media Thumbnail', THEMOSIS_FRAMEWORK_TEXTDOMAIN);

        return $sizes;
    }
);

/*----------------------------------------------------*/
// Allow developers to add parameters to
// the admin global JS object.
/*----------------------------------------------------*/
add_action(
    'admin_head',
    function ()
    {
        $datas = apply_filters('larapressAdminGlobalObject', array());

        $output = "<script type=\"text/javascript\">\n\r";
        $output .= "//<![CDATA[\n\r";
        $output .= "var thfmk_larapress = {\n\r";

        if ( ! empty($datas))
        {
            foreach ($datas as $key => $value)
            {
                $output .= $key . ": " . json_encode($value) . ",\n\r";
            }
        }

        $output .= "};\n\r";
        $output .= "//]]>\n\r";
        $output .= "</script>";

        // Output the datas.
        echo($output);
    }
);

/*----------------------------------------------------*/
// Register framework core assets URL to
// admin global object.
/*----------------------------------------------------*/
add_filter(
    'larapressAdminGlobalObject',
    function ($paths)
    {
        $paths['_larapressAssets'] = larapress_plugin_url(dirname(__DIR__)) . '/src/LaraPress/_assets';

        return $paths;
    }
);

/*----------------------------------------------------*/
// Enqueue frameworks assets.
/*----------------------------------------------------*/
// LaraPress styles
LaraPress\Facades\Asset::add('larapress-core-styles', 'css/_larapress-core.css')->to('admin');

// LaraPress scripts
LaraPress\Facades\Asset::add(
    'larapress-core-scripts',
    'js/_larapress-core.js',
    array(
        'jquery',
        'jquery-ui-sortable',
        'underscore',
        'backbone',
        'mce-view'
    ),
    false,
    true
)->to('admin');

/*----------------------------------------------------*/
// Bootstrap application.
/*----------------------------------------------------*/
do_action('larapress_bootstrap');

return $app;