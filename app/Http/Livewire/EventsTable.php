<?php

namespace App\Http\Livewire;

use App\Models\Events;
use Livewire\Component;
use Livewire\WithPagination;

class EventsTable extends Component
{
    use WithPagination;
 
    public $events, $search;

    public function mount()
    {
        $this->events = $this->get_events();
    }

    public function render()
    {
        return view('livewire.events-table');
    }

    public function updated()
    {
        $this->mount();
    }

    public function get_events()
    {
        if(trim($this->search) == null)
            $this->search = null;

            $query = Events::query()
            ->when($this->search, fn($query) => $query->where('name', 'like', '%'.$this->search.'%'))
            ->where('id', '!=', '')->where('status', 'Y')->orderBy('created_at','DESC');

        return $query->get();
    }


}
