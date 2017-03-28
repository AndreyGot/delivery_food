<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Restaurant;

class RestaurantController extends Controller
{
	public function listRestaurant()
	{
		$restaurants = Restaurant::select(['id','name','image'])->get();
		// dd($restaurants);
		return view('restaurant.listRestaurant')->with(['restaurants'=>$restaurants]);
	}
  
  public function addForm()
  {
    return view('restaurant.addRestaurantForm');
  }

  public function saveNewRestaurant(Request $request)
  {
      // $this->validate($request, [
      //     'title' => 'required|max:255',
      //     'desc' => 'required|max:255',
      //     'alias' => 'required|unique:articles,alias',
      //     'meta_desc' => 'required',
      //     'img' => 'required'
      // ]);
      $data = $request->all();
      // dd($data);
      $restaurant = new Restaurant;
      $restaurant->fill($data);
      // $restaurant->keywords = 'some keyword';
      $restaurant->save();

      return redirect('/adminPanel');
  }
}
