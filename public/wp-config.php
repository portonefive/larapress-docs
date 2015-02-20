<?php

/*----------------------------------------------------*/
// Directory separator
/*----------------------------------------------------*/
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

/*----------------------------------------------------*/
// Bootstrap WordPress
/*----------------------------------------------------*/
require_once(__DIR__ . '/../bootstrap/autoload.php');

/*----------------------------------------------------*/
// Database
/*----------------------------------------------------*/
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASS'));
define('DB_TABLE_PREFIX', $table_prefix = env('DB_TABLE_PREFIX', 'wp_'));

// WordPress URLs
define('WP_HOME', env('WP_HOME'));
define('WP_SITEURL', env('WP_HOME') . '/cms');

// Development
define('SAVEQUERIES', env('SAVE_QUERIES', false));
define('WP_DEBUG', env('DEBUG', false));
define('SCRIPT_DEBUG', env('SCRIPT_DEBUG', false));

// Themosis framework
define('THEMOSIS_ERROR_DISPLAY', env('ERROR_DISPLAY', false));
define('THEMOSIS_ERROR_SHUTDOWN', env('ERROR_SHUTDOWN', false));
define('THEMOSIS_ERROR_REPORT', env('ERROR_REPORT', 0));

/*----------------------------------------------------*/
// Content directory
/*----------------------------------------------------*/
define('CONTENT_DIR', 'content');
define('WP_CONTENT_DIR', $webRootPath . DS . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . '/' . CONTENT_DIR);

/*----------------------------------------------------*/
// Authentication unique keys and salts
/*----------------------------------------------------*/
/**
 * @link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/*----------------------------------------------------*/
// Custom settings
/*----------------------------------------------------*/
define('WP_AUTO_UPDATE_CORE', false);
define('DISALLOW_FILE_EDIT', true);

/*----------------------------------------------------*/
// Sets up WordPress vars and included files
/*----------------------------------------------------*/
require_once(ABSPATH . 'wp-settings.php');

$themosis = require_once __DIR__ . '/../bootstrap/app.php';

