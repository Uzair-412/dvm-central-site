@extends('frontend.layouts.app')
@section('title', __('Reset Password'))
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@endpush
@section('content')
<main id="login-page" class="relative">
    <div class="sign-in-up-container p-2 width overflow-hidden mt-20">
        <div class="sign-in-up-wrapper flex flex-col justify-center items-center">
            <div class="forget-password-container w-6/12" x-show="openReset">
                @include('includes.partials.messages')
                {{-- <h2 class="text-2xl font-bold">Reset Password</h2> --}}
                <div class="forget-password-wrapper flex flex-col justify-center items-center border border-solid border-gray-200 p-3 sm:p-6 mt-4 bg-white">
                    <x-forms.post :action="route('frontend.auth.password.update')" id="forgot-password-form" class="block w-full">
                        <input type="hidden" name="token" value="{{ $token }}" />
                        {{-- <label class="block w-full text-gray-600 form-child" for="email">@lang('E-mail Address')</label> --}}
                        <span>{{ $email ?? old('email') }}</span>
                        
                        <label class="block w-full text-gray-600 mt-2 sm:mt-4 form-child"
                                for="password">Password</label>
                            <div
                                class="flex justify-between items-center border border-solid border-gray-200 mt-2 bg-gray-100">
                                <input class="password_login w-full p-3 focus:outline-none w-full form-child bg-gray-100" type="password"
                                    name="password" id="password_reset" placeholder="{{ __('Password') }}">
                                <i class="far fa-eye-slash fa-eye mr-2" id="togglePassword1" style="margin-left: -30px; cursor: pointer;"></i>
                            </div>
                            
                        <label class="block w-full text-gray-600 mt-2 sm:mt-4 form-child" for="password_confirmation">@lang('Password Confirmation')</label>
                        <div
                            class="flex justify-between items-center border-solid border-gray-200 mt-2">
                            <input type="password" id="confirm_password_reset" name="password_confirmation" class="w-full p-3 mt-2 focus:outline-none bg-gray-100 form-child w-full border border-solid border-gray-200" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                            <i class="far fa-eye-slash fa-eye mr-2" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
                        </div>
                        

                        <button type="submit" value="Send Password Reset Link" class="form-child btn py-2 px-4 md:px-6 md:py-3 primary-black-bg black-btn text-white text-center relative overflow-hidden z-10 mt-4 cursor-pointer">
                            @lang('Reset Password')
                        </button>
                    </x-forms.post>
                </div>
            </div>
            {{-- <x-frontend.card>
                <x-slot name="header">
                    @lang('Reset Password')
                </x-slot>
                <x-slot name="body">
                    <x-forms.post :action="route('frontend.auth.password.update')">
                        <input type="hidden" name="token" value="{{ $token }}" />
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('E-mail Address')</label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $email ?? old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                            </div>
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('Password')</label>
                            <div class="col-md-6">
                                <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="password" />
                            </div>
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')</label>
                            <div class="col-md-6">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                            </div>
                        </div><!--form-group-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">@lang('Reset Password')</button>
                            </div>
                        </div><!--form-group-->
                    </x-forms.post>
                </x-slot>
            </x-frontend.card> --}}
        </div>
    </div>
</main>
    {{-- <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$errors->first()}}
                    </div>
                @endif
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container--> --}}
@endsection
@push('after-scripts')
    <script>
        const togglePassword1 = document.querySelector("#togglePassword1");
        const togglePassword2 = document.querySelector("#togglePassword2");
        const password = document.querySelector("#password_reset");
        const confirm_password = document.querySelector("#confirm_password_reset");

        togglePassword1.addEventListener("click", function (e) {
        // toggle the type attribute
        const type1 =
            password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type1);
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
        });

        togglePassword2.addEventListener("click", function (e) {
        // toggle the type attribute
        const type2 =
            confirm_password.getAttribute("type") === "password" ? "text" : "password";
            confirm_password.setAttribute("type", type2);
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
        });

    </script>
@endpush