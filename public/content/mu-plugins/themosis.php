<?php
/*
Plugin Name: Themosis framework
Plugin URI: http://framework.themosis.com/
Description: A framework for WordPress developers.
Version: 1.1.2
Author: Julien Lambé
Author URI: http://www.themosis.com/
License: GPLv2
*/

/*----------------------------------------------------*/
// Framework textdomain.
/*----------------------------------------------------*/

if ( ! defined('THEMOSIS_FRAMEWORK_TEXTDOMAIN'))
{
    define('THEMOSIS_FRAMEWORK_TEXTDOMAIN', 'themosis-framework');
}

/**
 * Helper function to retrieve the path.
 *
 * @param string
 *
 * @return string
 */
if ( ! function_exists('themosis_path'))
{
    function themosis_path($name)
    {
        return $GLOBALS['themosis_paths'][$name];
    }
}

/**
 * Main class that bootstraps the framework.
 */
if ( ! class_exists('THFWK_Themosis'))
{
    class THFWK_Themosis {

        /**
         * Framework version.
         *
         * @var float
         */
        const VERSION = '1.1.2';

        /**
         * Framework bootstrap instance.
         *
         * @var \THFWK_Themosis
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
         * @return \THFWK_Themosis
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
            /**
             * Define all framework paths
             * These are real paths, not URLs to the framework files.
             * These paths are extensible with the help of WordPress
             * filters.
             */
            // Framework paths.
            $paths = apply_filters('themosis_framework_paths', array());

            // Plugin base path.
            $paths['plugin'] = __DIR__ . DS;

            // Framework base path.
            $paths['sys'] = dirname(dirname(dirname(__DIR__))) . DS . 'vendor' . DS . 'themosis/framework/src';

            // Register globally the paths
            foreach ($paths as $name => $path)
            {
                if ( ! isset($GLOBALS['themosis_paths'][$name]))
                {
                    $GLOBALS['themosis_paths'][$name] = realpath($path) . DS;
                }
            }
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
        $GLOBALS['THFWK_Themosis'] = THFWK_Themosis::getInstance();
    }
);