@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['setting'], ['method' => 'PATCH', 'route' => ['admin.settings.update', $data['setting']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.settings.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.settings._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Setting')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['setting']->id) !!}
    {!! Form::close() !!}
@stop