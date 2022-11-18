<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EvJob;

class JobList extends Component
{
    public $exhibitor_data, $edit_mode, $jobs, $counter;
    public $max_jobs = 4;
    public $total_jobs = 0;
    
    protected $listeners = ['jobsUpdated' => 'mount'];

    public function mount()
    {
        $this->jobs = EvJob::where('ev_id', $this->exhibitor_data->id)->get();
        $this->total_jobs = count($this->jobs);
        $this->counter = '('. $this->total_jobs .' / '. $this->max_jobs .')';
    }

    public function destroy($job_id)
    {
        $job = EvJob::find($job_id);
        if($job->image1 != '')
        {
            $file_path = 'up_data/'.$job->image1;
            if(file_exists($file_path))
                unlink($file_path);
        }

        $job->delete();
        $this->notify('Job deleted!');
        $this->mount();
    }

    public function open_job($id)
    {
        $job = EvJob::find($id);

        $job->category_name = EvJob::$categories[$job->category_id];
        
        $this->dispatchBrowserEvent('open_job_modal', $job);
    }

    public function render()
    {
        return view('livewire.job-list');
    }
}
