<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;

class NotificationDetails extends Component
{   
    public $details;
    public function render()
    {      
        $this->details->seen=1;
        $this->details->save();
        return view('livewire.frontend.dashboard.notification-details');
    }
}
