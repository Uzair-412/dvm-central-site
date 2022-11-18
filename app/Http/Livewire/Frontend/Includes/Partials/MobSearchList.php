<?php

namespace App\Http\Livewire\Frontend\Includes\Partials;

use App\Models\Product;
use Livewire\Component;

class MobSearchList extends Component
{
    public $mobileSearchInput, $searchList=[];

    public function render()
    {
        return view('livewire.frontend.includes.partials.mob-search-list');
    }

    public function updatedMobileSearchInput($value)
    {
        if(!empty($value))
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
        else
        {
            $this->searchList = [];
        }
    }
}
