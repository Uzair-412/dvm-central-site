<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use App\Models\WebinarRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebinarController extends Controller
{
    public function index()
    {
        $webinar = Webinar::where([
            ['show_in_app', 1],
            ['webinar_type', 'website'],
            ['status', 'Y']
        ])->get();
        return response()->json($webinar);
    }

    public function user_registered_webinars(Request $request)
    {
        $user_webinar_list = WebinarRegistration::with('webinar')->where(['user_id' => $request->user_id])->get();
        return response()->json($user_webinar_list);
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "webinar_id" => 'required',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required',
            'zip_code' => 'required',
            'role' => 'required|string',
            'speciality' => 'required|string',
            'user_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->messages()], 200);
        }

        $user_registration = WebinarRegistration::where([['user_id',$request->input('user_id')],['webinar_id',$request->input('webinar_id')]])->first();
        if(!empty($user_registration)){
            return response()->json(['message' => 'User already registered for the webinar']);
        }

        $webinar = Webinar::find($request->webinar_id);
        if(empty($webinar))
        {
            return response()->json(['error' => 'webinar dosen\'t exist']);
        }
        $webinar_registration = WebinarRegistration::create($request->all());
        return response()->json(['message' => 'You have registered for the webinar successfully!', 'webinar' => $webinar_registration]);
    }
}
