<?php

namespace App\Http\Controllers\Shop;
use App\Model\Association;
use App\Model\PaymentMethod;
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
		$restaurants = Restaurant::all();
		$specials = Special::where('status', true)->get();
//		dd($restaurants[0]->paymentMethods);
		$paymentMethods = PaymentMethod::all();
		$associations = Association::all();
		
		/* @var Restaurant $restaurant */
		return view('index')->with([
			'restaurants'	=>$restaurants,
			'specials'		=>$specials,
			'associations'	=>$associations,
			'paymentMethods'	=>$paymentMethods,
		]);
	}
}

