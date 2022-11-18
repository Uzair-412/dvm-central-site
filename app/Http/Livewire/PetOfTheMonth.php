<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pet;
use App\Models\State;
class PetOfTheMonth extends Component
{   
    public $data; 

    public function render()
    {
        return view('livewire.pet-of-the-month');
    }
}
