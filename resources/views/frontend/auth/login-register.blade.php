@extends('frontend.layouts.app')
@if($data['form-type'] == 'login')
    @section('title', __('Login'))
@endif
@if($data['form-type'] == 'register')
    @section('title', __('Register'))
@endif
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/login.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@endpush
@section('content')
    @if($data['form-type'] == 'register')
        <livewire:frontend.auth.register />
    @else
        <livewire:frontend.auth.login-register />
    @endif
@endsection
@push('after-scripts')
    <script defer src="{{ asset('assets/js/login.js') }}"></script>
@endpush