@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['event'], ['method' => 'PATCH', 'route' => ['admin.events.update', $data['event']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.events.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.events._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Event')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['event']->id) !!}
    {!! Form::close() !!}
@stop