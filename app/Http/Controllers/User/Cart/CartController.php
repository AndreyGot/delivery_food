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
use App\Model\PaymentMethod;
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
        $paymentMethods = PaymentMethod::all();
//        dd($paymentMethods);
        $cartFoodList = $cart->getCartFoodList();
        $view = !$cart->isEmpty() ? 'user.cart.cartShow' : 'user.cart.cartEmpty';

        return view( $view, [
            'cartFoodList' => $cartFoodList,
            'paymentMethods' => $paymentMethods,
            'cartSummary' => $cart->getCartSummary(),
            'action' => Auth::check() ? route('user_order_userOrder_make') : route('user_order_fastOrder_make'),
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

    public function removeAllByProduct(Request $request)
    {
        $food = Food::find($request->food_id);

        if (!empty($food)) {
            if (!is_null($food)) {
                if (Auth::user()) {
                }

                $cart = new CookieCart();
                $cartCookie = $cart->removeProduct($food, true);
                $cartSummary = $cart->getCartSummary();

                return response()->json([
                    'cartSummary' => $cartSummary,
                    'isEmpty' => $cart->isEmpty(),
                    'redirectURL' => route('user_cart_show'),
                ])->cookie($cartCookie);
            }
        }

        return view('');
    }

    public function clearCart()
    {
        if (Auth::user()) {
        }

        $cart = new CookieCart();

        return response()->json(['redirectURL' => route('user_cart_show')])->cookie($cart->clearCart());
    }
}