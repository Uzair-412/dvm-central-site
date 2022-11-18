<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventVendors;

class CompanyLogosShow extends Component
{
    public $exhibitor_data, $edit_mode;

    protected $listeners = ['logosUpdated' => 'mount'];
    
    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.company-logos-show');
    }
}
