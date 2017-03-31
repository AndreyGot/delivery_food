<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restaurant;

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

    public function saveNewRestaurant(Request $request)
    {
        $data = $request->all();
        $imageObj = $request->file('image_field');
        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->setUploadImage($imageObj);
        $restaurant->save();

        return redirect(route('admin_listRestaurant'));
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        return view('admin.restaurant.show', [
            'restaurant' => $restaurant,

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
        $restaurant->delete();
        return redirect(route('admin_listRestaurant'));
    }

    public function editForm(Restaurant $restaurant)
    {
        return view('admin.restaurant.addRestaurantForm', [
            'restaurant' => $restaurant,
            'action' => route('admin_restaurant_edit_form', [
                'restaurant' => $restaurant
            ]),
        ]);
    }

    public function editRestaurant(Restaurant $restaurant, Request $request)
    {
        $data = $request->all();
        $restaurant->fill($data);
        $imageObj = $request->file('image_field');
        if (!is_null($imageObj)) {
            $restaurant->setUploadImage($imageObj);
        }

        $restaurant->fill($data);

        $restaurant->save();

        return view('admin.restaurant.addRestaurantForm', [
            'restaurant' => $restaurant,
            'action' => route('admin_restaurant_edit_form', [
                'restaurant' => $restaurant
            ]),
        ]);
    }
}