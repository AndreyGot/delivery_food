<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\RestaurantRequest;
use App\Model\RestaurantContacts;
use Illuminate\Http\Request;
use App\Model\Restaurant;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{


    public function listRestaurant()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurant.listRestaurant',[
            'restaurants' => $restaurants,
        ]);
    }

    public function addForm()
    {
        return view('admin.restaurant.addRestaurantForm', [
            'action' => route('admin_addRestaurantForm'),
        ]);
    }

    public function saveNewRestaurant(RestaurantRequest $request)
    {
        $data = $request->all();
        Validator::make($request->all(),
            [
                'image_field' => 'required',
            ],
            [
                'image_field.required' => 'Выберите изображение!'
            ])->validate();
        $imageObj = $request->file('image_field');
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->setAlias($restaurant->name);
        $restaurant->setUploadImage($imageObj);
        $restaurant->save();

        return redirect(route('admin_listRestaurant'));
    }

    public function showRestaurant(Restaurant $restaurant)
    {

        return view('admin.restaurant.show', [
            'restaurant' => $restaurant,
            'headingTitle' => 'Контакты ресторана',
            'action' => is_null($restaurant->restaurantContact) ? route('admin_restaurant_contacts_add',[
                $restaurant,
            ]) : route('admin_restaurant_contacts_edit',[
                $restaurant,
                $restaurant->restaurantContact
            ]),

        ]);
    }

    public function removeRestaurant(Restaurant $restaurant)
    {
        foreach ($restaurant->categories as $category) {
            foreach ($category->foods as $food) {
                $food->delete();
            }
            $category->delete();
        }
        if (!empty($restaurant->restaurantContact)) {
            $restaurant->restaurantContact->delete();
        }
        $restaurant->delete();
        return redirect(route('admin_listRestaurant'));
    }

    public function editForm(Restaurant $restaurant)
    {
        return view('admin.restaurant.addRestaurantForm', [
            'restaurant' => $restaurant,
            'action' => route('admin_restaurant_edit', [
                $restaurant
            ]),
        ]);
    }

    public function editRestaurant(Restaurant $restaurant, RestaurantRequest $request)
    {
        $data = $request->all();
        $restaurant->fill($data);
        $imageObj = $request->file('image_field');
        if (!is_null($imageObj)) {
            $restaurant->setUploadImage($imageObj);
        }

        $restaurant->fill($data);
        $restaurant->setAlias($restaurant->name);
        $restaurant->save();

        return view('admin.restaurant.addRestaurantForm', [
            'restaurant' => $restaurant,
            'action' => route('admin_restaurant_edit', [
                $restaurant
            ]),
        ]);
    }

    public function addContact(Restaurant $restaurant, RestaurantContacts $request)
    {
        $restaurantContacts = new RestaurantContacts();
        $data = $request->all();
        $restaurantContacts->fill($data);
        $restaurantContacts->save();
        return redirect()->route('admin_showRestaurant', [
            $restaurant
        ]);
    }

    public function editContact(Restaurant $restaurant, RestaurantContacts $restaurantContacts, RestaurantContacts $request)
    {
        $data = $request->all();
        $restaurantContacts->fill($data);
        $restaurantContacts->save();
        return redirect()->route('admin_showRestaurant',[
            $restaurant,
        ]);
    }

    public function removeContact(Restaurant $restaurant, RestaurantContacts $restaurantContacts)
    {
        $restaurantContacts->delete();
        return redirect()->route('admin_showRestaurant',[
            $restaurant,
        ]);
    }
}