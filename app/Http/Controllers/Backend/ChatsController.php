<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function vendors_chat(){
        $data['p_heading'] = 'Chats';
        $data['p_description'] = 'Here is the list of Chats';

        // $data['posts'] = AnimalPet::paginate(10);

        return view('backend.vendors-chat', compact('data'));
    }
}
