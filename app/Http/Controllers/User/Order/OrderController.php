<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 14.04.2017
 * Time: 15:54
 */

namespace App\Http\Controllers\User\Order;


use App\Http\Controllers\Controller;
use App\Model\CookieCart;
use App\Model\FastOrder;
use App\Model\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function makeFastOrder(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('user_order_userOrder_make');
        }
        $orderStatus = OrderStatus::where(['name' => 'Новый'])->first();
        if (empty($orderStatus)) {
            $orderStatus = UserStatus::create(['name' => 'Новый']);
        }

        $cart = new CookieCart();
        $cartFoodList = $cart->getCartFoodList();

        $data = $request->all();
        $fastOrder = new FastOrder();
        $fastOrder->fill($data);
        $fastOrder->number = 'fo' . time();
        $fastOrder->orderStatus()->associate($orderStatus);
        $fastOrder->save();

        foreach ($cartFoodList as $cartFood) {
            $fastOrder->foods()->save($cartFood['food'], [
                'quantity' => $cartFood['quantity'],
                'actual_price' => $cartFood['food']->price
            ]);
        }

        return redirect()->route('main_index')->cookie($cart->convertCartToOrder($fastOrder->number))->cookie($cart->clearCart());
    }

    public function makeUserOrder()
    {
        return response(__METHOD__);
    }
}