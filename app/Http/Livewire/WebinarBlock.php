<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebinarBlock extends Component
{
    public $webinar, $event;
    public function render()
    {
        return view('livewire.webinar-block');
    }
}
