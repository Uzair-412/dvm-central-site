@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['orders'], ['method' => 'PATCH', 'route' => ['admin.orders.update', $data['orders']->id]]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.orders.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.orders._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Order')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['orders']->id) !!}
    {!! Form::close() !!}
@stop