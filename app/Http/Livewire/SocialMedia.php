<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EvSocial;
use App\Models\EventVendors;
use App\Models\SocialNetwork;

class SocialMedia extends Component
{
    public $all_socials, $ex_socials, $exhibitor_data, $input_social_network, $ev_id;

    public function mount()
    {
        $this->all_socials = SocialNetwork::all();
        $this->ev_id = $this->exhibitor_data->id;
        $ex_socials = EventVendors::getExhibitorSocialsById($this->ev_id);
        $ex_socials_array = [];
        foreach($ex_socials as $es)
        {
            $ex_socials_array[$es->id] = $es->pivot->link;
        }

        $this->input_social_network = $ex_socials_array;
    }

    public function render()
    {
        return view('livewire.social-media');
    }

    public function save()
    {
        EvSocial::where('ev_id', $this->exhibitor_data->id)->delete();

        foreach($this->input_social_network as $sm_id => $link)
        {
            if(trim($link) != null)
            {
                $data = ['ev_id' => $this->ev_id, 'sm_id' => $sm_id, 'link' => $link];
                EvSocial::create($data);
            }
        }

        $this->notify('Social links updated!');
        $this->dispatchBrowserEvent('close_sidebar');
        $this->emit('socialsUpdated');
    }
}
