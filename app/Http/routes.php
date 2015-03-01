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

$router->page('contact', 'HomeController@contact');

$router->get('/', 'WelcomeController@index');

$router->get('home', 'HomeController@index');

$router->controllers(
    [
        'auth'     => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]
);

$router->get('team/{id}/test', 'WelcomeController@index');

//Route::page(['team', 'staff'], 'PageController@team');

//$router->admin('example-page', 'Admin\ExamplePageController@render');

$router->admin('example-page', ['menuTitle' => 'Foo', 'pageTitle' => 'LALA', 'uses' => 'Admin\ExamplePageController@render']);

$router->admin('example-page/test', 'Admin\ExamplePageController@test');
