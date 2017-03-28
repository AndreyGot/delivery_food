<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Security',
//    'middleware' => 'auth'
], function () {
    Route::group(['middleware' => 'isAdmin'], function () {
        Route::match(['get', 'post'], 'register', 'SecurityController@register');
        Route::any('logout', 'SecurityController@logout')->name('admin_logout');
    });

    Route::get('login', 'SecurityController@showLoginForm')->name('admin_login_form');
    Route::post('login', 'SecurityController@login')->name('admin_login');
});