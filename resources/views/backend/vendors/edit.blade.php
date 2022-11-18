@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['vendors'], ['method' => 'PATCH', 'route' => ['admin.vendors.update', $data['vendors']->id], 'files' => true]) !!}
        <div class="row">
            <div class="col-md-9">
                <x-backend.card>
                    <x-slot name="header">
                        {{ $data['p_heading'] }}
                    </x-slot>
                    <x-slot name="headerActions">
                        <x-utils.link class="card-header-action" :href="route('admin.customers.index')" :text="__('Cancel')" />
                    </x-slot>
                    <x-slot name="body">
                        @include('backend.vendors._form')
                    </x-slot>
                    <x-slot name="footer">
                        <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Vendor')</button>
                    </x-slot>
                </x-backend.card>
            </div>
            @include('backend.includes.customer-links')
        </div>
        {!! Form::hidden('customer_id', $data['customer']->id) !!}
        {!! Form::hidden('id', $data['vendors']->id) !!}
    {!! Form::close() !!}
@stop