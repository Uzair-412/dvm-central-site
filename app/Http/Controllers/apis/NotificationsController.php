<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\MyNotification;
use App\Models\NotificationDeviceToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationsController extends Controller
{
    public function create(Request $request)
    {
        try {
            $device_tokens = NotificationDeviceToken::where('user_id', $request->user_id)->pluck('token')->toArray();
            $notification = new MyNotification();
            $result = $this->sendNotification($device_tokens, $request->subject, $request->message);
            $flag = 1;
            $notification->title = $request->subject;
            $notification->body = $request->message;
            $notification->response = $result;
            $notification->flag = $flag;
            $notification->user_id = $request->user_id;
            $notification->save();

            return response()->json(['message'=>'notification send successfully']);
        } catch (\Exception $e) {
             return [ 'error' => $e->getMessage(), 'line'=>$e->getLine(), 'file'=>$e->getFile()];
        }
    }
}
