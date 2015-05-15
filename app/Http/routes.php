<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/** @var LaraPress\Routing\Router $router */

$router->get('/', 'HomeController@index');

//Docs
$router->get('docs/{version}', 'DocsController@index');
$router->get('docs/{version}/{component}', 'DocsController@show');

//Wordpress ADmin
$router->get(
    'wp-admin',
    function ()
    {
        return redirect()->to('cms/wp-admin');
    }
);

$router->controllers(
    [
        'auth'     => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]
);