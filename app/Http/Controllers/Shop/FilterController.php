<?php

namespace App\Http\Controllers\Shop;

use App\Model\Association;
use App\Model\Restaurant;
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

        $associations = Association::all();
        return view('shop.restaurant.listRestaurant', [
            'restaurants'=>$restaurants,
            'associations'=>$associations,
        ]);
    }
}
