<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('weather', 'WeatherController@getWeather')->name('weather.get');
Route::resource('orders', 'OrdersController');
Route::resource('products', 'ProductsController')->only(['index', 'update']);
Route::resource('partners', 'PartnersController')->only(['index']);
