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
use App\Model\Order;
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

        return redirect()->route('main_index')
                         ->cookie($cart->convertCartToOrder($fastOrder->number))
                         ->cookie($cart->clearCart());
    }

    public function getUserOrders()
    {
        /* @var $order Order*/
        $user = Auth::user();
        $profile = $user->profile;
        $orders = Order::where('profile_id', $profile->id)->get();
//        dd($orders);
        foreach ($orders as $order) {
            $order->order_status_id = $order->orderStatus->name;
//            dd($order->order_status_id );
        }
        $status = 'order_status_id';
        return view('user.order.orderList', ['profile'=>$profile, 'user'=>$user, 'orders'=>$orders ]);
    }

    public function OrderDetails(Order $order)
    {

        // dd($order->foods[0]->pivot->actual_price);
        // dd($order->foods[0]->pivot->quantity);
        dd($order->foods);
    }

    public function makeUserOrder()
    {
        return response(__METHOD__);
    }
}