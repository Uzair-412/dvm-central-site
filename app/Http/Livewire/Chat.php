<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ChatMessages extends Component
{
    public $chat_channel, $chat_user_id, $messages;

    public function mount()
    {
        $this->messages = Chat::getMessages($this->chat_channel);
    }

    public function render()
    {
        // $data['exhibitor'] = session()->get('ses_exhibitor');
        // $data['messages'] = ChatMessage::
        //     latest()
        //     ->take(10)
        //     ->get()
        //     ->sortBy('id');

        return view('livewire.chat-messages');
    }

}
