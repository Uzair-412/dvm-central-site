<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\DisableTwoFactorAuthenticationRequest;

/**
 * Class DisableTwoFactorAuthenticationController.
 */
class DisableTwoFactorAuthenticationController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $data['breadcrumb']     = true; 
        $data['breadcrumbs'][]  = '2FA Disable';

        return view('frontend.user.account.tabs.two-factor-authentication.disable')->with('data', $data);
    }

    /**
     * @param  DisableTwoFactorAuthenticationRequest  $request
     *
     * @return mixed
     */
    public function destroy(DisableTwoFactorAuthenticationRequest $request)
    {
        $request->user()->disableTwoFactorAuth();

        return redirect()->route('frontend.user.account', ['#two-factor-authentication'])->withFlashSuccess(__('Two Factor Authentication Successfully Disabled'));
    }
}
