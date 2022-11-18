<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\Order;
use Auth;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $filter['customer_id'] = Auth::user()->id;
        // $filter['parent_id'] = 0;
        // $filter['vendor_id'] = NULL;
        // $data['orders'] = Order::getOrders($filter);

        $data['orders'] = Order::where('customer_id', $filter['customer_id'])->orderBy('id', 'DESC')->paginate('10');
        return view('livewire.frontend.dashboard.orders', $data);
    }
}
