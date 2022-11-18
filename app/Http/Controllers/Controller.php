<?php

namespace App\Http\Controllers;

use App\Models\NotificationDeviceToken;
use Cart;
use Config;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function createDirectory($path)
    {
        $pathArray = explode('/', $path);
        $created_path = '';
        foreach($pathArray as $current_path)
        {
            if($current_path!='')
            {
                $created_path .= $current_path . '/';
                if(!is_dir($created_path))
                {
                    mkdir($created_path);
                }
            }
        }
        return $created_path;
    }

    public function store_device_token($data, $user_id)
    {
        $check_device_token = NotificationDeviceToken::where(['user_id' => $user_id, 'token' => $data['device_token']])->first();
        if(empty($check_device_token))
        {
            $not_token = new NotificationDeviceToken();
            $not_token->token=$data['device_token'];
            $not_token->type=$data['type'];
            $not_token->user_id=$user_id;
            $not_token->created_at=date('Y-m-d H:i:s');
            $not_token->save();
            return 'Token successfully stored.';
        }
        else
        {
            return 'Token already stored.';
        }
    }

    public function sendNotification($FcmTokens, $title, $body, $clickable_link='', $icon='/vetandtech-logo.png')
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = Config('app.fcm_api_server_key'); // ADD SERVER KEY HERE PROVIDED BY FCM
        $data = [
            "registration_ids" => $FcmTokens,
            "notification" => [
                "title" => $title,
                "body" => $body,
                'icon' => $icon,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        if(trim($clickable_link))
        {
            $data['notification']['click_action'] = $clickable_link;
        }
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json',
        ];
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

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        
        curl_close($ch); // Close connection
        return $result; // FCM response
    }
}
