<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Dashboard extends Component
{
    public $view='home', $orderId, $payment;

    public function render()
    {
        return view('livewire.frontend.dashboard');
    }

    public function ChangeView($view)
    {
        $this->view = $view;
    }
}
