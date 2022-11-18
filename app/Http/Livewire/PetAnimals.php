<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnimalPet;
class PetAnimals extends Component
{
    public $data, $animal;

    public function mount()
    {
        if($this->data['pet_slug']!='')
        {
            $animal = AnimalPet::where('slug',$this->data['pet_slug'])->first();
        }
        else
        {
            $animal = AnimalPet::first();
        }
        $this->pet_details($animal->id);
    }
    
    public function render()
    {
        return view('livewire.pet-animals');
    }

    public function pet_details($id)
    {
        $this->animal = AnimalPet::where('id', $id)->first();
    }
}
