<?php

namespace App\Http\Livewire\Frontend\Includes;

use App\Models\Wishlist;
use Cart;
use Config;
use Livewire\Component;

class WishListCounts extends Component
{
    public $rand_num, $wishListCounts;
    protected $listeners = ['updateCartCounts' => 'updateCartCounts'];

    public function render()
    {
        $this->updateCartCounts();
        return view('livewire.frontend.includes.wish-list-counts');
    }

    public function updateCartCounts()
    {
        $id = auth()->user()->id;
        $this->wishListCounts = Wishlist::where('customer_id', $id)->where('status', '1')->count();
    }
}
