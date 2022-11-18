<?php

namespace App\Http\Livewire;

use App\Models\EvJob;
use Livewire\Component;

class JobListing extends Component
{
    public $event, $categories, $search, $jobs;
    public $categoryIds = [];

    public function mount()
    {
        $this->categories = EvJob::$categories;
        $this->jobs = $this->get_jobs();
    }

    public function render()
    {
        return view('livewire.job-listing');
    }

    public function updatedCategoryIds()
    {
        $this->mount();
    }

    public function refine()
    {
        $this->mount();
    }

    public function get_jobs()
    {
        $query = EvJob::where('event_id', $this->event->id);
        
        $this->search = trim($this->search);
        if($this->search)
            $query->where('name', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%');
        
        if(count($this->categoryIds) > 0)
        {
            $query->where(function($query)  {

                foreach($this->categoryIds as $cat_id)
                {
                    $query->orWhere('category_id', $cat_id);    
                }
            });            
        }

        return $query->get();
    }

    public function open_job($id)
    {
        $job = EvJob::find($id);

        $job->category_name = EvJob::$categories[$job->category_id];
        
        $this->dispatchBrowserEvent('open_job_modal', $job);
    }
}
