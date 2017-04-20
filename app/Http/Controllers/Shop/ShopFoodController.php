<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Model\Food;
use App\Model\Category;
use App\Model\Restaurant;

class ShopFoodController extends Controller
{
    public function filterByCategory(Restaurant $restaurant, Category $category)
    {
        $foods = Food::where('category_id', $category->id)->get();
        $restaurant = $category->restaurant;
        return view('shop.food.listFood',[
            'foods' => $foods,
            'restaurant' => $restaurant,
        ]);
    }

    // public function showRestaurant($alias)
    // {
    //   $foods = Food::all();
    //   dd($restaurant);
    //   $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('alias', $alias)->first();
    //   return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant]
    //   );
    // }
}
