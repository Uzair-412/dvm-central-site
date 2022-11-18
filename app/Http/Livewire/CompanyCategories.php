<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventVendors;
use App\Models\EventsCategories;

class CompanyCategories extends Component
{
    public $exhibitor_data, $company_categories, $event_categories;
    public $selectedCategories = [];

    public function mount()
    {
        $this->selectedCategories = explode(',',$this->exhibitor_data->categories);
        $this->event_categories = EventsCategories::where('section', 'exhibitors')->get();
    }
    
    public function render()
    {
        return view('livewire.company-categories');
    }

    public function updatedSelectedCategories()
    {
        if(sizeof($this->selectedCategories) > 3)
        {
            session()->flash('error', 'You can select maximum of 3 categories.');
        }
    }

    public function save()
    {

        if(sizeof($this->selectedCategories) > 3)
        {
            session()->flash('error', 'You can select maximum of 3 categories.');
        }
        else
        {
            $selectedCategories = implode(',', $this->selectedCategories);
            EventVendors::where('id', $this->exhibitor_data->id)->update(['categories' => $selectedCategories]);
            
            $this->notify('Categories saved successfully!');
            $this->dispatchBrowserEvent('close_sidebar');
            $this->emit('categoriesUpdated');
        }
        
    }
}
