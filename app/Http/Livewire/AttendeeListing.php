<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendee;

class AttendeeListing extends Component
{
    public $event, $job_titles, $institutes, $search, $attendees;
    public $selectedJobTitles = [];
    public $selectedInstitutes = [];

    public function mount()
    {
        $this->categories = [];
        $this->attendees = $this->get_attendees();
        $this->job_titles = $this->get_job_titles();
        $this->institutes = $this->get_institutes();
    }

    public function render()
    {
        return view('livewire.attendee-listing');
    }

    public function updated()
    {
        $this->mount();
    }

    public function get_attendees()
    {
        if(trim($this->search) == null)
            $this->search = null;

        $query = Attendee::where('id', '!=', '');
        
        $this->search = trim($this->search);
        if($this->search)
        {
            //$query->where('institute', 'like', '%' . $this->search . '%');
            $query->whereHas('users', function($query){
                
                $query->where(function($query)  {

                    $query->orWhere('first_name', 'like', '%' . $this->search . '%');
                    $query->orWhere('last_name', 'like', '%' . $this->search . '%');
                    
                });     
                
                
            });
        }
            
        
        if(count($this->selectedJobTitles) > 0)
        {
            $query->where(function($query)  {

                foreach($this->selectedJobTitles as $jt)
                {
                    $query->orWhere('job_title', $jt);    
                }
            });            
        }

        if(count($this->selectedInstitutes) > 0)
        {
            $query->where(function($query)  {

                foreach($this->selectedInstitutes as $inst)
                {
                    $query->orWhere('institute', $inst);    
                }
            });            
        }

        return $query->get();
    }

    public function get_job_titles()
    {   
        return Attendee::select('job_title')->where('job_title', '!=', '')->distinct()->get();
    }

    public function get_institutes()
    {   
        return Attendee::select('institute')->where('institute', '!=', '')->distinct()->get();
    }
}
