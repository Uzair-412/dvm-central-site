<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EvGiveaway;

class GiveawaysList extends Component
{
    public $exhibitor_data, $edit_mode, $giveaways, $counter;
    public $max_giveaways = 2;
    public $total_giveaways = 0;
    
    protected $listeners = ['giveawaysUpdated' => 'mount'];

    public function mount()
    {
        $this->giveaways = EvGiveaway::where('ev_id', $this->exhibitor_data->id)->get();
        $this->total_giveaways = count($this->giveaways);
        $this->counter = '('. $this->total_giveaways .' / '. $this->max_giveaways .')';
    }

    public function destroy($giveaway_id)
    {
        $giveaway = EvGiveaway::find($giveaway_id);
        if($giveaway->image1 != '')
        {
            $file_path = 'up_data/'.$giveaway->image1;
            if(file_exists($file_path))
                unlink($file_path);
        }

        $giveaway->delete();
        $this->notify('Giveaway deleted!');
        $this->mount();
    }

    public function open_giveaway($id)
    {
        $giveaway = EvGiveaway::find($id);
        
        $this->dispatchBrowserEvent('open_giveaway_modal', $giveaway);
    }

    public function render()
    {
        return view('livewire.giveaways-list');
    }
}
