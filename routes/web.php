<?php

use Illuminate\Support\Facades\DB;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'product'], function () use ($router) {
    $router->post('', 'ProductController@create');
    $router->get('', 'ProductController@list');
    $router->get('all', 'ProductController@all');
    $router->get('{id}', 'ProductController@index');
    $router->put('{id}', 'ProductController@update');
    $router->delete('{id}', 'ProductController@delete');
});

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->post('', 'UserController@create');
    $router->get('', 'UserController@list');
    $router->get('all', 'UserController@all');
    $router->get('{id}', 'UserController@index');
    $router->put('{id}', 'UserController@update');
    $router->delete('{id}', 'UserController@delete');
});

