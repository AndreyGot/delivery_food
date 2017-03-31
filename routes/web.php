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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'Shop\IndexController@listRestaurant')->name('main_index');
Route::get('/restourants', 'Shop\ShopRestaurantController@listRestaurant')->name('restourant_list_shop');
Route::get('/restourants/{alias}', 'Shop\ShopRestaurantController@showRestaurant')->name('restourant_show_shop');
Route::get('/categories', 'Shop\ShopCategoryController@listCategory')->name('category_list_shop');
Route::get('/foods/{category_id}', 'Shop\ShopFoodController@filterByCategory')->name('food_by_categori_id');



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

Route::get('/adminPanel', 'AdminController@index')->name('adminPanel');
Route::get('restaurant/list', 'RestaurantController@listRestaurant')->name('listRestaurant');
Route::get('restaurant/show', 'RestaurantController@showRestaurant')->name('showRestaurant');
Route::get('restaurant/add', 'RestaurantController@addForm')->name('addRestaurantForm');
Route::post('restaurant/add','RestaurantController@saveNewRestaurant')->name('saveNewRestaurant');

Auth::routes();
Route::get('/home', 'HomeController@index');

