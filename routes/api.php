<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Middleware Auth API
Route::group(['middleware' => 'auth:api'], function () {
    // Settings
    Route::post('/updateUserPersonal', 'SettingController@updateUserPersonal');
    Route::post('/updateUserSecurity', 'SettingController@updateUserSecurity');
    // Users
    Route::get('/getAuthUser', 'UserController@getAuthUser');
    Route::get('/getAllUsers', 'UserController@getAllUsers');
    Route::get('/getUser/{id}', 'UserController@getUser');
    Route::post('/editUser/{id}', 'UserController@editUser');
    Route::post('/deleteUser/{id}', 'UserController@deleteUser');
    Route::post('/createUser', 'UserController@createUser');
});
