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
//        dd($checkBoxOptions[0]['value']);
        $associationsId = array();
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
//                    dd($sortRestaurants);
                }
            }
//                    $associationsId[] = $option['value'];
//            $associations = Association::find($associationsId);

//            foreach ($associations as $association){
//
//                foreach ($association->categories as $category) {
//                    $sortRestaurants[$category->restaurant->id] = $category->restaurant;
//                }
//            }
        }
//        dd($sortRestaurants);

//        $associations = Association::all();
        return view('shop.restaurant.listRestaurant', [
            'restaurants'=>$sortRestaurants,
        ]);
    }





//    public function filtreCtrl(Request $request){
//        $requestData = $request->requestData;
////        dd($requestData);
//        $filtrRestaurants = array();
//        if ($requestData == null){
//            $restaurants = Restaurant::all();
//
//            return view('shop.restaurant.listRestaurant', [
//                'restaurants'=>$restaurants,
//            ]);
//        }
//        else{
//            foreach ($requestData as $requestOne){
//                if ($requestOne['name'] == 'special'){
//                    /** @var Special $special */
//                    $specials = Special::where('status', true)->get();
//
//                    foreach ($specials as $special){
//                        $restaurants = $special->restaurants;
//                        foreach ($restaurants as $restaurant){
//                            $filtrRestaurants[$restaurant->id] = $restaurant;
//                        }
//                    }
//                }
//                elseif ($requestOne['name'] == 'online'){
//                    dd($requestOne['name']);
//                }
//                elseif ($requestOne['name'] == 'cart'){
//                    dd($requestOne['name']);
//                }
//                elseif ($requestOne['name'] == 'bonus'){
//                    dd($requestOne['name']);
//                }
//            }
//        }
//        return view('shop.restaurant.listRestaurant', [
//            'restaurants'=>$filtrRestaurants,
//        ]);
//    }
}
