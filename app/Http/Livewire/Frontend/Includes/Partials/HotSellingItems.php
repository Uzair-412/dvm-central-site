<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use App\Models\Product;
use Livewire\Component;

class HotSellingItems extends Component
{
    // public $hot_products = [];

    public function mount()
    {
        // $products = Product::getHotProducts();
        // if($products)
        //     $this->hot_products = $products;
        // else
        //     $this->hot_products = [];
        // dd($this->hot_products);
    }
    public function render()
    {
        $data['hot_products'] = Product::getHotProducts();
        return view('livewire.frontend.includes.partials.hot-selling-items', $data);
    }
}
