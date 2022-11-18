<?php

namespace App\Http\Livewire;

use App\Models\Speaker;
use Livewire\Component;

class SpeakerListing extends Component
{
    public $event, $job_titles, $institutes, $search, $speakers, $type='events';
    public $selectedJobTitles = [];
    public $selectedInstitutes = [];

    public function mount()
    {
        $this->speakers = $this->get_speakers();
        $this->job_titles = $this->get_job_titles();
        $this->institutes = $this->get_institutes();
    }

    public function render()
    {
        return view('livewire.speaker-listing');
    }

    public function updated()
    {
        $this->mount();
    }

    public function get_speakers()
    {
        if(trim($this->search) == null)
            $this->search = null;

        $query = Speaker::where('status','Y');
        
        $this->search = trim($this->search);
        if($this->search)
        {
            $query->where(function($query)  {

                $query->orWhere('first_name', 'like', '%' . $this->search . '%');
                $query->orWhere('last_name', 'like', '%' . $this->search . '%');
                
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
        return Speaker::select('job_title')->where('job_title', '!=', '')->distinct()->get();
    }

    public function get_institutes()
    {   
        return Speaker::select('institute')->where('institute', '!=', '')->distinct()->get();
    }
}
