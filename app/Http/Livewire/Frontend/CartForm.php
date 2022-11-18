<?php

namespace App\Http\Livewire\Frontend;

use App\Models\State;
use Livewire\Component;

class CartForm extends Component
{
    public $countries, $country, $states=[];
    public function render()
    {
        return view('livewire.frontend.cart-form');
    }

    public function updatedCountry($value)
    {
        $states = State::where('country_id', $value)->orderBy('name','asc')->pluck('name', 'iso2');
        $this->states = $states;
    }
}
