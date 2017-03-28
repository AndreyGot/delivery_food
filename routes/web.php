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

Route::get('/adminPanel', 'AdminController@index')->name('adminPanel');
Route::get('restaurant/list', 'RestaurantController@listRestaurant')->name('listRestaurant');
Route::get('restaurant/show', 'RestaurantController@showRestaurant')->name('showRestaurant');
Route::get('restaurant/add', 'RestaurantController@addForm')->name('addRestaurantForm');
Route::post('restaurant/add','RestaurantController@saveNewRestaurant')->name('saveNewRestaurant');

Auth::routes();
Route::get('/home', 'HomeController@index');
