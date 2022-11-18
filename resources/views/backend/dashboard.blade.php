@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    @php
    $session_key =Session::get('user_name');
    if($session_key !== 'super_admin'){
        Auth::logout();
        return redirect('/login');
    }
    @endphp
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
           
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
        </x-slot>
    </x-backend.card>
@endsection
