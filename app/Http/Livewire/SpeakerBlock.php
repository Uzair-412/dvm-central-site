<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SpeakerBlock extends Component
{
    public $speaker, $event, $type;
    public function render()
    {
        return view('livewire.speaker-block');
    }
}
