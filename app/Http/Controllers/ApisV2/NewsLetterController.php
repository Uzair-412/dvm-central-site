<?php

namespace App\Http\Controllers\ApisV2;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
use App\Models\Customer;



class NewsLetterController extends Controller
{
    public function signUpSubscription(Request $request)
    {
        // die("dass");
        $data['email'] = $request->input('email');
        $data['name'] = "";
        $check = Subscribe::where('email', $data['email'])->first();
        if(!$check)
        {
            Subscribe::create($data);
            Customer::sendSubscriptionWithCoupon($data);
            return response()->json(['success' => 'Signed Up Successfully'], 200);
        }
        else
        {
            return response()->json(['success' => 'User Already Signed Up'], 200);
        }
    }
}