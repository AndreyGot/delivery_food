<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 14.04.2017
 * Time: 15:54
 */

namespace App\Http\Controllers\User\Order;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\CookieCart;
use App\Model\FastOrder;
use App\Model\Order;
use App\Model\OrderStatus;
use App\Model\Profile;
use App\Model\UserAddress;
use App\Model\User;

class OrderController extends Controller
{
    public function makeFastOrder(Request $request)
    {
        $orderStatus = OrderStatus::where(['name' => 'Новый'])->first();
        if (empty($orderStatus)) {
            $orderStatus = OrderStatus::create(['name' => 'Новый']);
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
        $orders = $profile->orders;
       // dd($orders);
        // $orders = Order::where('profile_id', $profile->id)->get();
        foreach ($orders as $order) {
            $order->order_status_id = $order->orderStatus->name;
//            dd($order->order_status_id );
        }
        $status = 'order_status_id';
        return view('user.order.orderList', ['profile'=>$profile, 'user'=>$user, 'orders'=>$orders ]);
    }

    public function OrderDetails(Order $order)
    {
        $order->order_status_id = $order->orderStatus->name;
        $foods = $order->foods;
        $profile = $order->profile;

        $totalPrice = $order->getTotal();
        // dd($totalPrice);
        return view('user.order.orderDetails', [
            'profile'=>$profile, 
            'order'=>$order, 
            'foods'=>$foods,
            'totalPrice'=>$totalPrice
        ]);
    }

    public function makeUserOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user_cart_show');
        }
        $orderStatus = OrderStatus::where(['name' => 'Новый'])->first();
        if (empty($orderStatus)) {
            $orderStatus = OrderStatus::create(['name' => 'Новый']);
        }

        $cart = new CookieCart();
        $cartFoodList = $cart->getCartFoodList();

        $data = $request->all();
        $order = new Order();
        $order->fill($data);
        $order->number = Auth::user()->id . '_' . time();
        $order->orderStatus()->associate($orderStatus);
        if (empty($profile = Auth::user()->profile)) {
            $profile = new Profile();
            $profile->fill($data);
            $profile->first_name = $data['customer_name'];
            $profile->phone_1 = $data['phone'];


            $profile->user()->save(Auth::user());
            $profile->save();

            Auth::user()->profile()->associate($profile);

            Auth::user()->save();

        }
//        dd(Auth::user()->profile->userAddresses);
        if (Auth::user()->profile->userAddresses->isEmpty()) {
            $userAddress = new UserAddress();
            $userAddress->fill($data);
            $userAddress->profile()->associate(Auth::user()->profile);
            $userAddress->save();
        } else {
            $userAddress = UserAddress::find($data['user_address_id']);
        }

        $order->profile()->associate(Auth::user()->profile);
        $order->userAddress()->associate($userAddress);
        $order->save();
        foreach ($cartFoodList as $cartFood) {
            $order->foods()->save($cartFood['food'], [
                'quantity' => $cartFood['quantity'],
                'actual_price' => $cartFood['food']->price
            ]);
        }

        return redirect()->route('main_index')->cookie($cart->convertCartToOrder($order->number))->cookie($cart->clearCart());
    }
}