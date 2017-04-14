<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 14.04.2017
 * Time: 21:16
 */

namespace App\Http\Controllers\Security;


use App\Http\Controllers\Controller;
use App\Model\FastOrder;

class OrderController extends Controller
{
    public function ordersList()
    {
        return view('admin.order.orderList', [
            'newFastOrders' => FastOrder::where(['order_status_id' => 1])->get(),
        ]);
    }
}