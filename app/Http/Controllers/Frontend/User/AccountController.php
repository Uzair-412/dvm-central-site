<?php

namespace App\Http\Controllers\Frontend\User;

/**
 * Class AccountController.
 */
class AccountController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'My Profile';
        $data['breadcrumbs'][]  = 'Modify Profile';

        $data['page'] = 'profile';
        $view = 'profile';
        return view('frontend.user.account',compact('data', 'view'));
    }
}
