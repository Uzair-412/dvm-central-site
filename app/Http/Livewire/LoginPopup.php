<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Auth\User;
use Illuminate\Support\Str;


class LoginPopup extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.login-popup');
    }

    private function reset_form()
    {
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password)))
        { 
            session()->flash('message', 'Login success, please wait...'); 
            $this->dispatchBrowserEvent('refresh-window');
        }
        else
        { 
            session()->flash('error', 'Invalid e-mail or password, please try again.');
        }

        
    }

}
