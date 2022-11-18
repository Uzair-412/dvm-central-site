@extends('backend.layouts.app')
@section('title', @$p_heading)
@section('content')
    {!! Form::open(array('route' => 'admin.notifications.store', 'method' => 'POST', 'files' => true)) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ @$p_heading }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.notifications.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.notifications._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Send or Create Notification')</button>
            </x-slot>
        </x-backend.card>
    {!! Form::close() !!}
@endsection