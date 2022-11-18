<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyLogos extends Component
{
    use WithFileUploads;
    
    public $exhibitor_data, $logo_upload, $cover_upload;

    protected $rules = [
        'exhibitor_data.display_name' => 'required|min:6|max:64',
        'logo_upload' => 'nullable|image|max:1000',
        'cover_upload' => 'nullable|image|max:2000',
        //'logo_upload' => 'nullable|image|max:1000|dimensions:width=500,height=500',
        //'cover_upload' => 'nullable|image|max:2000|dimensions:width=1200,height=600',
        //'exhibitor_data.image_background' => 'required',
    ];

    public function render()
    {
        return view('livewire.company-logos');
    }

    public function save()
    {
        $this->validate();
        
        $this->exhibitor_data->save();

        $this->logo_upload && $this->exhibitor_data->update([
            'image_logo' => $this->logo_upload->store('events/logos', 'ds3')
        ]);
        $this->cover_upload && $this->exhibitor_data->update([
            'image_cover' => $this->cover_upload->store('events/covers', 'ds3')
        ]);

        $this->notify('Name and logo updated!');
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('logosUpdated');
    }
}
