<?php

namespace App\Http\Controllers\apis\Customer;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $filter['customer_id'] = request()->customer_id;
        $filter['limit'] = 5;
        $data['orders'] = Order::where('parent_id', 0)->where('vendor_id', NULL)->where('customer_id', $filter['customer_id'])->paginate('10');
        $data['notifications'] = Notification::where(['type' => 'alert', 'dismissed' => 'N', 'customer_id' => Auth::user()->id])->where('viewed', '<', 3)->get();
        return response()->json($data, 200);
    }

    public function orders($customer_id)
    {
        $filter['customer_id'] = $customer_id;
        $data['orders'] = Order::getOrders($filter);
        $data['orders'] = Order::where('parent_id', 0)->where('vendor_id', NULL)->where('customer_id', $filter['customer_id'])->paginate('10');
        return response()->json($data, 200);
    }

    public function order_detail($order_id)
    {
        $order = Order::with(['vendororders' => function ($q) {
            $q->with(['vendor_items','vendor']);
        }])->where('id',$order_id)->first();

        if(request()->customer_id != $order->customer_id)
            return response()->json(['error'=>'Unauthorized Api'], 404);

        $data['order'] = $order;
        // $data['vendor_orders'] = $order->vendororders;

        // foreach($data['vendor_orders'] as $key => $vendor_order)
        // {
        //     $data['vendor_orders'][$key]['items'] = $order->vendor_items($vendor_order->id);
        // }
        $data['notifications']  = Notification::where('order_id', $order->id)->where('type', 'order')->get();
        return response()->json($data, 200);
    }

    public function payment_history()
    {
        $customer = Customer::find(request()->customer_id);
        $data['payments'] = $customer->payments()->orderBy('id', 'desc')->paginate('10');
        return response()->json($data, 200);
    }

    public function payment_detail($id)
    {
        $payment = Payment::find($id);

        if($payment->customer_id != request()->customer_id)
            return response()->json(['error'=>'Unauthorized Api'], 404);

        $data['payment']      = $payment;
        if($payment->ref_type == 'order')
        {
            $link = '/dashboard/orders/'.$payment->ref_id;
        }
        $data['link'] = $link;
        return response()->json($data, 200);
    }
}
