<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Livewire\Component;

class OrderDetail extends Component
{
    public $orderId;

    public function render()
    {
        $order = Order::find($this->orderId);
        $customer =  Auth::user();
        if($customer->id != $order->customer_id)
            abort(404);

        $data['order'] = $order;
        $data['notifications']  = Notification::where('order_id', $order->id)->where('type', 'order')->get();
        return view('livewire.frontend.dashboard.order-detail', $data);
    }
}
