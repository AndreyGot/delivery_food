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


Route::group([
    'prefix' => 'admin',
//    'namespace' => 'Security',
//    'middleware' => 'auth'
], function () {
    Route::group(['namespace' => 'Security'], function () {
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('/', 'AdminController@index')->name('adminPanel');
            Route::match(['get', 'post'], 'register', 'SecurityController@register');
            Route::any('logout', 'SecurityController@logout')->name('admin_logout');


            Route::group(['prefix' => 'restaurant'], function () {
                Route::get('list', 'RestaurantController@listRestaurant')->name('admin_listRestaurant');
                Route::get('show/{restaurant}', 'RestaurantController@showRestaurant')->name('admin_showRestaurant');
                Route::get('add', 'RestaurantController@addForm')->name('admin_addRestaurantForm');
                Route::post('add', 'RestaurantController@saveNewRestaurant')->name('admin_saveNewRestaurant');
                Route::get('remove/{restaurant}', 'RestaurantController@removeRestaurant')->name('admin_restaurant_remove');
                Route::get('edit/{restaurant}', 'RestaurantController@editForm')
                    ->name('admin_restaurant_edit_form');
                Route::post('edit/{restaurant}', 'RestaurantController@editRestaurant')
                    ->name('admin_restaurant_edit');

                Route::group(['prefix' => '{restaurant}/contacts/'], function () {
//                    Route::get('add', 'RestaurantController@addContactsForm')->name('admin_restaurant_contacts_add_form');
                    Route::post('add', 'RestaurantController@addContact')->name('admin_restaurant_contacts_add');
                    Route::post('edit/{restaurantContacts}', 'RestaurantController@editContact')->name('admin_restaurant_contacts_edit');
                    Route::get('remove/{restaurantContacts}', 'RestaurantController@removeContact')->name('admin_restaurant_contacts_remove');
                });
            });
            Route::group(['prefix' => 'category'], function () {
                Route::get('add', 'CategoryController@getForm')->name('admin_category_add_form');
//                Route::post('add', 'CategoryController@addCategory')->name('admin_category_add');
                Route::get('add/{restaurant}', 'CategoryController@getFormByRestaurant')->name('admin_category_add_form_byRestaurant');
                Route::post('add/{restaurant}', 'CategoryController@addCategoryByRestaurant')->name('admin_category_add_category_byRestaurant');
                Route::get('list/{restaurant}', 'CategoryController@categoryListByRestaurant')->name('admin_category_list_byRestaurant');
                Route::get('show/{restaurant}/{categoryAlias}', 'CategoryController@showCategory')->name('admin_category_show');
                Route::get('remove/{restaurant}/{category}', 'CategoryController@removeCategory')->name('admin_category_remove');
                Route::get('edit/{restaurant}/{categoryAlias}', 'CategoryController@editForm')->name('admin_category_edit_form');
                Route::post('edit/{restaurant}/{categoryAlias}', 'CategoryController@editCategory')->name('admin_category_edit');
            });

            Route::group(['prefix' => 'food'], function () {
                Route::get('add/{restaurant}/{categoryAlias}', 'FoodController@getFormByCategory')->name('admin_food_add_form');
                Route::get('list/{restaurant}/{categoryAlias}', 'FoodController@foodListByCategory')->name('admin_food_list_byCategory');
                Route::post('add/{restaurant}/{category}', 'FoodController@addFoodByCategory')->name('admin_food_add_byRestaurant');

                Route::get('show/{food}', 'FoodController@showFood')->name('admin_food_show');
                Route::get('remove/{food}', 'FoodController@removeFood')->name('admin_food_remove');
                Route::get('edit/{food}', 'FoodController@editForm')->name('admin_food_edit_form');
                Route::post('edit/{food}', 'FoodController@editFood')->name('admin_food_edit');

            });
        });

        Route::get('login', 'SecurityController@showLoginForm')->name('admin_login_form');
        Route::post('login', 'SecurityController@login')->name('admin_login');
    });

});


//Auth::routes();
//Route::get('/home', 'HomeController@index');
//Route::get('/adminPanel', 'AdminController@index')->name('adminPanel');


Route::get('/home', 'HomeController@index');

