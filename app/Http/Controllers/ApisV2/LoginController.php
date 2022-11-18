<?php

namespace App\Http\Controllers\ApisV2;


use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\SocialId;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validation->fails())
            return response()->json(['success' => false, 'error' => $validation->messages()], 200);

        $user = User::where('email', $request->email)->select('id','first_name', 'last_name', 'password', 'name' , 'email' , 'email_verified_at' , 'type', 'level', 'avatar_type', 'avatar_location', 'device_token' , 'active')->first();
        if($user && Hash::check($request->password,$user->password))
        {
            if($user->email_verified_at == null)
            {
                return response()->json(['not_verified' => true , 'success' => false, 'is_verified' => false,'error' => 'Your email is not verified!'], 200);
            }
            
            if(@$request->device_token && $request->type)
            {
                $this->store_device_token(['device_token'=>$request->device_token, 'type'=>$request->type],$user->id);
            }
            $token = $user->createToken('VetandTechToken')->accessToken;
            return response()->json(['successfully_logged_label' => true,'success' => true, 'is_verified' => true, 'user' => $user, 'token' => $token], 200);
        }
        else
        {
            return response()->json(['incorrect_username_or_password_label' => true ,'success' => false,'error' => 'These credentials do not match our records.'], 402);
        }
    }

    public function socialLogin(Request $request)
    {
        $user = null;
        if($request->email)
        {
            $user = User::where('email', '=', $request->email)->select('id','first_name', 'last_name', 'password', 'name' , 'email' , 'email_verified_at' , 'type', 'level', 'avatar_type', 'avatar_location', 'device_token' , 'active')->first();
        }
        if($request->id && !$user)
        {
            $user = User::whereHas('socialId', function($q) use($request){
                $q->where('profile_id', $request->id);
            })->first();
        }

        if ($user) {
            // return the token for usage
            $user['token'] = $user->createToken('VetandTechToken')->accessToken;
            if($user->socialId->where('profile_id', $request->id)->count() == 0)
            {
                $social_id = new SocialId();
                $social_id->profile_id = $request->id;
                $social_id->type = $request->account_type;
                $social_id->user_id = $user->id;
                $social_id->created_at = date('Y-m-d H:i:s');
                $social_id->save();
            }
            
            if(@$request->device_token && $request->type)
            {
                $this->store_device_token(['device_token'=>$request->device_token, 'type'=>$request->type],$user->id);
            }
            return response()->json(['success' => true, 'user' => $user]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email ? $request->email : $request->id;
            $user->password = '';
            $user->save();

            $social_id = new SocialId();
            $social_id->profile_id = $request->id;
            $social_id->type = $request->account_type;
            $social_id->user_id = $user->id;
            $social_id->created_at = date('Y-m-d H:i:s');
            $social_id->save();
            
            $user['token'] = $user->createToken(env('VetandTechToken'))->accessToken;
            if(@$request->device_token && $request->type)
            {
                $this->store_device_token(['device_token'=>$request->device_token, 'type'=>$request->type],$user->id);
            }
            return response()->json(['success' => true, 'user' => $user]);
        }
    }

    public function savePassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'password_confirmation' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->messages()], 200);
        } else {
            $user = Customer::find($request->input('customer_id'));

            if ($request->input('password') == $request->input('password_confirmation')) {
                $user->password = Hash::make($request->input('password'));
                $user->password_changed_at = date("Y-m-d H:i:s",time());
                $user->save();
                return response()->json(['message' => __('Password saved successfully')], 200);
            } else {
                return response()->json(['error' => __('New password and confirm new password must be matched!')], 200);
            }
        }
    }
}
