<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddressDetailsShow extends Component
{
    public $exhibitor_data;

    protected $listeners = ['addressUpdated' => 'mount'];

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.address-details-show');
    }
}
