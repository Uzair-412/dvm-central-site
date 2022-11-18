<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddressDetails extends Component
{
    public $exhibitor_data;

    protected $rules = [
        'exhibitor_data.mobile' => 'sometimes',
        'exhibitor_data.phone' => 'required',
        'exhibitor_data.email' => 'required|email',
        'exhibitor_data.website' => 'required|url',
        'exhibitor_data.address' => 'required',
        'exhibitor_data.street' => 'required',
        'exhibitor_data.city' => 'required',
        'exhibitor_data.state' => 'required',
        'exhibitor_data.zip' => 'required',
        'exhibitor_data.country' => 'required',
    ];

    public function render()
    {
        return view('livewire.address-details');
    }

    public function save()
    {
        $this->validate();
        $this->exhibitor_data->save();

        $this->notify('Address information updated!');
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('addressUpdated');
    }
}
