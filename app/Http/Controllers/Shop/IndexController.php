<?php

namespace App\Http\Controllers\Shop;
use App\Model\Restaurant;
use App\Model\Category;
use App\Model\Special;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{
	public function index()
	{
//	    dd(Cookie::get('orders'));
		$restaurants = Restaurant::all();
		$specials = Special::all();

		// $specials = $restaurants->specials;
		// dd($specials);

		// $specials = Special::where('status', $status=0)->get();
//dd($specials);
		/* @var Restaurant $restaurant*/
		return view('index')->with(['restaurants'=>$restaurants,'specials'=>$specials]);
	}
}

// $categories = Category::select(['id','name','description','image','alias','restaurant_id'])->get();
// foreach ($specials as $special) {
// 	if ($special->end_date == null) {
// 		$special->end_date = 'Всегда';
// 	}
// }
// dd($restaurants);
