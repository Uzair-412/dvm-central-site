<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;
use App\Models\ChatMessage;

class EventMessagesChat extends Component
{
    public $chat, $channel, $messages, $sender, $message; 
    protected $queryString = ['channel'];
    protected $listeners = ['switchChat' => 'switchChat', 'messageCentre' => 'mount'];    

    public function mount()
    {
        $this->chat = Chat::where('channel', $this->channel)->first();
        if($this->chat)
        {
            $this->sender = Chat::getChatSender($this->chat->user_ids);
            $this->messages = Chat::getMessages($this->channel);
            $this->dispatchBrowserEvent('scroll-chat-to-end');    
        }        
    }

    public function render()
    {
        return view('livewire.event-messages-chat');
    }

    public function switchChat($channel)
    {
        $this->channel = $channel;
        $this->mount();        
    }

    public function send()
    {
        if(trim($this->message) != null)
        {
            $chat_id = $this->chat->id;
            
            $data = ['chat_id' => $chat_id, 'user_id' => session()->get('ses_user_id'), 'resp_user_id' => $this->sender->id, 'message' => $this->message];
            
            $message = ChatMessage::create($data);

            $chat_data = ['last_message' => $this->message, 'sender_id' => session()->get('ses_user_id')];
            Chat::find($chat_id)->update($chat_data);

            $this->emit('eventMessageSent');

            //event(new MessageSentEvent($this->message, $this->chat_channel));
            $this->dispatchBrowserEvent('scroll-chat-to-end');

            $this->mount();

            $this->message = '';
            //broadcast(new MessageSentEvent($message, $this->chat_channel))->toOthers();
        }
    }
}
