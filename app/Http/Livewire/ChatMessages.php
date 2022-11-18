<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Vendor;
use Auth;
use Livewire\Component;

class ChatMessages extends Component
{
    public $chat_type, $channel, $messages, $vendor_id;
    protected $listeners = ['popupMessageSent' => 'mount'];

    public function mount()
    {
        $this->messages = Chat::getMessages($this->channel);
        // $this->messages = ChatMessage::where([
        //     ['user_id', Auth::user()->id],
        //     ['resp_user_id', $this->vendor_id]
        // ])->get();
        $this->dispatchBrowserEvent('scroll-chat-to-end');
    }

    public function render()
    {
        $view = 'livewire.chat-messages';
        if($this->chat_type == 'site')
            $view = $view . '-bs';
        return view($view);
    }

}
