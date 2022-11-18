<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use Livewire\Component;

class MiniCartList extends Component
{
    public $miniCart, $subTotal;
    protected $listeners = ['updateMiniCart' => 'updateMiniCart'];
    public function mount()
    {
        $this->updateMiniCart();
    }

    public function render()
    {
        return view('livewire.frontend.includes.partials.mini-cart-list');
    }

    public function updateMiniCart()
    {
        $product_cart = product_cart(session()->get('rand_num'));
        $this->miniCart = $product_cart->getContent();
        $this->subTotal = $product_cart->getSubTotal();
        $this->dispatchBrowserEvent('update_mini_cart', [
            'value' => true,
        ]);
        $this->emit('updateCartCounts');
        // $this->emit('updateCartCounts', $product_cart->getTotalQuantity());
    }

    public function removeCart($itemId)
    {
        $product_cart = product_cart(session()->get('rand_num'));
        $product_cart->remove($itemId);
        $this->updateMiniCart();
        $this->emit('updateCartCounts');
        // $this->emit('updateCartCounts', $product_cart->getTotalQuantity());
    }
}
