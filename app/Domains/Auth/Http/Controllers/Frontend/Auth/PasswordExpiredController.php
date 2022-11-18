<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\UpdatePasswordRequest;
use App\Domains\Auth\Services\UserService;

use Illuminate\Support\Facades\Hash;
/**
 * Class PasswordExpiredController.
 */
class PasswordExpiredController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expired()
    {
        abort_unless(config('boilerplate.access.user.password_expires_days'), 404);

        return view('frontend.auth.passwords.expired');
    }

    /**
     * @param  UpdatePasswordRequest  $request
     * @param  UserService  $userService
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdatePasswordRequest $request, UserService $userService)
    {
        $checkPassword = Hash::check($request->current_password, auth()->user()->password);
        if(!$checkPassword)
        {
            return redirect()->back()->with('flash_danger','Current password is not correct');
        }

        abort_unless(config('boilerplate.access.user.password_expires_days'), 404);

        $userService->updatePassword($request->user(), $request->only('old_password', 'password'), true);

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('Password successfully updated.'));
    }

}
