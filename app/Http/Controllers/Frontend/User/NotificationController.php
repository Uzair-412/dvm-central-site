<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\NotificationDeviceToken;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
        if(Auth::user())
        {
            $check_device_token = NotificationDeviceToken::where(['user_id' => Auth::user()->id, 'token' => $request->token])->first();
            if(empty($check_device_token))
            {
                $not_token = new NotificationDeviceToken();
                $not_token->token=$request->token;
                $not_token->type='Web';
                $not_token->user_id=Auth::user()->id;
                $not_token->created_at=date('Y-m-d H:i:s');
                $not_token->save();
                return response()->json('Token successfully stored.');
            }
            else
            {
                return response()->json('Token already stored.');
            }
        }
        return response()->json('User dosen\'t exist.');
    }


    public function sendNotificationFunc(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::where('id', Auth::user()->id)->whereNotNull('device_token')->pluck('device_token')->all();
        $serverKey = Config('app.fcm_api_server_key'); // ADD SERVER KEY HERE PROVIDED BY FCM
    
        // $title = $request->title;
        // $body = $request->body;

        $title = 'There is title';
        $body = 'Get a new discount in your purchased product!';
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json',
        ];
        // dd($headers, $data);
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        
        $result = curl_exec($ch);
        dd($result);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        
        curl_close($ch); // Close connection
        return response()->json($result); // FCM response
    }
}
