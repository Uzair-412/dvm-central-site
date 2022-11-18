<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use Cart;
use Config;
use Livewire\Component;

class Header extends Component
{
    public $rand_num;
    public function mount()
    {
        $product_cart = product_cart($this->rand_num);
        $this->cartCounts = $product_cart->getTotalQuantity();
    }
    public function render()
    {
        return view('livewire.frontend.includes.partials.header');
    }
}
