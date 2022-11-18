<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventVendors;

class SocialMediaList extends Component
{
    public $exhibitor_data, $socials;

    protected $listeners = ['socialsUpdated' => 'mount'];

    public function mount()
    {
        //$this->socials = $this->exhibitor_data->socials;//;EventsCategories::getExhibitorCategoriesById($this->exhibitor_data->id);
        $this->socials = EventVendors::getExhibitorSocialsById($this->exhibitor_data->id);
    }

    public function render()
    {
        return view('livewire.social-media-list');
    }
}
