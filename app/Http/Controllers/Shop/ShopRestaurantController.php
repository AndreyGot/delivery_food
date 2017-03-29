<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
use App\Model\Restaurant; 
use App\Http\Controllers\Controller;

class ShopRestaurantController extends Controller
{
	public function listRestaurant()
	{
		$restaurants = Restaurant::select(['id','name','image','alias'])->get();
		// dd($restaurants);
		return view('restaurant.listRestaurant')->with(['restaurants'=>$restaurants]);
	}
  
  public function showRestaurant($alias)
  {
    // $restaurants=null;
    $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('alias', $alias)->first();
    // dd($restaurant);
    return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant]
    );
  }
}
