<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AttendeeBlock extends Component
{
    public $attendee, $event;
    public function render()
    {
        return view('livewire.attendee-block');
    }
}
