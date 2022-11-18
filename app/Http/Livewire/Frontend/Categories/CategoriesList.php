<?php

namespace App\Http\Livewire\Frontend\Categories;

use Livewire\Component;

class CategoriesList extends Component
{
    public $categories, $gridClass;

    public function render()
    {
        return view('livewire.frontend.categories.categories-list');
    }
}
