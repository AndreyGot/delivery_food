<?php

namespace App\Http\Controllers\Shop;

use App\Model\Association;
use App\Model\Restaurant;
use App\Model\Special;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function filtreByAssociation(Request $request){
        /** @var Association $association */
        $associations = $request->associationArray;
        $associationsId = array();

        if (empty($associations)){
            $restaurants = Restaurant::all();
            return view('shop.restaurant.listRestaurant', [
                'restaurants'=>$restaurants,
            ]);
        }
        else{
            foreach ($associations as $association){
                $associationsId[] = $association['value'];
            }
            $associations = Association::find($associationsId);

            $restaurants = array();
            foreach ($associations as $association){

                foreach ($association->categories as $category) {
                    $restaurants[$category->restaurant->id] = $category->restaurant;
                }
            }
        }

//        $associations = Association::all();
        return view('shop.restaurant.listRestaurant', [
            'restaurants'=>$restaurants,
        ]);
    }



    public function filtreCtrl(Request $request){
        $requestData = $request->requestData;
//        dd($requestData);
        $filtrRestaurants = array();
        if ($requestData == null){
            $restaurants = Restaurant::all();

            return view('shop.restaurant.listRestaurant', [
                'restaurants'=>$restaurants,
            ]);
        }
        else{
            foreach ($requestData as $requestOne){
                if ($requestOne['name'] == 'special'){
                    /** @var Special $special */
                    $specials = Special::where('status', true)->get();

                    foreach ($specials as $special){
                        $restaurants = $special->restaurants;
                        foreach ($restaurants as $restaurant){
                            $filtrRestaurants[$restaurant->id] = $restaurant;
                        }
                    }
                }
                elseif ($requestOne['name'] == 'online'){
                    dd($requestOne['name']);
                }
                elseif ($requestOne['name'] == 'cart'){
                    dd($requestOne['name']);
                }
                elseif ($requestOne['name'] == 'bonus'){
                    dd($requestOne['name']);
                }
            }
        }
        return view('shop.restaurant.listRestaurant', [
            'restaurants'=>$filtrRestaurants,
        ]);
    }
}
