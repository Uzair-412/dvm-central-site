<?php

namespace App\Http\Livewire;

use App\Models\AnimalPet;
use Livewire\Component;
use App\Models\CommonDisease;

class PetDiseases extends Component
{
    public $data, $animal, $disease;

    public function mount()
    {
        $this->animal = AnimalPet::where('slug', $this->data['pet_slug'])->first();
        if($this->data['disease_slug']!='')
        {
            $this->disease = CommonDisease::where('slug', $this->data['disease_slug'])->first();
        }
    }
    
    public function render()
    {
        return view('livewire.pet-diseases');
    }

    public function pet_disease_details($id)
    {
        $this->disease = CommonDisease::where('id', $id)->first();
    }
}
