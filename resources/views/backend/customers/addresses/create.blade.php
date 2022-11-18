@extends('backend.layouts.app')

@section('title', $data['p_heading'])


@section('content')
    {!! Form::open(array('route' => ['admin.customers.addresses.store', $data['customer']->id], 'method' => 'POST')) !!}
        <div class="row">
            <div class="col-md-9">
                <x-backend.card>
                    <x-slot name="header">
                        {{ $data['p_heading'] }}
                    </x-slot>
                    {{-- <x-slot name="headerActions">
                        <x-utils.link class="card-header-action" :href="route('admin.customers.addresses.index')" :text="__('Cancel')" />
                    </x-slot> --}}
                    <x-slot name="body">
                        @include('backend.customers.addresses._form')
                    </x-slot>
                    <x-slot name="footer">
                        <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Customer')</button>
                    </x-slot>
                </x-backend.card>
            </div>
            @include('backend.includes.customer-links')
        </div>
    {!! Form::close() !!}
@stop