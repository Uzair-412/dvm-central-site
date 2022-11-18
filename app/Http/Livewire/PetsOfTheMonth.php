<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pet;
class PetsOfTheMonth extends Component
{
    public $data;

    public function render()    
    {
        return view('livewire.pets-of-the-month');
    }
}
