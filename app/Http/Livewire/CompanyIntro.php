<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventVendors;

class CompanyIntro extends Component
{
    public $exhibitor_data;
    public $company_intro;

    public function mount()
    {
        $this->company_intro = EventVendors::getExhibitorIntroById($this->exhibitor_data->id);
    }
    
    public function render()
    {
        return view('livewire.company-intro');
    }

    public function save()
    {
        EventVendors::where('id', $this->exhibitor_data->id)->update(['company_intro' => $this->company_intro]);

        $this->notify('Company information updated!');
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('introUpdated');
    }
}
