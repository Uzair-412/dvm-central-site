<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\State;
use Livewire\Component;

class AddressForm extends Component
{
    public $address, $countries, $default_shipping='Y', $country, $states=[], $state;

    public function mount()
    {
        if($this->address!='')
        {
            $this->country = $this->address->country;
            $this->state = $this->address->state;
            $this->states = State::where('country_id', $this->address->country)->orderBy('name','asc')->pluck('name', 'iso2');
        }
    }
    public function render()
    {
        return view('livewire.frontend.dashboard.address-form');
    }

    public function updatedCountry($value)
    {
        $this->states = State::where('country_id', $value)->orderBy('name','asc')->pluck('name', 'iso2');
    }
}
