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
Route::get('/', 'Shop\IndexController@index')->name('main_index');

Route::get('/restaurants', 'Shop\ShopRestaurantController@listRestaurant')->name('shop_restaurant_list');
Route::get('/restaurant/{restaurant}', 'Shop\ShopRestaurantController@showRestaurant')->name('shop_restaurant_show');
Route::get('/categories', 'Shop\ShopCategoryController@listCategory')->name('shop_category_list');
Route::get('/foods/{category}', 'Shop\ShopFoodController@filterByCategory')->name('food_by_category_id');



Route::group([
    'prefix' => 'user',
    'middleware' => 'checkUser'
    // 'namespace' => 'Shop'
], function () {

    Route::get('profile', 'Shop\ShopUserController@profileUser')->name('shop_profile_user');
    Route::get('setingsProfile', 'Shop\ShopUserController@setingsProfileUser')->name('shop_setting_profile_user');
    Route::post('addProfile', 'Shop\ShopUserController@addProfileUser')->name('shop_profile_edd');
    Route::post('editProfile/{profile}', 'Shop\ShopUserController@editProfileUser')->name('shop_profile_edit');
    Route::get('addressUser', 'Shop\ShopUserController@addressUser')->name('shop_address_user');
    Route::post('saveAddressUser', 'Shop\ShopUserController@saveUserAddress')->name('shop_add_user_address');

    Route::get('editFormAddressUser/{userAddress}', 
        'Shop\ShopUserController@getEditFormUserAddress')->name('shop_getForm_user_address');
    Route::post('editAddressUser/{userAddress}', 'Shop\ShopUserController@editUserAddress')->name('shop_edit_user_address');

    Route::get('deleteUserAddress/{userAddress}', 'Shop\ShopUserController@deleteUserAddress')->name('shop_delete_user_address');
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

Route::group(['namespace' => 'User'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('user_register_form');
        Route::post('register', 'RegisterController@register');
        Route::match(['get', 'post'], 'logout', 'LoginController@logout')->name('user_logout');
        Route::get('login', 'LoginController@showLoginForm')->name('user_login_form');
        Route::post('login', 'LoginController@login');


    });
    Route::group([
        'prefix' => 'cart',
        'namespace' => 'Cart'
        ], function () {
        Route::post('add', 'CartController@addProduct')->name('user_cart_add');
        Route::get('/', 'CartController@showCart')->name('user_cart_show');
        Route::post('remove', 'CartController@removeProduct')->name('user_cart_remove');
        Route::post('remove/allbyproduct', 'CartController@removeAllByProduct')->name('user_cart_remove_allByProduct');
        Route::post('clear', 'CartController@clearCart')->name('user_cart_clear');

    });
});


