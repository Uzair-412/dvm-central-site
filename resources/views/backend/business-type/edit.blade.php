@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['business-type'], ['method' => 'PATCH', 'route' => ['admin.business-type.update', $data['business-type']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.business-type.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.business-type._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Business Type')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['business-type']->id) !!}
    {!! Form::close() !!}
@stop