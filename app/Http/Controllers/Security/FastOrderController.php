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
use App\Model\OrderStatus;
use Illuminate\Http\Request;

class FastOrderController extends Controller
{
    public function ordersList()
    {
        return view('admin.order.orderList', [
            'newFastOrders' => FastOrder::where(['order_status_id' => 1])->get(),
        ]);
    }

    public function showOrder(FastOrder $fastOrder)
    {
        return view('admin.order.showFastOrder', [
            'fastOrder' => $fastOrder,
            'orderSummary' => $fastOrder->getSummaryOrderData(),
            'orderStatuses' => OrderStatus::orderBy('id')->get(),
        ]);
    }

    public function changeOrderStatus(FastOrder $fastOrder, Request $request)
    {
        $fastOrder->orderStatus()->associate();
        return response()->json([__CLASS__]);
    }
}