<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventsCategories;

class CompanyCategoriesList extends Component
{
    public $exhibitor_data, $categories, $display_text;

    protected $listeners = ['categoriesUpdated' => 'mount'];

    public function mount()
    {
        $this->categories = EventsCategories::getExhibitorCategoriesById($this->exhibitor_data->id);
    }

    public function render()
    {
        return view('livewire.company-categories-list');
    }
}
