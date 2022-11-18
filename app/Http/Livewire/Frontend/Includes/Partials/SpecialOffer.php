<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use App\Models\Product;
use Livewire\Component;

class SpecialOffer extends Component
{
    public function render()
    {
        $data['featured_products'] = Product::getFeaturedProducts();
        return view('livewire.frontend.includes.partials.special-offer', $data);
    }
}
