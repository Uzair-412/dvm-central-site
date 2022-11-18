<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\EventsController;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatBoxController extends Controller
{
    public function index()
    {
        try{
            $data['active_vendors'] = Chat::whereHas('chatmessages', function($wq){
                $wq->whereHas('vendor', function($subwq){
                    $subwq->whereHas('vendor_user');
                });
            })->with(['chatmessages' => function($q){
                $q->with(['vendor' => function ($subq) {
                    $subq->with('vendor_user');
                }]);
            }])->where('user_ids', 'like', '%'. request()->customer_id.'%')->get();
            // $data['active_vendors'] = ChatMessage::whereHas('vendor')->with(['vendor' => function($q){
            //     $q->with('user');
            // }])->where('user_id', request()->customer_id)->orderBy('created_at', 'DESC')->groupBy('resp_user_id')->get();
        } catch (\Throwable $th) {
            return response()->json(
                ['error' =>$th->getMessage(),],201);
        }    
        return response()->json($data, 200);
    }

    public function user_chat($user_id)
    {
       
        $chat_id = $this->getChatId($user_id, request()->customer_id);

        $data['user_chat'] = ChatMessage::where([['chat_id', $chat_id],['user_id', request()->customer_id],['resp_user_id', $user_id]])->orderBy('id', 'DESC')->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $chat_id = $this->getChatId($request->user_id, $request->customer_id);
        $newChat = new ChatMessage();
        $newChat->chat_id = $chat_id;
        $newChat->user_id = $request->customer_id;
        $newChat->resp_user_id = $request->user_id;
        $newChat->message = $request->message;
        $newChat->message_type = 'Customer';
        $newChat->save();

        $chat = Chat::find($chat_id);
        $chat->last_message = $request->message;
        $chat->sender_id = $request->customer_id;
        $chat->save();
        return response()->json($newChat, 200);
    }

    public function getChatId($vendor_user_id, $loggedIn_user_id)
    {
        $resp = EventsController::chat_setup(
            [
                'resp_user_id' => $vendor_user_id,
                'ses_user_id' => $loggedIn_user_id,
                'start_chat' => true
            ]
        );

        return $resp['chat_id'];
    }
}
