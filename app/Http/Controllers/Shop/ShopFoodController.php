<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Food;
use App\Model\Category;
use App\Model\Restaurant; 

class ShopFoodController extends Controller
{
	public function filterByCategory($category_id)
	{
    // dd($category_id);
		$foods = Food::select(['id','name','image','description','price','bonus','rating','category_id'])->where('category_id', $category_id)->get();
    
    $сategory = Category::select(['id','name','description','image','alias','restaurant_id'])->where('id', $category_id)->first();
		// dd($сategory);
    $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('id', $сategory->restaurant_id)->first();
    // dd($restaurant);
    return view('shop.food.listFood')->with(['foods'=>$foods, 'restaurant'=>$restaurant]);
  }

  // public function showRestaurant($alias)
  // {
  //   // $foods=null;
  //   $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('alias', $alias)->first();
  //   return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant]
  //   );
  // }
}
