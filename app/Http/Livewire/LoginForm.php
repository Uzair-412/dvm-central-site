<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use Livewire\Component;
use App\Models\Auth\User;
use Illuminate\Support\Str;
use App\Models\EventVendors;
use App\Models\Attendee;

class LoginForm extends Component
{
    public $show_login_dialog = false;
    public $email, $access_code, $event_id, $login_type;
    public $event;
    
    public function mount()
    {
        if(request()->input('show') == 'login')
        {
            $this->show_login_dialog = true;
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }

    private function reset_form()
    {
        $this->email = '';
        $this->access_code = '';
        $this->login_type = '';
    }

    public function login()
    {
        $validate = $this->validate([
            'email' => 'required|email',
            'access_code' => 'required',
            'login_type' => 'required',
        ]);

        if($this->login_type == 'exhibitor')
        {
            $user = User::where('email', $this->email)->first();
            if($user)
            {
                session()->put('ses_user_id', $user->id);
                session()->put('ses_user_type', 'exhibitor');
                $vendor = Vendor::where('user', $user->id)->first();
                if($vendor)
                {
                    $event_vendor = EventVendors::validate($this->event->id, $vendor->id, $this->access_code);
                    if($event_vendor)
                    {
                        session()->flash('message', 'You have successfully logged in.');
                        $this->reset_form();
                        $redirect_to = EventVendors::getLink($event_vendor, $this->event, 'edit');
                        return redirect()->to($redirect_to);
                    }
                }
            }
        }
        else
        {
            $user = User::where('email', $this->email)->first();
            if($user)
            {
                session()->put('ses_user_id', $user->id);
                session()->put('ses_user_type', 'attendee');
                $attendee = Attendee::validate($user->id, $this->access_code);
                if($attendee)
                {
                    session()->flash('message', 'You have successfully logged in.');
                    $this->reset_form();
                    return redirect(request()->header('Referer'));
                }
            }
        }

        session()->flash('error', 'The e-mail or the access code are invalid.');
    }

}
