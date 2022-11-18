<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use App\Models\MobileUserSettings;
use Illuminate\Http\Request;

class MobileUserSettingsController extends Controller
{
    public function index(Request $request)
    {
        $id = request()->customer_id;
        // Fetch mobile user settings against the customer id
        $mobile_user_settings = MobileUserSettings::where('customer_id',$id)->first();
        // $created_at = date('Y-m-d H:i:s',strtotime($mobile_user_settings['created_at'])); 
        // $updated_at = date('Y-m-d H:i:s',strtotime($mobile_user_settings['updated_at']));         
        // $mobile_user_settings['created_at'] = $created_at;
        // $mobile_user_settings['updated_at'] = $updated_at;

        // If user doesn't have mobile user settings 
        if(empty($mobile_user_settings)){
            $new_mobile_user_settings = new MobileUserSettings();
            $new_mobile_user_settings->customer_id = $id;
            $new_mobile_user_settings->push_notifications = true;
            $new_mobile_user_settings->order_updates = true;
            $new_mobile_user_settings->listing_updates = false;
            $new_mobile_user_settings->newsletter = true;
            $new_mobile_user_settings->personalized_content = false;
            $new_mobile_user_settings->privacy_activities = true;
            $new_mobile_user_settings->hide_my_likes = false;
            $new_mobile_user_settings->invisible_to_contacts = true;
            $new_mobile_user_settings->created_at = date('Y-m-d');
            $new_mobile_user_settings->updated_at = date('Y-m-d');                        
            $new_mobile_user_settings->save();
            $data['settings'] = $new_mobile_user_settings;
        } else {
            $mobile_user_settings->push_notifications = ($mobile_user_settings->push_notifications==0)?false:true; 
            $mobile_user_settings->order_updates = ($mobile_user_settings->order_updates==0)?false:true; 
            $mobile_user_settings->listing_updates = ($mobile_user_settings->listing_updates==0)?false:true; 
            $mobile_user_settings->newsletter = ($mobile_user_settings->newsletter==0)?false:true; 
            $mobile_user_settings->personalized_content = ($mobile_user_settings->personalized_content==0)?false:true; 
            $mobile_user_settings->privacy_activities = ($mobile_user_settings->privacy_activities==0)?false:true; 
            $mobile_user_settings->hide_my_likes = ($mobile_user_settings->hide_my_likes==0)?false:true; 
            $mobile_user_settings->invisible_to_contacts = ($mobile_user_settings->invisible_to_contacts==0)?false:true; 
            $data['settings'] = $mobile_user_settings;   
        }
        return response()->json($data, 200);
    }

    public function update_settings(Request $request)
    {
        $id = $request->input('customer_id');
        $setting = $request->input('setting');
        $status = $request->input('status')=='false'?0:1;

        $update_setting = MobileUserSettings::whereCustomerId($id)->update([$setting=>$status]);
        if($update_setting){
            $data['status'] = "success";
            $data['message'] = "Setting update successfully!";
        } else {
            $data['status'] = "fail";
            $data['message'] = "Setting was not updated!";
        }
        $mobile_settings = MobileUserSettings::where('customer_id',$id)->first();
        $mobile_settings->push_notifications = ($mobile_settings->push_notifications==0)?false:true; 
        $mobile_settings->order_updates = ($mobile_settings->order_updates==0)?false:true; 
        $mobile_settings->listing_updates = ($mobile_settings->listing_updates==0)?false:true; 
        $mobile_settings->newsletter = ($mobile_settings->newsletter==0)?false:true; 
        $mobile_settings->personalized_content = ($mobile_settings->personalized_content==0)?false:true; 
        $mobile_settings->privacy_activities = ($mobile_settings->privacy_activities==0)?false:true; 
        $mobile_settings->hide_my_likes = ($mobile_settings->hide_my_likes==0)?false:true; 
        $mobile_settings->invisible_to_contacts = ($mobile_settings->invisible_to_contacts==0)?false:true;         
        $created_at = date('Y-m-d H:i:s',strtotime($mobile_settings['created_at'])); 
        $updated_at = date('Y-m-d H:i:s',strtotime($mobile_settings['updated_at']));         
        $mobile_settings['created_at'] = $created_at;
        $mobile_settings['updated_at'] = $updated_at;
        $data['settings'] = $mobile_settings;
        return response()->json($data, 200);
    }

}
