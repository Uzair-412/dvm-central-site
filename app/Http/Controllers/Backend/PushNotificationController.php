<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CronjobPushNotification;
use App\Models\NotificationDeviceToken;
use App\Models\PushNotification;
use App\Models\PushNotificationByUser;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    public function index()
    {
        $data['p_heading'] = 'Push Notifications By Vendors';
        return view('backend.notifications.push_notifications.index', $data);
    }

    public function send_pending_notifications()
    {
        $time = time();
        $notifications = PushNotification::where([['date', '<=', $time],['flag', 0]])->get();
        foreach($notifications as $notification)
        {
            $tokens = NotificationDeviceToken::pluck('token');
            $tokens = $tokens->toArray();
            $resut = $this->sendNotification($tokens, $notification->title, $notification->body);
            $decoded_result = json_decode($resut);
            
            $flag = 0;
            if(@$decoded_result->success > 0)
            {
                $flag = 1;
            }
            else
            {
                $flag = 2;
            }
            $notification->response = $resut;
            $notification->flag = $flag;
            $notification->save();
        }
        return "Push notifications run successfully!";
    }

    public function send_push_notifications()
    {
        $cron_job_push_notifications = CronjobPushNotification::where('flag', 0)->get();

        foreach($cron_job_push_notifications as $cronjob)
        {
            foreach($cronjob->user_ids as $user)
            {
                $token_array = NotificationDeviceToken::with('user')->where('user_id', $user)->pluck('token')->toArray();
                $result = $this->sendNotification($token_array, $cronjob->title, $cronjob->body, $cronjob->clickable_link);
                $flag = 0;
                if($result!==false)
                {
                    $decoded_result = json_decode($result);
                    if($decoded_result->success!=0)
                    {
                        $flag = 1;
                    }
                }
                $push_notification = new PushNotificationByUser();
                $push_notification->user_id = $user;
                $push_notification->title = $cronjob->title;
                $push_notification->body = $cronjob->body;
                $push_notification->clickable_link = trim($cronjob->clickable_link) ? $cronjob->clickable_link : '';
                $push_notification->response = $result;
                $push_notification->flag = $flag;
                $push_notification->save();
            }
            $cronjob->flag = 1;
            $cronjob->save();
        }
        return "notifications send by vendors";
    }
}
