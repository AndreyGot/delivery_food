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
    // dd($restaurant);
    return view('shop.restaurant.mediumListRestaurant',['restaurants'=>$restaurants]);
  }
  
  public function showRestaurant(Restaurant $restaurant)
  {
    $specials = $restaurant->specials;
    $categories = Category::where('restaurant_id', $restaurant->id)->get();
    return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant,'categories'=>$categories,'specials'=>$specials]
    );
  }
}
