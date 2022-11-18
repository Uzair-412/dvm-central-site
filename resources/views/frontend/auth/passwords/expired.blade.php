@extends('frontend.layouts.app')
@section('title', __('Your password has expired.'))
@section('content')
    {{-- <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$errors->first()}}
                    </div>
                @endif
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Your password has expired.')
                    </x-slot>
                    <x-slot name="body">
                        <x-forms.patch :action="route('frontend.auth.password.expired.update')">
                            <div class="form-group row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-right">@lang('Current Password')</label>
                                <div class="col-md-6">
                                    <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
                                </div>
                            </div><!--form-group-->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">@lang('New Password')</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required autocomplete="password" />
                                </div>
                            </div><!--form-group-->
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" maxlength="100" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                                </div>
                            </div><!--form-group-->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Update Password')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.patch>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container--> --}}
    <main id="expire-page" class="relative">
        <div class="sign-in-up-container p-2 width overflow-hidden grid lg:grid-cols-2 gap-6 xl:gap-10 mt-20 ml-20">
            <div class="sign-in-up-wrapper flex flex-col justify-center items-center">
                <div class="sign-in-container w-full">
                    <h2 class="text-xl dark-blue-color">Your password has expired</h2>
                    <div
                        class="sign-in-wrapper flex flex-col justify-center items-center border border-solid border-gray-200 p-2 sm:p-6 mt-4 bg-white">
                        @if ($errors->any())
                            <div class="alert text-red-400 text-xl mb-8" role="alert">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $errors->first() }}
                            </div>
                        @endif
                        @include('includes.partials.messages')
                        <x-forms.patch :action="route('frontend.auth.password.expired.update')" class="text-sm block w-full">
                            <label class="block w-full text-gray-600 form-child" for="current_password">Current
                                Password</label>
                            <input
                                class="w-full p-3 border border-solid border-gray-200 mt-2 focus:outline-none form-child bg-gray-100 w-full"
                                type="password" name="current_password" placeholder="{{ __('Current Password') }}"
                                maxlength="100" required autofocus />

                            <label class="block w-full text-gray-600 mt-2 sm:mt-4 form-child" for="new_password">New
                                Password</label>
                            <div
                                class="flex justify-between items-center border border-solid border-gray-200 mt-2 bg-gray-100">
                                <input class="w-full p-3 focus:outline-none w-full form-child bg-gray-100" type="password"
                                    id="password" name="password" class="form-control"
                                    placeholder="{{ __('New Password') }}" maxlength="100" required
                                    autocomplete="password" />
                            </div>

                            <label class="block w-full text-gray-600 mt-2 sm:mt-4 form-child"
                                for="confirm_password">Password Confirmation</label>
                            <div
                                class="flex justify-between items-center border border-solid border-gray-200 mt-2 bg-gray-100">
                                <input class="w-full p-3 focus:outline-none w-full form-child bg-gray-100" type="password"
                                    id="password_confirmation" name="password_confirmation" class="form-control"
                                    maxlength="100" placeholder="{{ __('Confirm Your Password ') }}" required
                                    autocomplete="new-password" />
                            </div>

                            <div
                                class="remember-forgot-wrapper flex flex-col sm:flex-row justify-center sm:justify-between items-center text-sm w-full mt-4">
                                <div class="remember flex items-center w-full">
                                    <div class="sign-btn-wrapper w-max">
                                        <button
                                            class="btn px-4 py-2 md:px-6 md:py-3 btn blue-btn lite-blue-bg-color text-white text-center relative overflow-hidden z-10 w-max mr-2 sm:mr-4 container-btn">@lang('Update
                                            Password')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </x-forms.patch>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
