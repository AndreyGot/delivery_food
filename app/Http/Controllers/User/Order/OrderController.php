<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 14.04.2017
 * Time: 15:54
 */

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use App\Model\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\CookieCart;
use App\Model\FastOrder;
use App\Model\Order;
use App\Model\OrderStatus;
use App\Model\Profile;
use App\Model\UserAddress;

class OrderController extends Controller
{
    public function userOrderList(){
        /* @var Order $order */

        return view('admin.order.orderUserList', [
            'newUserOrders' => Order::where(['order_status_id' => 1])->get(),
            'handledUserOrders' => Order::where(['order_status_id' => 2])->get(),
            'archivedUserOrders' => Order::where(['order_status_id' => 3])->get(),
        ]);
    }
    
    public function makeFastOrder(Request $request)
    {
        $data = $request->all();
        if ($data['payment_method_id'] == 2) {
            return redirect()->route('user_order_checkout');
        }
//        dd(__METHOD__);
        $orderStatus = OrderStatus::where(['name' => 'Новый'])->first();
        if (empty($orderStatus)) {
            $orderStatus = OrderStatus::create(['name' => 'Новый']);
        }

        $cart = new CookieCart();
        $cartFoodList = $cart->getCartFoodList();

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
//        $status = 'order_status_id';
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

        $order->paymentMethod()->associate(PaymentMethod::find($data['payment_method_id']));

        if ($data['payment_method_id'] == 3 && !(Auth::user()->profile->bonus_score  >= $cart->getCartSummary()['totalCost'])) {
            dd('success');
        } elseif ($data['payment_method_id'] == 3) {
            Auth::user()->profile->bonus_score -= $cart->getCartSummary()['totalCost'];
//            dd(Auth::user()->profile->bonus_score);
        }

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
        $order->restaurant()->associate($cart->getRestaurant());
        $order->save();
        foreach ($cartFoodList as $cartFood) {
            $order->foods()->save($cartFood['food'], [
                'quantity' => $cartFood['quantity'],
                'actual_price' => $cartFood['food']->price
            ]);
        }
        Auth::user()->profile->bonus_score += round($cart->getCartSummary()['totalCost'] * 0.05);
        Auth::user()->profile->save();
        return redirect()->route('get_user_orders')->cookie($cart->convertCartToOrder($order->number))->cookie($cart->clearCart());
    }

    public function getCheckoutForm()
    {
        $cookieCart = new CookieCart();
        return view('user.checkout.showCheckout', [
            'cookieCart' => $cookieCart
        ]);
    }

    public function showOrder(Order $order)
    {
        $userAddress = $order->userAddress;

        return view('admin.order.showUserOrder', [
            'order' => $order,
            'userAddress' => $userAddress,
            'orderSummary' => $order->getSummaryOrderData(),
            'orderStatuses' => OrderStatus::orderBy('id')->get(),
        ]);
    }

    public function changeOrderStatus(Request $request, Order $order){

        $order->orderStatus()->associate(OrderStatus::find($request->order_status_id));
        $order->save();

        return response()->json([
            'redirectURL' => route('admin_user_order_list'),
            'order_status_id' => $request->order_status_id,
        ]);
    }
}