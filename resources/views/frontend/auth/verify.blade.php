@extends('frontend.layouts.app')
@section('title', __('Verify Your E-mail Address'))
@section('content')
    <div class="width pt-20">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$errors->first()}}
            </div>
        @endif
        <div class="text-2xl font-semibold py-2">
            @lang('Verify Your E-mail Address')
        </div>
        <div class="text-gray-500">
            @lang('Before proceeding, please check your email for a verification link.')
            @lang('If you did not receive the email.')
            <x-forms.post :action="route('frontend.auth.verification.resend')" class="mt-4">
                <button class="btn blue-btn text-white lite-blue-bg-color px-4 md:px-6 py-2 md:py-3 relative overflow-hidden z-10 capitalize text-sm md:text-base" type="submit">@lang('click here to request another')</button>
            </x-forms.post>
        </div>
    </div>
@endsection