@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
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
                    <livewire:backend.customers-addresses-table />
                </x-slot>
            </x-backend.card>
        </div>
        @include('backend.includes.customer-links')
    </div>
@endsection