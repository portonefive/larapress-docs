<?php
/*
Plugin Name: LaraPress framework
Plugin URI: http://framework.larapress.com/
Description: A framework for WordPress developers.
Version: 1.1.2
Author: Julien Lambé
Author URI: http://www.larapress.com/
License: GPLv2
*/

/*----------------------------------------------------*/
// Framework textdomain.
/*----------------------------------------------------*/

if ( ! defined('LARAPRESS_FRAMEWORK_TEXTDOMAIN'))
{
    define('LARAPRESS_FRAMEWORK_TEXTDOMAIN', 'larapress-framework');
}

/**
 * Main class that bootstraps the framework.
 */
if ( ! class_exists('THFWK_LaraPress'))
{
    class THFWK_LaraPress {

        /**
         * Framework version.
         *
         * @var float
         */
        const VERSION = '1.1.2';

        /**
         * Framework bootstrap instance.
         *
         * @var \THFWK_LaraPress
         */
        private static $instance = null;

        /**
         * Plugin directory name.
         *
         * @var string
         */
        private static $dirName;

        private function __construct()
        {
            static::$dirName = static::setDirName(__DIR__);

            // Set the framework paths and starts the framework.
            add_action('after_setup_theme', array($this, 'bootstrap'));
        }

        /**
         * Init the framework classes
         *
         * @return \THFWK_LaraPress
         */
        public static function getInstance()
        {
            if (is_null(static::$instance))
            {
                static::$instance = new static();
            }

            return static::$instance;
        }

        /**
         * Set the plugin directory property. This property
         * is used as 'key' in order to retrieve the plugins
         * informations.
         *
         * @param string
         *
         * @return string
         */
        private static function setDirName($path)
        {
            $parent = static::getParentDirectoryName(dirname($path));

            $dirName = explode($parent, $path);
            $dirName = substr($dirName[1], 1);

            return $dirName;
        }

        /**
         * Check if the plugin is inside the 'mu-plugins'
         * or 'plugin' directory.
         *
         * @param string $path
         *
         * @return string
         */
        private static function getParentDirectoryName($path)
        {
            // Check if in the 'mu-plugins' directory.
            if (WPMU_PLUGIN_DIR === $path)
            {
                return 'mu-plugins';
            }

            // Install as a classic plugin.
            return 'plugins';
        }

        /**
         * Define paths and bootstrap the framework.
         *
         * @return void
         */
        public function bootstrap()
        {
        }

        /**
         * Returns the directory name.
         *
         * @return string
         */
        public static function getDirName()
        {
            return static::$dirName;
        }
    }
}

/**
 * Load the main class.
 */
add_action(
    'plugins_loaded',
    function ()
    {
        $GLOBALS['THFWK_LaraPress'] = THFWK_LaraPress::getInstance();
    }
);