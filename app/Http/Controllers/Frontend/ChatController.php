<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function send(Request $request)
    {

        $channel = md5($request->exhibitor_id ."-". $request->user_id);
        $data['channel'] = Chat::create([
            'channel' => $channel,
            'status' => 1,
        ]); 

        

        if($data)
        {
            return response()->json([
                'status'=>200,
                'message' => "success",
                'data' => $data,
            ]);
        }
    }
}
