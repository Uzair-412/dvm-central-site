<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Domains\Auth\Notifications\Frontend\VerifyEmail;

class VerificationController extends Controller
{
    public function resend(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if ($user->email === null) {
            return response()->json(['error' => 'email doesn\'t exist'], 204);
        }
        if ($user->email_verified_at == null) {
            $user->notify(new VerifyEmail);
            return response()->json(['success' => 'we have resent you verification email. Please check your email and verify!'], 200);
        }
    }
}
