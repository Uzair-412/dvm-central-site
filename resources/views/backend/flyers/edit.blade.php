@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['flyer'], ['method' => 'PATCH', 'route' => ['admin.flyers.update', $data['flyer']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.flyers.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.flyers._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Flyer')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['flyer']->id) !!}
    {!! Form::close() !!}
@stop