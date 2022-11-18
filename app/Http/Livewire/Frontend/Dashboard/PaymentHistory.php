<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\Customer;
use Livewire\Component;

class PaymentHistory extends Component
{
    public function render()
    {
        $customer =  Customer::logged_in();
        $data['page'] = 'payment-history';
        $data['payment_history'] = $customer->payments()->orderBy('id', 'desc')->paginate('10');
        return view('livewire.frontend.dashboard.payment-history', $data);
    }
}
