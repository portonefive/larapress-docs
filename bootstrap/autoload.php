<?php
/*----------------------------------------------------*/
// Paths
/*----------------------------------------------------*/
$rootPath    = dirname(__DIR__);
$webRootPath = $rootPath . DS . 'public';

/*----------------------------------------------------*/
// Include composer autoloading
/*----------------------------------------------------*/
$composer = require __DIR__ . '/../vendor/autoload.php';

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
// Path to WordPress
/*----------------------------------------------------*/
if ( ! defined('ABSPATH'))
{
    define('ABSPATH', $webRootPath . '/cms/');
}