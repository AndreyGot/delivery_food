<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Restaurant;
use App\Model\Category; 
use App\Model\User; 

class ShopRestaurantController extends Controller
{
	public function listRestaurant()
	{
    $restaurants = Restaurant::all();
    return view('shop.restaurant.listRestaurant',['restaurants'=>$restaurants]);
  }
  
  public function showRestaurant(Restaurant $restaurant)
  {
    $categories = Category::where('restaurant_id', $restaurant->id)->get();
    return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant,'categories'=>$categories]
		// $restaurants = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->get();
    // dd($restaurant);
    // $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('alias', $alias)->first();
    );
  }
}
