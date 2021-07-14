<?php
use App\Utils\Variables;

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

// Account
$router->post(Variables::$URL_PREFIX . '/account/register', ['uses' => 'AccountController@register']);
$router->post(Variables::$URL_PREFIX . '/account/login', ['uses' => 'AccountController@login']);
$router->post(Variables::$URL_PREFIX . '/account/verify', ['uses' => 'AccountController@verify']);
$router->post(Variables::$URL_PREFIX . '/account/password/verify', ['uses' => 'AccountController@verifyPassword']);
$router->post(Variables::$URL_PREFIX . '/account/password/change', ['uses' => 'AccountController@changePassword']);

// User
$router->get(Variables::$URL_PREFIX . '/user/get/{id}', ['uses' => 'UserController@get']);
$router->put(Variables::$URL_PREFIX . '/user/update', ['uses' => 'UserController@update']);

// Slider
$router->get(Variables::$URL_PREFIX . '/slider/all', ['uses' => 'SliderController@all']);
$router->get(Variables::$URL_PREFIX . '/slider/get/{id}', ['uses' => 'SliderController@get']);

// Mini Sliders
$router->get(Variables::$URL_PREFIX . '/minislider/all', ['uses' => 'MiniSliderController@all']);
$router->get(Variables::$URL_PREFIX . '/minislider/get/{id}', ['uses' => 'MiniSliderController@get']);

// Brands
$router->get(Variables::$URL_PREFIX . '/brand/all', ['uses' => 'BrandController@all']);
$router->get(Variables::$URL_PREFIX . '/brand/get/{name}', ['uses' => 'BrandController@get']);
$router->get(Variables::$URL_PREFIX . '/brand/getlimit/{limit}', ['uses' => 'BrandController@getLimit']);
$router->get(Variables::$URL_PREFIX . '/brand/getbyline/{line}', ['uses' => 'BrandController@getByLine']);


// Services
$router->get(Variables::$URL_PREFIX . '/service/all', ['uses' => 'ServiceController@all']);
$router->get(Variables::$URL_PREFIX . '/service/get/{id}', ['uses' => 'ServiceController@get']);
$router->get(Variables::$URL_PREFIX . '/service/getlimit/{limit}', ['uses' => 'ServiceController@getLimit']);

// Team
$router->get(Variables::$URL_PREFIX . '/team/all', ['uses' => 'TeamController@all']);
$router->get(Variables::$URL_PREFIX . '/team/get/{id}', ['uses' => 'TeamController@get']);
$router->get(Variables::$URL_PREFIX . '/team/getlimit/{limit}', ['uses' => 'TeamController@getLimit']);

// Line
$router->get(Variables::$URL_PREFIX . '/line/all', ['uses' => 'LineController@all']);
$router->get(Variables::$URL_PREFIX . '/line/get/{id}', ['uses' => 'LineController@get']);
$router->get(Variables::$URL_PREFIX . '/line/getlimit/{limit}', ['uses' => 'LineController@getLimit']);

// Product
$router->get(Variables::$URL_PREFIX . '/product/get/{clienttype}/{line}/{brand}', ['uses' => 'ProductController@get']);
$router->get(Variables::$URL_PREFIX . '/product/getbycode/{clienttype}/{code}', ['uses' => 'ProductController@getByCode']);

