<?php

namespace App\Http\Livewire\Frontend\Includes;

use Cart;
use Config;
use Livewire\Component;

class MiniCartCounts extends Component
{
    public $rand_num, $cartCounts;
    protected $listeners = ['updateCartCounts' => 'updateCartCounts'];

    public function render()
    {
        $product_cart = product_cart($this->rand_num);
        $this->cartCounts = $product_cart->getTotalQuantity();
        $this->updateCartCounts();
        return view('livewire.frontend.includes.mini-cart-counts');
    }

    public function updateCartCounts($total="")
    {
        $product_cart = product_cart($this->rand_num);
        $this->cartCounts = $product_cart->getTotalQuantity();
    }
}
