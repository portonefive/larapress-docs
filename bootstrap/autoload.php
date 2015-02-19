<?php
/*----------------------------------------------------*/
// Paths
/*----------------------------------------------------*/
$rootPath    = dirname(__DIR__);
$webRootPath = $rootPath . DS . 'htdocs';

/*----------------------------------------------------*/
// Include composer autoloading
/*----------------------------------------------------*/
require __DIR__ . '/../vendor/autoload.php';

if ( ! function_exists('env'))
{
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) return value($default);

        switch (strtolower($value))
        {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'null':
            case '(null)':
                return null;

            case 'empty':
            case '(empty)':
                return '';
        }

        return $value;
    }
}

Dotenv::load(dirname(__DIR__));

$environment = env('ENV', 'production');

/*----------------------------------------------------*/
// Load environment config constants
/*----------------------------------------------------*/
if (file_exists($config = $rootPath . '/config/environments/' . $environment . '.php'))
{
    require_once($config);
}

/*----------------------------------------------------*/
// Content directory
/*----------------------------------------------------*/
define('CONTENT_DIR', 'content');
define('WP_CONTENT_DIR', $webRootPath . DS . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . '/' . CONTENT_DIR);

/*----------------------------------------------------*/
// Include shared configuration
/*----------------------------------------------------*/
if (file_exists($shared = $rootPath . DS . 'config' . DS . 'shared.php'))
{
    require_once($shared);
}

/*----------------------------------------------------*/
// Path to WordPress
/*----------------------------------------------------*/
if ( ! defined('ABSPATH'))
{
    define('ABSPATH', $webRootPath . DS . 'cms' . DS);
}
