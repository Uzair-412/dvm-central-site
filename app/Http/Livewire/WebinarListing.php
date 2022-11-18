<?php

namespace App\Http\Livewire;

use App\Models\Webinar;
use Livewire\Component;

class WebinarListing extends Component
{
    public $event, $search, $webinars;

    public function mount()
    {
        $this->webinars = $this->get_webinars();
    }

    public function render()
    {
        return view('livewire.webinar-listing');
    }

    public function updated()
    {
        $this->mount();
    }

    public function get_webinars()
    {
        if(trim($this->search) == null)
            $this->search = null;

        $query = Webinar::where('id', '!=', '');
        
        $this->search = trim($this->search);

        $query = Webinar::query()
            ->when($this->search, fn($query) => $query->orWhere('name', 'like', '%' . $this->search . '%')
            ->orWhere('short_detail', 'like', '%' . $this->search . '%')
            ->orWhere('full_detail', 'like', '%' . $this->search . '%'))
            ->where('id', '!=', '');


        // if($this->search)
        // {
        //     $query->where(function($query)  {

        //         $query->orWhere('name', 'like', '%' . $this->search . '%');
        //         $query->orWhere('short_detail', 'like', '%' . $this->search . '%');
        //         $query->orWhere('full_detail', 'like', '%' . $this->search . '%');
                
        //     });     
        // }

        // if(count($this->categoryIds) > 0)
        // {
        //     $query->where(function($query)  {

        //         foreach($this->categoryIds as $cat_id)
        //         {
        //             $query->orWhereRaw("FIND_IN_SET(". $cat_id .", categories)");    
        //         }
        //     });            
        // }

        return $query->get();
    }

    // public function get_categories()
    // {   
    //     return EventsCategories::all();
    // }
}
