<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\Vendor;
use Auth;
use Illuminate\Http\Request;
use Mail;

class FollowController extends Controller
{
    public function follow_vendor(Request $request, $slug)
    {
        $vendor = Vendor::where('slug', $slug)->first();
        if(Auth::user())
        {
            $checkFollow = Follow::where([['user_id', Auth::user()->id],['vendor_id', $vendor->id]])->first();
            if($checkFollow)
            {
                $follow = Follow::where([['user_id', Auth::user()->id],['vendor_id', $vendor->id]])->first();
                $follow->delete();
                $result = ['warning_message' => 'You are unfollowing <span class="bg-red-100 px-1 text-red-500 text-white">'.$vendor->name.'</span>'];
            }
            else
            {
                $vendor_user = User::find($vendor->user);
                $follow = new Follow();
                $follow->user_id = Auth::user()->id;
                $follow->vendor_id = $vendor->id;
                $follow->created_at = date('Y-m-d H:i:s');
                $follow->save();
                $result = ['success_message' => 'You are following <span class="bg-green-100 px-1 text-green-500 text-white">'.$vendor->name.'</span>'];

                $followers = Follow::where('vendor_id', $vendor->id)->count();
                Mail::send('frontend.mail.follow', ['vendor' => $vendor, 'followers' => $followers], function ($message) use($vendor, $vendor_user) {
                    $message->to($vendor_user->email, $vendor->name)
                        ->subject(Auth::user()->name.' follows '. $vendor->name)
                        ->from(config('mail.from.address'), appName())
                        ->replyTo('no-reply@dvmcentral.com', 'No-Reply');
                });
            }
        }
        else
        {
            $result = ['error_message' => 'You must login before following a Vendor<span class="bg-red-100 px-1 text-red-500 text-white">'.$vendor->name.'</span>'];
        }
        return response()->json($result,200);
    }
}
