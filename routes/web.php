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


Route::get('/', 'Shop\IndexController@index')->name('main_index');
//////
Route::get('/about', 'Shop\InfoPagesController@about')->name('about');
Route::get('/contacts', 'Shop\InfoPagesController@contacts')->name('contacts');
Route::get('/partners', 'Shop\InfoPagesController@partners')->name('partners');
Route::get('/agreement', 'Shop\InfoPagesController@agreement')->name('agreement');
//////

Route::group([
    'namespace' => 'Shop',
], function () {
    Route::group([
        'prefix' => 'restaurant/{restaurant}',
    ], function () {
        Route::get('/', 'ShopRestaurantController@showRestaurant')->name('shop_restaurant_show');
        Route::group([
            'prefix' => 'comments'
        ], function () {
            Route::get('/', 'ShopRestaurantController@getComments')->name('shop_restaurant_comment_list');
            Route::post('/add','ShopRestaurantController@addComment')->name('shop_restaurant_comment_add');
        });
    });

    Route::get('/restaurants', 'ShopRestaurantController@listRestaurant')->name('shop_restaurant_list');

    Route::get('/foods/{restaurant}/{category}', 'ShopFoodController@filterByCategory')->name('food_by_category_id');

    Route::get('/categories', 'ShopCategoryController@listCategory')->name('shop_category_list');
    Route::post('/search/byrestaurant', 'ShopRestaurantController@searchByRestaurants')->name('shop_search_byRestaurants');
});






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
    Route::get('editFormAddressUser/{userAddress}', 'Shop\ShopUserController@getEditFormUserAddress')
        ->name('shop_getForm_user_address');
    Route::post('editAddressUser/{userAddress}', 'Shop\ShopUserController@editUserAddress')
        ->name('shop_edit_user_address');
    Route::get('deleteUserAddress/{userAddress}', 'Shop\ShopUserController@deleteUserAddress')
        ->name('shop_delete_user_address');

    Route::get('getUserOrders', 'User\Order\OrderController@getUserOrders')
        ->name('get_user_orders');
    Route::get('order_details/{order}', 'User\Order\OrderController@OrderDetails')
        ->name('order_details');
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
    /////
    Route::group([
        'prefix' => 'userOrder',
        'namespace' => 'User\Order'
    ], function () {
        Route::get('list', 'OrderController@userOrderList')->name('admin_user_order_list');
        Route::get('show/{order}', 'OrderController@showOrder')->name('admin_order_user_show');
        Route::post('changeStatus/{order}', 'OrderController@changeOrderStatus')->name('admin_order_user_changeStatus');
    });
    /////
    
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
                Route::post('add', 'CategoryController@addCategory')->name('admin_category_add');
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
            Route::group(['prefix' => 'order'], function () {
                Route::get('list', 'FastOrderController@ordersList')->name('admin_fast_order_list');
                Route::group(['prefix' => 'fastorder'], function () {
                    Route::get('show/{fastOrder}', 'FastOrderController@showOrder')->name('admin_order_fast_show');
                    Route::post('changestatus/{fastOrder}', 'FastOrderController@changeOrderStatus')->name('admin_order_fast_changeStatus');
                });

            });

            Route::group(['prefix' => 'association'], function () {
                Route::get('list', 'AssociationController@AssociationsList')->name('admin_associations_list');
                Route::get('addForm', 'AssociationController@addFormAssociation')->name('admin_addForm_association');
                Route::post('add', 'AssociationController@addAssociation')->name('admin_add_association');
                Route::get('editFom/{association}', 'AssociationController@editFormAssociation')->name('admin_editForm_association');
                Route::post('edit/{association}', 'AssociationController@editAssociation')->name('admin_edit_association');
                Route::get('delete/{association}', 'AssociationController@deleteAssociation')->name('admin_delete_association');

            });
////////
            Route::group(['prefix' => 'special'], function () {
                Route::get('list', 'SpecialController@specialList')->name('admin_special_list');
                Route::get('addForm', 'SpecialController@getSpecialForm')->name('admin_special_addForm');
                Route::post('add', 'SpecialController@addSpecial')->name('admin_add_special');
                Route::get('editFom/{special}', 'SpecialController@editFormSpecial')->name('admin_editForm_special');
                Route::post('edit/{special}', 'SpecialController@editSpecial')->name('admin_edit_special');
                Route::get('delete/{special}', 'SpecialController@deleteSpecial')->name('admin_delete_special');
            });
////////
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

    Route::group([
        'prefix' => 'order',
        'namespace' => 'Order'
    ], function () {
        Route::post('fastorder', 'OrderController@makeFastOrder')->name('user_order_fastOrder_make');
        Route::post('make', 'OrderController@makeUserOrder')->name('user_order_userOrder_make');
        Route::get('checkout', 'OrderController@getCheckoutForm')->name('user_order_checkout');
    });

});
//////
Route::group(['namespace' => 'Shop'], function () {

    Route::post('filterCtrl', 'FilterController@filterCtrl')->name('filterCtrl');
    Route::get('getAllRestaurants', 'FilterController@getAllRestaurants')->name('getAllRestaurants');
    Route::get('getSushiRestaurants', 'FilterController@getSushiRestaurants')->name('getSushiRestaurants');
    Route::get('getPiccaRestaurants', 'FilterController@getPiccaRestaurants')->name('getPiccaRestaurants');
    Route::get('getShashlykiRestaurants', 'FilterController@getShashlykiRestaurants')->name('getShashlykiRestaurants');
    Route::get('getPirogiRestaurants', 'FilterController@getPirogiRestaurants')->name('getPirogiRestaurants');
    Route::get('getBurgeryRestaurants', 'FilterController@getBurgeryRestaurants')->name('getBurgeryRestaurants');


});


