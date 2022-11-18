@php 
$data['breadcrumb'] = true; 
$data['breadcrumbs']  = ['Login','Two Factor Authentication'];
@endphp
@extends('frontend.layouts.app')
@section('title', __('Two Factor Authentication is required'))
@section('content')
    <div class="width pt-20">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$errors->first()}}
            </div>
        @endif
        <div class="text-2xl font-semibold py-2">
            @lang('Two Factor Authentication is required')
        </div>
        <div class="text-gray-500">
            <p>@lang('To continue, open up your Authenticator app and issue your 2FA code.')</p>
            <x-forms.post :action="$action">
                @foreach((array)$credentials as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
                @if($remember)
                    <input type="hidden" name="remember" value="on">
                @endif
                <div>
                    <label for="{{ $input }}" class="block text-black font-semibold mt-1 pt-4">@lang('Authentication Code')</label>
                    <div class="col-md-6">
                        <input type="text" name="{{ $input }}" id="{{ $input }}" class="w-3/5 p-3 my-2 border border-solid focus:outline-none form-child bg-gray-100 {{ $error ? 'border-red-500' : 'border-gray-200' }}" placeholder="123456" minlength="6" required />
                        @if($error)
                            <div class="invalid-feedback">
                                {{ trans('laraguard::validation.totp_code') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-0">
                    <button class="btn blue-btn text-white lite-blue-bg-color px-4 md:px-6 py-2 md:py-3 relative overflow-hidden z-10 capitalize text-sm md:text-base" type="submit">@lang('Confirm Code')</button>
                </div>
            </x-forms.post>
        </div>
    </div>
@endsection
