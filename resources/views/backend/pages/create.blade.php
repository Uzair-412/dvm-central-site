@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::open(array('route' => 'admin.pages.store', 'method' => 'POST', 'files' => true)) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.pages.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.pages._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Web Page')</button>
            </x-slot>
        </x-backend.card>
    {!! Form::close() !!}
@stop