@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['pet'], ['method' => 'POST', 'route' => ['admin.pets.update', $data['pet']->id] , 'files' =>true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.pets')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.pets._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Pet')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['pet']->id) !!}
    {!! Form::close() !!}
@stop