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

Route::group(['middleware' => ['auth']], function () {
    // your routes
    Route::get('items', 'ItemsController@index');
    Route::get('print', 'ItemsController@printItems');

    Route::get('api/v1/items', 'Api\ItemsApiController@getItems');
    Route::post('api/v1/item', 'Api\ItemsApiController@postItem');
    Route::patch('api/v1/item/{item}', 'Api\ItemsApiController@patchItem');
    Route::delete('api/v1/item/{item}', 'Api\ItemsApiController@removeItem');

    Route::get('api/v1/roles', 'Api\RolesApiController@getRoles');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('users', 'UsersController@index');

        Route::get('api/v1/users', 'Api\UsersApiController@getUsers');
        Route::post('api/v1/user', 'Api\UsersApiController@postUser');
        Route::patch('api/v1/user/{user}', 'Api\UsersApiController@patchUser');
    });
});

Route::get('/', function () {
    return redirect('items');
});

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
