<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EvJob;
use Livewire\WithFileUploads;

class JobEdit extends Component
{
    use WithFileUploads;

    public $exhibitor_data, $mode = 'add';
    public $product_id, $image, $image_e, $name, $description, $category_id, $link; // form fields, putting them separate

    protected $listeners = ['editJob' => 'edit_job', 'addJob' => 'add_job'];

    protected $rules = [
        'category_id'   => 'required',
        'name'          => 'required',
        'description'   => 'required|max:400',
        'link'          => 'sometimes|url',
        'image'         => 'required|image|max:1000',
    ];
    
    protected $validationAttributes = [
        'category_id' => 'category',
    ];

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.job-edit');
    }

    public function save()
    {
        // Livewire making a mess, "sometimes" condition not working
        if(trim($this->category_id) == null)
            $this->category_id = '';

        if(trim($this->name) == null)
            $this->name = '';

        if(trim($this->description) == null)
            $this->description = '';

        if(trim($this->link) == null)
            $this->link = '';    
        
        if(trim($this->image) == null)
            $this->image = '';    

        $rules = $this->rules;

        if($this->mode == 'edit')
        {
            $rules['image'] = 'sometimes|image|dimensions:width=600,height=600|max:500';
        }

        $this->validate($rules);

        $data = [   'ev_id' => $this->exhibitor_data->id, 
                    'event_id' => $this->exhibitor_data->event_id, 
                    'category_id' => $this->category_id,
                    'name' => $this->name,
                    'description' => $this->description
                ];             

        if(trim($this->link != null))
        {
            $data['link'] = $this->link;
        }

        if($this->job_id)
        {
            $job = EvJob::find($this->job_id);
            $job->update($data);   
        }
        else
        {
            $job = EvJob::create($data);
        }

        if($this->image)
        {
            if($job->image != '')
            {
                $file_path = 'up_data/'.$job->image;
                if(file_exists($file_path))
                    unlink($file_path);
            }

            $job->update([
                'image1' => $this->image->store('events/jobs', 'ds3')
            ]);
        }

        $this->reset_fields();

        if($this->mode == 'add')
            $message = 'Job added!';
        else 
            $message = 'Job updated!';
        
        $this->notify($message);
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('jobsUpdated');
    }

    public function add_job()
    {
        $this->reset_fields();

        $this->dispatchBrowserEvent('edit_job_click');

        $this->mode = 'add';

        $this->render();
    }

    public function edit_job($id)
    {
        $this->reset_fields();

        $job = EvJob::find($id);

        $this->job_id = $job->id;
        $this->category_id = $job->category_id;
        $this->image_e = $job->image1; 
        $this->name = $job->name;
        $this->description = $job->description;
        $this->link = $job->link;

        $this->dispatchBrowserEvent('edit_job_click');

        $this->mode = 'edit';

        $this->render();
    }

    public function reset_fields()
    {
        $this->job_id = $this->name = $this->description = $this->link = 
        $this->image = $this->image_e = $this->category_id = null;
    }
}
