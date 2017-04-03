<?php

namespace App\Http\Controllers\Shop;
use App\Model\Restaurant;
use App\Model\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function listRestaurant()
	{
		$restaurants = Restaurant::all();
		$categories = Category::select(['id','name','description','image','alias','restaurant_id'])->get();
		// dd($categories);
		return view('index')->with(['restaurants'=>$restaurants,'categories'=>$categories]);
		// return view('index')->with(['categories'=>$categories]);
	}
}
