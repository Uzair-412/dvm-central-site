<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Resource extends Component
{   
    public $data;
    public function render()
    {
        return view('livewire.resource');
    }
}
