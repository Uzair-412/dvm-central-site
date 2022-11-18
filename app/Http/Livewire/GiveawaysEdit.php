<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EvGiveaway;
use Livewire\WithFileUploads;

class GiveawaysEdit extends Component
{
    use WithFileUploads;

    public $exhibitor_data, $mode = 'add';
    public $giveaway_id, $gw_image, $gw_image_e, $name, $description, $link; // form fields, putting them separate

    protected $listeners = ['editGiveaway' => 'edit_giveaway', 'addGiveaway' => 'add_giveaway'];

    protected $rules = [
        'name'          => 'required',
        'description'   => 'required|max:400',
        'link'          => 'sometimes|url',
        'gw_image'      => 'required|image|dimensions:width=600,height=600|max:500',        
    ];

    protected $validationAttributes = [
        'gw_image' => 'image',
    ];

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.giveaways-edit');
    }

    public function save()
    {
        // Livewire making a mess, "sometimes" condition not working
        if(trim($this->name) == null)
            $this->name = '';

        if(trim($this->description) == null)
            $this->description = '';

        if(trim($this->link) == null)
            $this->link = '';    
        
        if(trim($this->gw_image) == null)
            $this->gw_image = '';    

        $rules = $this->rules;

        if($this->mode == 'edit')
        {
            $rules['gw_image'] = 'sometimes|image|dimensions:width=600,height=600|max:500';
        }

        $this->validate($rules);

        $data = [   'ev_id' => $this->exhibitor_data->id, 
                    'name' => $this->name,
                    'description' => $this->description
                ];             

        if(trim($this->link != null))
        {
            $data['link'] = $this->link;
        }

        if($this->giveaway_id)
        {
            $giveaway = EvGiveaway::find($this->giveaway_id);
            $giveaway->update($data);   
        }
        else
        {
            $giveaway = EvGiveaway::create($data);
        }

        if($this->gw_image)
        {
            if($giveaway->gw_image != '')
            {
                $file_path = 'up_data/'.$giveaway->gw_image;
                if(file_exists($file_path))
                    unlink($file_path);
            }

            $giveaway->update([
                'image1' => $this->gw_image->store('events/giveaways', 'ds3')
            ]);
        }

        $this->reset_fields();

        if($this->mode == 'add')
            $message = 'Giveaway added!';
        else 
            $message = 'Giveaway updated!';
        
        $this->notify($message);
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('giveawaysUpdated');
    }

    public function add_giveaway()
    {
        $this->reset_fields();

        $this->dispatchBrowserEvent('edit_giveaway_click');

        $this->mode = 'add';

        $this->render();
    }

    public function edit_giveaway($id)
    {
        $this->reset_fields();

        $giveway = EvGiveaway::find($id);

        $this->giveaway_id  = $giveway->id;
        $this->gw_image_e   = $giveway->image1; 
        $this->name         = $giveway->name;
        $this->description  = $giveway->description;
        $this->link         = $giveway->link;

        $this->dispatchBrowserEvent('edit_giveaway_click');

        $this->mode = 'edit';

        $this->render();
    }

    public function reset_fields()
    {
        $this->giveaway_id = $this->name = $this->description = $this->link = $this->gw_image = $this->gw_image_e = null;
    }
}
