<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use App\Models\Product;
use Livewire\Component;

class SearchList extends Component
{
    public $searchInput, $searchList=[], $scollHeader=false;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.frontend.includes.partials.search-list');
    }

    public function updatedSearchInput($value)
    {
        $filter = ['keywords' => $value];
        $products = Product::getProducts($filter);
        $this->searchList = [];
        if($products->count() > 0)
        {
            foreach($products as $product)
            {
                $this->searchList[] = $product;
            }
        }
        else
        {
            $this->searchList = [];
        }
    }
}
