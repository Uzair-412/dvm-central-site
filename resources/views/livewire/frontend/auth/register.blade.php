<div>
    <main id="login-page" class="relative">
        <div class="sign-in-up-container p-2 width overflow-hidden grid lg:grid-cols-2 gap-6 xl:gap-10 mt-20">
            <div class="sign-in-up-wrapper flex flex-col justify-center items-center">
                @include('includes.partials.messages')

                <!-- sign up container -->
                <div class="sign-up-container w-full">
                    <h2 class="text-2xl font-bold">Signup</h2>
                    <div
                        class="sign-up-wrapper flex flex-col justify-center items-center border border-solid border-gray-200 p-2 sm:p-6 mt-4 bg-white">
                        <x-forms.post action="{{ route('frontend.auth.register') }}" id="signup-form" class="text-sm block w-full">
                            <label class="block w-full text-gray-500 form-child" for="name">{{ __('Name') }}</label>
                            <input
                                class="w-full p-3 mt-2 border border-solid border-gray-200 focus:outline-none form-child bg-gray-100 w-full"
                                type="text" id="name_register" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" />

                            <label class="block w-full text-gray-500 mt-2 form-child sm:mt-4" for="email">{{ __('E-mail Address') }}</label>
                            <input
                                class="w-full p-3 mt-2 border border-solid border-gray-200 focus:outline-none form-child bg-gray-100 w-full"
                                type="email" id="email_register" name="email" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" />

                            <label class="block w-full text-gray-500 form-child mt-2 sm:mt-4"
                                for="password_register">Password</label>
                            <input class="w-full p-3 mt-2 border border-solid border-gray-200 focus:outline-none form-child bg-gray-100 w-full" type="password" id="password_register" name="password" placeholder="{{ __('Password') }}." />

                            <label class="block w-full text-gray-500 form-child mt-2 sm:mt-4" for="password_confirmation">Password Confirmation</label>
                            <input class="w-full p-3 mt-2 border border-solid border-gray-200 focus:outline-none form-child bg-gray-100 w-full" type="password" id="password_confirmation_register" name="password_confirmation" placeholder="{{ __('Password Confirmation') }}" />

                            <div class="mt-5">
                                <input type="checkbox" name="terms" value="1" id="terms_conditions" required>
                                <label for="terms_conditions">
                                    @lang('I agree to the') <a href="{{ route('frontend.terms-and-conditions') }}" target="_blank">@lang('Terms &
                                        Conditions')</a>
                                </label>
                            </div>

                            <button class="mt-4 btn px-4 py-2 md:px-6 md:py-3 btn blue-btn lite-blue-bg-color text-white text-center relative overflow-hidden z-10 w-max mr-2 sm:mr-4 container-btn">Register</button>

                            <div class="social-login-container flex flex-col mt-4">
                                <div>Or Register with</div>

                                <div class="social-login-wrapper flex mt-4 primary-black-color">
                                    <a href="#"
                                        class="btn z-10 relative overflow-hidden flex items-center bg-white border border-solid border-gray-200 px-4 py-2 md:px-6 md:py-3">
                                        <img src="assets/icons/google.svg" alt="Google" />
                                        <span class="ml-2 hidden sm:inline-block">Google</span>
                                    </a>

                                    <a href="#"
                                        class="facebook mx-2 btn z-10 relative overflow-hidden flex items-center bg-white border border-solid border-gray-200 px-4 py-2 md:px-6 md:py-3">
                                        <img src="assets/icons/facebook.svg" alt="Facebook" />
                                        <span class="ml-2 hidden sm:inline-block">Facebook</span>
                                    </a>

                                    <a href="#"
                                        class="linkedin btn z-10 relative overflow-hidden flex items-center bg-white border border-solid border-gray-200 px-4 py-1 md:py-2">
                                        <img src="assets/icons/login-linkedin.svg" alt="LinkedIn" />
                                        <span class="ml-2 hidden sm:inline-block">LinkedIn</span>
                                    </a>
                                </div>
                            </div>

                            <div class="cursor-pointer w-max text-red-600 member-btn text-sm already-member-btn underline-links relative overflow-hidden mt-4">
                                <a href="{{ route('frontend.auth.login') }}">Already a Member? Login Here!</a>
                            </div>
                        </x-forms.post>
                    </div>
                </div>
            </div>
            @include('frontend.auth.login-register-right-content')
        </div>
    </main>
</div>
