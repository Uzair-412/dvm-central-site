<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;

class PaymentHistoryDetail extends Component
{
    public $payment;
    public function render()
    {
        return view('livewire.frontend.dashboard.payment-history-detail');
    }
}
