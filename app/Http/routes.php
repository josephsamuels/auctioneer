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

Route::group(['before' => 'auth'], function () {
    // your routes
    Route::get('items', 'ItemsController@index');

    Route::get('api/v1/items', 'ApiController@getItems');
    Route::post('api/v1/item', 'ApiController@postItem');
    Route::patch('api/v1/item/{id}', 'ApiController@patchItem');
    Route::delete('api/v1/item/{id}', 'ApiController@removeItem');
});

Route::get('/', function () {
    return redirect('items');
});

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
