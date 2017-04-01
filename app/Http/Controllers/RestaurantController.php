<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Restaurant;

class RestaurantController extends Controller
{
	public function listRestaurant()
	{
		$restaurants = Restaurant::select(['id','name','image','alias'])->get();
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
      //     'name' => 'required|max:255',
      //     'desc' => 'required|max:255',
      //     'alias' => 'required|unique:articles,alias',
      //     'meta_desc' => 'required',
      //     'img' => 'required'
      // ]);
      $data = $request->all();
      // dd($data);
      $restaurant = new Restaurant;
      $restaurant->fill($data);
      // $restaurant->image = 'image';
      $restaurant->save();

      return redirect('/adminPanel');
  }

  public function showRestaurant($alias)
  {
    $restaurant = Restaurant::select(['id','name','image','description','working_hours','rating'])->where('alias', $alias)->first();
    return view('restaurant.restaurant_content')->with(['header'=>$this->header,
                                                        'restaurant'=>$restaurant]
    );
  }
}
