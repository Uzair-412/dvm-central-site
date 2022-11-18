<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventBlock extends Component
{
    public $event;
    public function render()
    {
        return view('livewire.event-block');
    }
}
