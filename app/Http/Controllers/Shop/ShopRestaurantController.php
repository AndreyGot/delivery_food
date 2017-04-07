<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Restaurant;
use App\Model\Category; 
use App\Model\Profile;

class ShopRestaurantController extends Controller
{
	public function listRestaurant()
	{
		$restaurants = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->get();
		return view('shop.restaurant.listRestaurant')->with(['restaurants'=>$restaurants]);
	}
  
  public function showRestaurant($alias)
  {
    $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('alias', $alias)->first();
    $categories = Category::select(['id','name','alias','image'])->where('restaurant_id', $restaurant->id)->get();
    // dd($categories, $restaurant);
    return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant,'categories'=>$categories]
    );
  }
}
