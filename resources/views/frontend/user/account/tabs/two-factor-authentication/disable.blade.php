@extends('frontend.layouts.app')
@section('title', __('Disable Two Factor Authentication'))
@section('content')
<main id="2fa-page" class="relative">
    <div class="2fa-container">
        <div class="2fa-page-container width mt-20 mb-20 flex flex-col items-center lg:items-start lg:flex-row">
            <div class="border border-solid border-gray-200 mt-10 lg:mt-0 lg:w-9/12 lg:ml-8 bg-white p-6 w-full">
                @include('includes.partials.messages')
                <h5><strong>@lang('Disable Two Factor Authentication')</strong></h5>
                <p>@lang('Generate a code from your 2FA app and enter it below:')</p>
                <form action="{{ route('frontend.auth.account.2fa.destroy') }}" method="POST" name="confirm-item" class="change-pw-container flex flex-col text-gray-500 p-2 mt-3 sm:p-4 text-sm sm:text-base border border-solid border-gray-200 w-full">
                    @csrf
                    @method('DELETE')
                    <label for="code">@lang('Authorization Code')</label>
                    <input id="code" name="code" type="text" placeholder="{{ __('Authorization Code') }}" class="p-3 border border-solid border-gray-200 mt-4" maxlength="10" required />

                    <button type="submit" class="btn black-btn primary-black-bg text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">@lang('Remove Two Factor Authentication')</button>
                </form>
            </div>
        </div>
    </div>
</main>
{{-- <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-frontend.card>
                <x-slot name="header">
                    @lang('Disable Two Factor Authentication')
                </x-slot>
                <x-slot name="body">
                    <p>@lang('Generate a code from your 2FA app and enter it below:')</p>
                    <x-forms.delete :action="route('frontend.auth.account.2fa.destroy')" name="confirm-item">
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">@lang('Authorization Code')</label>
                            <div class="col-md-6">
                                <input type="text" name="code" id="code" maxlength="10" class="form-control" placeholder="{{ __('Authorization Code') }}" required />
                            </div>
                        </div><!--form-group-->
                        <div class="d-flex justify-content-center"><button class="btn btn-lg btn-danger" type="submit">@lang('Remove Two Factor Authentication')</button></div>
                    </x-forms.delete>
                </x-slot>
            </x-frontend.card>
        </div><!--col-md-8-->
    </div><!--row-->
</div> --}}
@endsection