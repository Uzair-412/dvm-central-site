<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventVendors;

class CompanyIntroShow extends Component
{
    public $exhibitor_data;
    public $company_intro;

    protected $listeners = ['introUpdated' => 'mount'];

    public function mount()
    {
        $this->company_intro = EventVendors::getExhibitorIntroById($this->exhibitor_data->id);
    }
    
    public function render()
    {
        return view('livewire.company-intro-show');
    }
}
