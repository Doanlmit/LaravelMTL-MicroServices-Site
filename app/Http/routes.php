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

// Home routes
Route::get('/', 'HomeController@index');


// Products routes
Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');

Route::get('/cart', 'OrderController@viewCart');
Route::get('/cart/add/{id}', 'OrderController@addToCart');


// Benchmark routes
Route::get('/benchmark', function() {
    return 'Hello world';
});