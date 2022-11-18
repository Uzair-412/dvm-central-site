<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExhibitorBlock extends Component
{
    public $exhibitor, $event;
    public function render()
    {
        return view('livewire.exhibitor-block');
    }
}
