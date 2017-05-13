<?php

namespace App\Http\Controllers\Shop;

use App\Model\Association;
use App\Model\Category;
use App\Model\PaymentMethod;
use App\Model\Restaurant;
use App\Model\Special;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function filterByPaymentMethod($option){
        $paymentMethodId = (int)$option;
        $paymentMethod = PaymentMethod::where('id', $paymentMethodId)->first();
        $restaurants = $paymentMethod->restaurants;
        foreach ($restaurants as $restaurant){
            $sortRestaurants[$restaurant->id] = $restaurant;
        }
    }
    public function filterCtrl(Request $request){
        /** @var Association $association */
        /** @var Restaurant $restaurant */
        /** @var Special $special */
        /** @var PaymentMethod $paymentMethod */
        $checkBoxOptions = $request->checkBoxArray;

        $sortRestaurants = array();

        if (empty($checkBoxOptions)){
            $restaurants = Restaurant::all();
            return view('shop.restaurant.listRestaurant', [
                'restaurants'=>$restaurants,
            ]);
        }
        else{
            foreach ($checkBoxOptions as $option){
                if ($option['name'] == 'special'){
                    $specials = Special::where('status', true)->get() ;
                    foreach ($specials as $special){
                        $restaurants = $special->restaurants;
                        foreach ($restaurants as $restaurant){
                            $sortRestaurants[$restaurant->id] = $restaurant;
                        }
                    }
//                    dd($restaurants);
                }
                elseif ($option['name'] == 'online'){
                    $option = $option['value'];
                    $this->filterByPaymentMethod($option);
                }
                elseif ($option['name'] == 'cart'){
                    $option = $option['value'];
                    $this->filterByPaymentMethod($option);
                }
                elseif ($option['name'] == 'bonus'){
                    $option = $option['value'];
                    $this->filterByPaymentMethod($option);
                }
                elseif ($option['name'] == 'cash'){
                    $restaurants = Restaurant::all();
                    foreach ($restaurants as $restaurant){
                        $sortRestaurants[$restaurant->id] = $restaurant;
                    }
                }
                else{
                    $associationId = (int)$option['value'];

                    $association = Association::where('id', $associationId)->first();
//                    dd($association->categories);
                    foreach ($association->categories as $category) {
                        $sortRestaurants[$category->restaurant->id] = $category->restaurant;
                    }
                }
            }
        }

        return view('shop.restaurant.listRestaurant', [
            'restaurants'=>$sortRestaurants,
        ]);
    }
}
