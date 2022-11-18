<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $data['view'] = 'chat-box';
        return view('frontend.user.chatbox', $data);
    }
}
