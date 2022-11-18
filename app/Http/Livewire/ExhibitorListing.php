<?php

namespace App\Http\Livewire;

use App\Models\Speaker;
use Livewire\Component;
use App\Models\EventVendors;
use App\Models\EventsCategories;

class ExhibitorListing extends Component
{
    public $event, $categories, $search, $exhibitors;
    public $categoryIds = [];

    public function mount()
    {
        $this->exhibitors = $this->get_exhibitors();
        $this->categories = $this->get_categories();
    }

    public function render()
    {
        return view('livewire.exhibitor-listing');
    }

    public function updated()
    {
        $this->mount();
    }

    public function get_exhibitors()
    {
        if(trim($this->search) == null)
            $this->search = null;

        $query = EventVendors::where('event_id', '=', $this->event->id);
        
        $this->search = trim($this->search);
        if($this->search)
        {
            $query->where(function($query)  {

                $query->orWhere('display_name', 'like', '%' . $this->search . '%');
                $query->orWhere('company_intro', 'like', '%' . $this->search . '%');
                
            });     
        }

        if(count($this->categoryIds) > 0)
        {
            $query->where(function($query)  {

                foreach($this->categoryIds as $cat_id)
                {
                    $query->orWhereRaw("FIND_IN_SET(". $cat_id .", categories)");    
                }
            });            
        }

        return $query->get();
    }

    public function get_categories()
    {   
        return EventsCategories::all();
    }
}
