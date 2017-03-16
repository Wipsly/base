<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page Route
Route::get('/', function () {
    return view('welcome');
});

// Logout Route
Route::get('logout', function (){
    Auth::logout();
    return redirect('/');
});
// Authentication Routes
Auth::routes();

// Vue Capture Route
Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*')->middleware('auth');


