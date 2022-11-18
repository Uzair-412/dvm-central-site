<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\UpdatePasswordRequest;
use App\Domains\Auth\Services\UserService;

/**
 * Class UpdatePasswordController.
 */
class UpdatePasswordController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param  UpdatePasswordRequest  $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdatePasswordRequest $request)
    {
        $isPasswordDate = false;
        if(auth()->user()->password == null || auth()->user()->password == '')
        {
            $isPasswordDate = true;
        }
        $this->userService->updatePassword($request->user(), $request->validated(), $isPasswordDate);

        return redirect("/dashboard/profile?section=password")->with('flash_success',__('Password successfully updated.'));
    }
}
