<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\PushNotificationByUser;
use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $data['notifications']      =  PushNotificationByUser::where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
        return view('livewire.frontend.dashboard.notifications', $data);
    }
}
