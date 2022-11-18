<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Vendor;
use Livewire\Component;
use App\Models\ChatMessage;
use App\Events\Frontend\MessageSentEvent;
use App\Http\Controllers\Frontend\EventsController;

class ChatBox extends Component
{
    public $chat_type, $product, $event, $chat_data, $avatar, $vendor_id;
    public $recipient_name, $sender_name, $message;
    public $vendor_user_id;

    public function mount()
    {
        if($this->chat_type == 'site')
        {
            if(!auth()->user()) return;
            
            $vendor = Vendor::find($this->vendor_id);
            $this->vendor_user_id = $vendor->user;
            $users = [auth()->user()->id, $this->vendor_user_id];
            $sender = Chat::getChatSender($users);
            $this->recipient_name = $vendor->name;
            if(!isset($this->chat_data['chat_channel']))
                $this->chat_data['chat_channel'] = null;
        }
        else 
        {
            $sender = Chat::getChatSender($this->chat_data['chat_user_ids']);
            if($this->chat_data['chat_resp'])
            {
                $name = $this->chat_data['chat_resp']->name;
                if(trim($name) == null)
                    $name = $this->chat_data['chat_resp']->first_name . ' ' . $this->chat_data['chat_resp']->last_name;
                
                $this->recipient_name = $name;
            }
        }

        if($sender)
        {
            $this->avatar = $sender->avatar;
        }
    }

    public function send()
    {
        if(trim($this->message) != null)
        {
            if(isset($this->chat_data['chat_id']))
            {
                $chat_id = $this->chat_data['chat_id'];
            }
            else
            {
                if($this->chat_type == 'site')
                {
                    $this->chat_data['chat_resp_user_id'] = $resp_user_id = $this->vendor_user_id;
                    $this->chat_data['chat_sender_user_id'] = $ses_user_id = auth()->user()->id;
                }
                else 
                {
                    $resp_user_id = $this->chat_data['chat_resp_user_id'];
                    $ses_user_id = $this->chat_data['chat_sender_user_id'];
                }

                $resp = EventsController::chat_setup(
                    [
                        'resp_user_id' => $resp_user_id,
                        'ses_user_id' => $ses_user_id,
                        'start_chat' => true
                    ]
                );

                $chat_id = $resp['chat_id'];
            }

            $data = ['chat_id' => $chat_id, 'user_id' => $this->chat_data['chat_sender_user_id'], 'resp_user_id' => $this->chat_data['chat_resp_user_id'], 'message' => $this->message];

            $message = ChatMessage::create($data);

            $chat_data = ['last_message' => $this->message, 'sender_id' => $this->chat_data['chat_sender_user_id']];
            Chat::find($chat_id)->update($chat_data);

            $this->emit('popupMessageSent');

            //event(new MessageSentEvent($this->message, $this->chat_channel));

            $this->message = '';
            //broadcast(new MessageSentEvent($message, $this->chat_channel))->toOthers();
        }
    }

    public function render()
    {
        $view = 'livewire.chat-box';

        if($this->chat_type == 'site')
            $view = $view .= '-bs';
        
        return view($view);
    }
}
