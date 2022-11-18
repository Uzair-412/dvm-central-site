<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NotificationDeviceToken;
use App\Models\PushNotification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading'] = 'Notifications';
        return view('backend.notifications.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Notifications';
        return view('backend.notifications.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flag = 0;
        $message = 'Notification scheduled successfully!';
        $date = null;
        $result = null;
        if($request->delivery_type == 'Immediately')
        {
            if($request->platform == 'One-Device')
            {
                $tokens = NotificationDeviceToken::where('type', $request->device)->pluck('token');
            }
            else
            {
                $tokens = NotificationDeviceToken::pluck('token');
            }
            $tokens = $tokens->toArray();
            $result = $this->sendNotification($tokens, $request->title, $request->body);
            $flag = 1;
            $message = 'Notification send successfully!';
        }
        else
        {
            $date = $request->date . ' ' . $request->time;
            $date = strtotime($date);
        }
        $push_notification = new PushNotification();
        $push_notification->title = $request->title;
        $push_notification->body = $request->body;
        $push_notification->platform = $request->platform;
        $push_notification->device = $request->device;
        $push_notification->delivery_type = $request->delivery_type;
        $push_notification->date = $date;
        $push_notification->response = $result;
        $push_notification->flag = $flag;
        $push_notification->created_at = date('Y-m-d H:i:s');
        $push_notification->save();
        
        return redirect()->route('admin.notifications.index')->with('flash_success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {    
        $push_notification = PushNotification::find($id);
        $push_notification->delete();
        return redirect()->route('admin.notifications.index')->with('flash_danger', 'Notification removed successfully.');
    }
}
