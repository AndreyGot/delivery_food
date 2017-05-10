<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Restaurant; 
use App\Model\Category; 

class ShopCategoryController extends Controller
{
	public function listCategory()
	{
		$categories = Category::select(['id','name','description','image','alias'])->get();
		// dd($categories);
		return view('category.listCategory')->with(['categories'=>$categories]);
	}
  
  // public function showRestaurant($alias)
  // {
  //   // $categories=null;
  //   $restaurant = Restaurant::select(['id','name','image','description','alias','working_hours','rating'])->where('alias', $alias)->first();
  //   // dd($restaurant);
  //   return view('shop.restaurant.showRestaurant')->with(['restaurant'=>$restaurant]
  //   );
//  }
}
