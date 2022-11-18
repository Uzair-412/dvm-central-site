<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Events\User\UserLoggedIn;
use App\Models\Customer;
use App\Rules\Captcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;

/**
 * Class LoginController.
 */
class LoginController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */

    protected $redirectTo = 'dashboard';
    
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Login';
        $data['form-type']      = 'login';
        return view('frontend.auth.login-register', compact('data'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {   
        $this->validateLogin($request);
        
        $user = Customer::where('email', $request->email)->first();
 
        if (@$user->type == 'vendor') {
            return back()->with('flash_danger', 'These credentials do not match our records.');
        }
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if(isset($user->type)){
            if($user->type == 'admin') {    
                Session::put('user_name', 'super_admin');
            
            }else {
                Session::put('user_name', 'customer');
            }
        }

        if ($this->attemptLogin($request)) {

            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }
        
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {   
        if($request->redirectTo)
        {
            $this->redirectTo = $request->redirectTo;
        }
        $request->validate([
            $this->username() => ['required', 'max:255', 'string'],
            'password' => array_merge(['max:100'], PasswordRules::login()),
            'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Overidden for 2FA
     * https://github.com/DarkGhostHunter/Laraguard#protecting-the-login.
     *
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        //dd($request);
        // $user = Customer::where('email', $request->email)->first();

        // if ($user->type == 'admin') {
        //     return redirect()->route('admin.dashboard');
        // }
        try {
            $return = $this->guard()->attempt(
                $this->credentials($request),
                $request->filled('remember')
            );
            return $return;
        } catch (HttpResponseException $exception) {
            $this->incrementLoginAttempts($request);

            throw $exception;
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  Request  $request
     * @param $user
     *
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (! $user->isActive()) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')->withFlashDanger(__('Your account has been deactivated.'));
        }

        event(new UserLoggedIn($user));

        if (config('boilerplate.access.user.single_login')) {
            auth()->logoutOtherDevices($request->password);
        }
    }

    protected function sendLoginResponse(Request $request)
    {
        
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        $this->redirectTo = homeRoute();

        if($this->redirectTo)
        {
            return redirect()->route($this->redirectTo);
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }
}
