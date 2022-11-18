@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['level'], ['method' => 'PATCH', 'route' => ['admin.levels.update', $data['level']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.levels.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.levels._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Level')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['level']->id) !!}
    {!! Form::close() !!}
@stop