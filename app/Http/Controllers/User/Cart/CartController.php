<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 08.04.2017
 * Time: 15:22
 */

namespace App\Http\Controllers\User\Cart;


use App\Http\Controllers\Controller;
use App\Model\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $food = Food::find($request->food_id);
        if (!is_null($food)) {
            if (Auth::user()) {

            }
            /* @var \Symfony\Component\HttpFoundation\Cookie $cartCookie */
            $cartCookie = $this->addProductToCookie($food, $request);
            $cartSummary = $this->buildCartSummary($cartCookie);
//            dd($cartSummary);
            return response()->json($cartSummary)->cookie($cartCookie);
        }
//        dd($request->cookie('test')['products']);
        return response('');
    }

    private function addProductToCookie(Food $food, Request $request, $quantity = 1)
    {
        $cart = $request->cookie('cart');
//        dd($cart);
        if (is_null($cart)) {
            $cart = [];
        } else{
            if (array_key_exists($food->id, $cart)) {
                $cart[$food->id]['quantity'] += $quantity;
            } else {
                $cart[$food->id] = $this->buildCartProduct($food, $quantity);
            }

        }

//        dd($cart);
        return cookie('cart', $cart, 365 * 24 * 60);
    }

    private function buildCartProduct(Food $food, $quantity = 1)
    {
        return [
            'name' => $food->name,
            'quantity' => $quantity,
        ];
    }

    private function buildCartSummary(Cookie $cartCookie)
    {
        /* @var array $cartData */
        $cartData = $cartCookie->getValue();
        $foodIdList = array_keys($cartData);
        $foodList = Food::find($foodIdList);
        /* @var Food $food*/
        $summaryData = [
            'totalCount' => 0,
            'totalCost' => 0,
        ];
        foreach ($foodList as $food) {
            $foodPrice = (double)$food->price;
            $summaryData['totalCost'] += (int)$cartData[$food->id]['quantity'] * $foodPrice;
            $summaryData['totalCount'] += (int)$cartData[$food->id]['quantity'];
        }
        return $summaryData;
    }
}