<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});

// Middleware Auth API
Route::group(['middleware' => 'auth:api'], function () {
    // Settings
    Route::post('/updateUserPersonal', 'SettingController@updateUserPersonal');
    Route::post('/updateUserSecurity', 'SettingController@updateUserSecurity');
    // Users
    Route::get('/getAuthUser', 'UserController@getAuthUser');
    Route::get('/getAllUsers', 'UserController@getAllUsers');
    Route::post('/createUser', 'UserController@createUser');
});
