<?php

namespace App\Http\Controllers\Shop;
use App\Model\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function listRestaurant()
	{
		$restaurants = Restaurant::select(['id','name','image','alias'])->get();
		// dd($restaurants);
		return view('index')->with(['restaurants'=>$restaurants]);
	}
}
