<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Models\Follow;
use App\Models\Vendor;
use Mail;

class FollowController extends Controller
{   
    public function following_list(Request $request)
    {
        $vendors = Follow::with('vendor')->whereHas('vendor')->where('user_id', $request->customer_id)->get();
        return response()->json($vendors, 200);
    }

    public function follow_vendor(Request $request)
    {
        $vendor = Vendor::where('id', $request->vendor_id)->first();
        if ($request->follow == false)
        {
            $follow = Follow::where([['user_id', $request->customer_id],['vendor_id', $vendor->id]])->first();
            $follow->delete();
            $result = ['type'=>'Unfollow' , 'warning_message' => 'You are unfollowing '.$vendor->name];
        } 
        else
        {
            $vendor_user = User::find($vendor->user);
            $follow = new Follow();
            $follow->user_id = $request->customer_id;
            $follow->vendor_id = $vendor->id;
            $follow->created_at = date('Y-m-d H:i:s');
            $follow->save();
            $result = ['type' => 'Follow', 'success_message' => 'You are following '.$vendor->name];

            $followers = Follow::where('vendor_id', $vendor->id)->count();
            $user = User::find($request->customer_id);
            Mail::send('frontend.mail.follow', ['vendor' => $vendor, 'followers' => $followers], function ($message) use($vendor, $vendor_user, $user) {
                $message->to($vendor_user->email, $vendor->name)
                    ->subject($user->name.' follows '. $vendor->name)
                    ->from(config('mail.from.address'), appName())
                    ->replyTo('no-reply@dvmcentral.com', 'No-Reply');
            });
        }
        return response()->json($result,200);
    }
}

