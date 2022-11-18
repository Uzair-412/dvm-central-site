<?php

namespace App\Http\Livewire;

use App\Models\Events;
use App\Models\EventAttendee;
use Livewire\Component;

class EventsRow extends Component
{

    public $e;
    
    public function render()
    {
        return view('livewire.events-row');
    }

    public function participate($e_id, $attendee_id)
    {
        EventAttendee::create([
            'event_id' => $e_id,
            'attendee_id' => $attendee_id
        ]);

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"You are now participating for the event, click access portal to start populating your details."
        ]);
    }

}
