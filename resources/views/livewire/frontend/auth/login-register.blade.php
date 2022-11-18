<div>
    <main id="login-page" class="relative" x-data="{ openLogin: true, openReset: false, remember: 0 }">
        <div class="sign-in-up-container p-2 width overflow-hidden grid lg:grid-cols-2 gap-6 xl:gap-10 mt-20">
            <div class="sign-in-up-wrapper flex flex-col justify-center items-center">
                {{-- @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mb-2" role="alert">
                    {{$errors->first()}}
                </div>
                @endif --}}
                @include('includes.partials.messages')
                <div class="sign-in-container w-full" x-show="openLogin">
                    <h2 class="text-2xl font-bold dark-blue-color">Login</h2>
                    <div class="sign-in-wrapper flex flex-col justify-center items-center border border-solid border-gray-200 p-2 sm:p-6 mt-4 bg-white">
                        <x-forms.post :action="route('frontend.auth.login')" class="text-sm block w-full">
                            <input type="hidden" name="redirectTo" value="{{ @session()->get('redirect_to') }}" />
                            <label class="block w-full text-gray-600 form-child" for="email">Email Address</label>
                            <input
                                class="w-full p-3 border border-solid border-gray-200 mt-2 focus:outline-none form-child bg-gray-100 w-full"
                                type="email" name="email" id="email_login" placeholder="{{ __('E-mail Address') }}"
                                value="{{ old('email') }}" />

                            <label class="block w-full text-gray-600 mt-2 sm:mt-4 form-child"
                                for="password">Password</label>
                            <div
                                class="flex justify-between items-center border border-solid border-gray-200 mt-2 bg-gray-100">
                                <input class="w-full p-3 focus:outline-none w-full form-child bg-gray-100" type="password"
                                    name="password" id="password_login" placeholder="{{ __('Password') }}">
                                    <i class="far fa-eye-slash fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                <a @click="openLogin=false; openReset=true;" class="forgot cursor-pointer w-max forgot-btn text-xs text-red-600 p-3 cursor-pointer" >{{ __('Forgot?') }}</a>
                            </div>

                            <div class="remember-forgot-wrapper flex flex-col sm:flex-row justify-center sm:justify-between items-center text-sm w-full mt-4">
                                <div class="remember flex items-center w-full">
                                    <div class="sign-btn-wrapper w-max">
                                        <button class="btn px-4 py-2 md:px-6 md:py-3 btn blue-btn lite-blue-bg-color text-white text-center relative overflow-hidden z-10 w-max mr-2 sm:mr-4 container-btn">@lang('Sign
                                            In')</button>
                                    </div>
                                    <label for="remember" class="@if($remember == 1) bg-blue-500 @endif switch-wrapper h-max bg-gray-200 inline mr-2 cursor-pointer rounded-full" wire:click="checkRemember" >
                                        <div class=" switch-circle bg-white circle-border rounded-full {{ $remember==1 ? 'switch-toggle' : '' }}"></div>
                                        <input type="hidden" name="remember" id="remember" value="{{ $remember }}" />
                                    </label>
                                    <div class="cursor-pointer w-max sm:w-9/12 switch-text" >@lang('Remember Me')</div>
                                </div>
                            </div>

                            @if(config('boilerplate.access.captcha.login'))
                            <div class="captcha">
                                @captcha
                                <input type="hidden" name="captcha_status" value="true" />
                            </div>
                            @endif

                            <div class="social-login-container flex flex-col mt-4">
                                <div>Or Login with</div>
                                <div class="social-login-wrapper flex mt-4 primary-black-color">
                                    <a href="{{ route('frontend.auth.social.login', 'google') }}"
                                        class="btn z-10 relative overflow-hidden flex items-center bg-white border border-solid border-gray-200 px-4 py-2 md:px-6 md:py-3">
                                        <img src="assets/icons/google.svg" alt="Google" />
                                        <span class="ml-2 hidden sm:inline-block">Google</span>
                                    </a>

                                    <a href="{{ route('frontend.auth.social.login', 'facebook') }}"
                                        class="facebook mx-2 btn z-10 relative overflow-hidden flex items-center bg-white border border-solid border-gray-200 px-4 py-2 md:px-6 md:py-3">
                                        <img src="assets/icons/facebook.svg" alt="Facebook" />
                                        <span class="ml-2 hidden sm:inline-block">Facebook</span>
                                    </a>

                                    <a href="{{ route('frontend.auth.social.login', 'linkedin') }}"
                                        class="linkedin btn z-10 relative overflow-hidden flex items-center bg-white border border-solid border-gray-200 px-4 py-1 md:py-2">
                                        <img src="assets/icons/login-linkedin.svg" alt="LinkedIn" />
                                        <span class="ml-2 hidden sm:inline-block">LinkedIn</span>
                                    </a>
                                </div>
                            </div>

                            <a href="{{ route('frontend.auth.register') }}" class="forgot sm:text-right signup-btn underline-links relative overflow-hidden mt-4 text-red-600 inline-block text-sm cursor-pointer">
                                Don't have an account? Sign-up here? </a>
                        </x-forms.post>
                    </div>
                </div>

                <!-- reset password -->
                <div class="forget-password-container w-full" x-show="openReset">
                    <h2 class="text-2xl font-bold">Reset Password</h2>
                    <div
                        class="forget-password-wrapper flex flex-col justify-center items-center border border-solid border-gray-200 p-3 sm:p-6 mt-4 bg-white">
                        <x-forms.post action="{{ route('frontend.auth.password.email') }}" id="forgot-password-form" class="block w-full">
                            <label class="block w-full text-gray-600 form-child" for="email">Email Address</label>
                            <input
                                class="w-full p-3 mt-2 focus:outline-none bg-gray-100 form-child w-full border border-solid border-gray-200"
                                type="email" name="email" id="reset-email" placeholder="Email Address ..." />
                            <button type="submit" value="Send Password Reset Link"
                                class="form-child btn py-2 px-4 md:px-6 md:py-3 primary-black-bg black-btn text-white text-center relative overflow-hidden z-10 mt-4 cursor-pointer">
                                Send Password Reset Link
                            </button>
                        </x-forms.post>
                    </div>

                    <button type="button" @click="openLogin=true; openReset=false;"
                        class="relative mt-4 cursor-pointer b-t-signin w-max flex items-center btn blue-btn lite-blue-bg-color text-white overflow-hidden z-10 py-2 px-4 md:px-6 md:py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Back to Sign In
                    </button>
                </div>
            </div>
            @include('frontend.auth.login-register-right-content')
        </div>
    </main>
</div>