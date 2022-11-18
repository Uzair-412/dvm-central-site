<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class EventMessagesList extends Component
{
    public $chats, $channel;
    protected $queryString = ['channel'];
    //protected $queryString = ['chat'];

    protected $listeners = ['eventMessageSent' => 'mount', 'messageCentre' => 'mount'];

    public function mount()
    {
        $this->chats = Chat::getChats(session()->get('ses_user_id'));        
    }

    public function render()
    {
        return view('livewire.event-messages-list');
    }
}
