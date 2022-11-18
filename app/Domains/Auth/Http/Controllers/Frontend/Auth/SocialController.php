<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Events\User\UserLoggedIn;
use App\Domains\Auth\Services\UserService;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class SocialController.
 */
class SocialController
{
    /**
     * @param $provider
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @param  UserService  $userService
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\GeneralException
     */
    public function callback($provider, UserService $userService)
    {
        if(@request()->input('error_description'))
        {
            session()->flash('flash_danger', request()->input('error_description'));
            return redirect('login');
        }
        // $socialite = Socialite::driver($provider)->user();
        $socialite = Socialite::driver($provider)->stateless()->user();

        $user = $userService->registerProvider($socialite, $provider);
        if (! $user->isActive()) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')->withFlashDanger(__('Your account has been deactivated.'));
        }

        auth()->login($user);

        event(new UserLoggedIn($user));

        return redirect()->route(homeRoute());
    }
}
