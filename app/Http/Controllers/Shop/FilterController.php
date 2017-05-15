<?php

namespace App\Http\Controllers\Shop;

use App\Model\Association;
use App\Model\Restaurant;
use App\Model\Category;
use App\Model\Special;
use App\Model\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    /** @var Association $association */
    /** @var Restaurant $restaurant */
    /** @var Category $category */
    /** @var Special $special */
    /** @var PaymentMethod $paymentMethod */

    public function filterByPaymentMethod($option){
        $paymentMethodId = (int)$option;
        $paymentMethod = PaymentMethod::where('id', $paymentMethodId)->first();
        $restaurants = $paymentMethod->restaurants;
        foreach ($restaurants as $restaurant){
            $sortRestaurants[$restaurant->id] = $restaurant;
        }
    }

    public function filterCtrl(Request $request){
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

    public function getAllRestaurants(){
        $restaurants = Restaurant::all();
        $paymentMethods = PaymentMethod::all();
        $associations = Association::all();
        return view('shop.tamplates.medium_filter_block', [
            'restaurants'=>$restaurants,
            'paymentMethods'	=>$paymentMethods,
            'associations'	=>$associations,
        ]);
    }

    public function getSushiRestaurants(){

        $paymentMethods = PaymentMethod::all();
        $associations = Association::all();
        $associationSushi = Association::where('alias', 'sushi')->first();
        $sushiRestaurants = array();
        if ($associationSushi) {
            $sushiCategories = $associationSushi->categories;
            foreach ($sushiCategories as $category) {
                $sushiRestaurants[] = $category->restaurant;
            }
        }

        return view('shop.tamplates.medium_filter_block', [
            'restaurants'   =>$sushiRestaurants,
            'paymentMethods'=>$paymentMethods,
            'associations'	=>$associations,
        ]);
    }

    public function getPiccaRestaurants(){

        $paymentMethods = PaymentMethod::all();
        $associations = Association::all();
        $associationPicca = Association::where('alias', 'picca')->first();
        $piccaRestaurants = array();
        if ($associationPicca) {
            $piccaCategories = $associationPicca->categories;
            foreach ($piccaCategories as $category) {
                $piccaRestaurants[] = $category->restaurant;
            }
        }

        return view('shop.tamplates.medium_filter_block', [
            'restaurants'   =>$piccaRestaurants,
            'paymentMethods'=>$paymentMethods,
            'associations'	=>$associations,
        ]);
    }

    public function getShashlykiRestaurants(){

        $paymentMethods = PaymentMethod::all();
        $associations = Association::all();
        $associationShashlyki = Association::where('alias', 'shashlyki')->first();
        $shashlykiRestaurants = array();
        if ($associationShashlyki){
            $shashlykiCategories = $associationShashlyki->categories;
            foreach ($shashlykiCategories as $category){
                $shashlykiRestaurants[] = $category->restaurant;
            }
        }

        return view('shop.tamplates.medium_filter_block', [
            'restaurants'   =>$shashlykiRestaurants,
            'paymentMethods'=>$paymentMethods,
            'associations'	=>$associations,
        ]);
    }

    public function getPirogiRestaurants(){
        $paymentMethods = PaymentMethod::all();
        $associations = Association::all();
        $associationPirogi = Association::where('alias', 'pirogi')->first();
        $pirogiRestaurants = array();
        if ($associationPirogi) {
            $pirogiCategories = $associationPirogi->categories;
            foreach ($pirogiCategories as $category) {
                $pirogiRestaurants[] = $category->restaurant;
            }
        }

        return view('shop.tamplates.medium_filter_block', [
            'restaurants'   =>$pirogiRestaurants,
            'paymentMethods'=>$paymentMethods,
            'associations'	=>$associations,
        ]);
    }

    public function getBurgeryRestaurants(){
        $paymentMethods = PaymentMethod::all();
        $associations = Association::all();
        $associationBurgery = Association::where('alias', 'burgery')->first();
        $burgeryRestaurants = array();
        if ($associationBurgery) {
            $burgeryCategories = $associationBurgery->categories;
            foreach ($burgeryCategories as $category) {
                $burgeryRestaurants[] = $category->restaurant;
            }
        }

        return view('shop.tamplates.medium_filter_block', [
            'restaurants'   =>$burgeryRestaurants,
            'paymentMethods'=>$paymentMethods,
            'associations'	=>$associations,
        ]);
    }
}
