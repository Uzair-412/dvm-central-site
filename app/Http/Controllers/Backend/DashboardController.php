<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {     
        $session_key =Session::get('user_name');
        if($session_key == 'admin'){
            Auth::logout();
            return redirect('/login');
        }
        return view('backend.dashboard');
    }
}
