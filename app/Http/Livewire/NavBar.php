<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\LoginForm;

class NavBar extends Component
{
    public $event;
    
    public function render()
    {   
        
        return view('livewire.nav-bar');
    }

    public function logout($param){
        if(trim($param) == 'exhibitor'){
            session()->forget('ses_exhibitor');
            session()->flash('message', 'You have successfully logged logout.');
            return redirect(request()->header('Referer'));
        }elseif(trim($param) == 'attendee'){
            session()->forget('ses_attendee');
            session()->flash('message', 'You have successfully logged logout.');
            return redirect(request()->header('Referer'));
        }
    }
}
