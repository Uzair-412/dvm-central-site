@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['site'], ['method' => 'PATCH', 'route' => ['admin.micro-sites.update', $data['site']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.micro-sites.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.micro-sites._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Site')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['site']->id) !!}
    {!! Form::close() !!}
@stop