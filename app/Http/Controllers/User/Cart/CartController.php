<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 08.04.2017
 * Time: 15:22
 */

namespace App\Http\Controllers\User\Cart;


use App\Http\Controllers\Controller;
use App\Model\CookieCart;
use App\Model\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $food = Food::find($request->food_id);


        if (!is_null($food)) {
            if (Auth::user()) {

            }

//            dd($cartSummary);

            $cart = new CookieCart();
            $cartCookie = $cart->addProduct($food);
            $cartSummary = $cart->getCartSummary();

            return response()->json($cartSummary)->cookie($cartCookie);
        }
//        dd($request->cookie('test')['products']);
        return response('');
    }

    public function showCart()
    {
        $cart = new CookieCart();

        $cartFoodList = $cart->getCartFoodList();

        return view('user.cart.cartShow', [
            'cartFoodList' => $cartFoodList,
            'cartSummary' => $cart->getCartSummary(),
        ]);
    }

    public function removeProduct(Request $request)
    {
        $food = Food::find($request->food_id);

        if (!empty($food)) {
            if (!is_null($food)) {
                if (Auth::user()) {

                }

                $cart = new CookieCart();
                $cartCookie = $cart->removeProduct($food);
                $cartSummary = $cart->getCartSummary();

                return response()->json($cartSummary)->cookie($cartCookie);
            }
        }

        return view('');
    }
}