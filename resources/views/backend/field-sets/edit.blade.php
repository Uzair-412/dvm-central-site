@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['field-sets'], ['method' => 'PATCH', 'route' => ['admin.field-sets.update', $data['field-sets']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.field-sets.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.field-sets._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Field Set')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['field-sets']->id) !!}
    {!! Form::close() !!}
@stop