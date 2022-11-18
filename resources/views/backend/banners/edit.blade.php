@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['banner'], ['method' => 'PATCH', 'route' => ['admin.banners.update', $data['banner']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.banners.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.banners._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Banner')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['banner']->id) !!}
    {!! Form::close() !!}
@stop