<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\ChatMessage;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class Chats extends Component
{
    public
        $activeCustomerMessages = [],
        $chatCustomer,
        $VendorConversation,
        $vendor,
        $chatList = [],
        $messagesLimit = 14;
    protected $listeners = ['loadChat'];

    public function mount()
    {
        $this->vendors = Vendor::all();
    }

    public function updatedVendorConversation($id)
    {
        $chatList = ChatMessage::where('resp_user_id', $id)->groupBy('user_id')->get();
        $this->chatList = $chatList;
        $this->vendor = Vendor::where('user', $id)->first();
        $this->vendor = @$this->vendor->user;
    }

    public function activeUserChat($user_id, $vendor_id, $messagesLimit=14)
    {
        $query = ChatMessage::where([['resp_user_id', $vendor_id],['user_id', $user_id]])->limit($messagesLimit)->orderBy('created_at','DESC')->get();
        $this->activeCustomerMessages = $query->sortBy('id');
        $this->chatCustomer = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.backend.chats');
    }

    public function loadChat($type='normal')
    {
        if($type=='onscroll')
        {
            $this->messagesLimit += 14;
        }
        $this->activeUserChat($this->chatCustomer->id, $this->vendor, $this->messagesLimit);
    } 
    
}
