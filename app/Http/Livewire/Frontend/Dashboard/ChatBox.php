<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\ChatMessage;
use App\Models\Vendor;
use Auth;
use Livewire\Component;

class ChatBox extends Component
{
    public $activeUsers, $activeUserMessages=[], $chatUser, $chatInput, $searchInput, $chatId;
    protected $listeners = ['chatSubmit','loadChat'];

    public function mount()
    {
        $this->activeUsers = ChatMessage::whereHas('user')->where('user_id', Auth::user()->id)->groupBy('resp_user_id')->get();
    }

    public function activeUserChat($user_id)
    {
        $this->activeUserMessages = ChatMessage::where([['user_id', Auth::user()->id],['resp_user_id', $user_id]])->get();
        
        $this->chatUser = Vendor::where('user',$user_id)->first();
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.chat-box');
    }

    public function chatSubmit()
    {   
        if (trim($this->chatInput) != null) {
            $newChat = new ChatMessage();
            $newChat->user_id = Auth::user()->id;
            $newChat->resp_user_id = $this->chatUser->user; 
            $chat  = ChatMessage::where([['user_id',$newChat->user_id], ['resp_user_id', $newChat->resp_user_id]])->first();
            $this->chatId = $chat->chat_id;
            $newChat->message = $this->chatInput;
            $newChat->message_type = 'Customer';
            $newChat->chat_id = $this->chatId;
            $newChat->save();
            $this->activeUserChat($this->chatUser->user);
            $this->chatInput = '';
            
            $this->dispatchBrowserEvent('scroll-chat-to-end');
        }
    }

    public function updatedSearchInput($value)
    {
        $this->activeUsers = ChatMessage::whereHas("vendor", function($q) use($value){
            $q->where('name', 'like', '%'.$value.'%');
        })->where('user_id', Auth::user()->id)->groupBy('resp_user_id')->get();
    }

    public function loadChat()
    {
        if(@$this->chatUser)
        {
            $this->activeUserChat($this->chatUser->user);
            $this->dispatchBrowserEvent('scroll-chat-to-end');
        }
    }
}
