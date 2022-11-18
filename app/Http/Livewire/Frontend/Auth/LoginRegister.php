<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;

class LoginRegister extends Component
{
    public $openRegister, $openLogin, $openReset, $remember;

    public function mount()
    {
        $this->openRegister = false;
        $this->openLogin = false;
        $this->openReset = true;
        $this->remember = 0;
    }

    public function render()
    {
        return view('livewire.frontend.auth.login-register');
    }

    public function checkRemember()
    {
        if($this->remember==0)
        {
            $this->remember = 1;
        }
        else
        {
            $this->remember = 0;
        }
    }
}
