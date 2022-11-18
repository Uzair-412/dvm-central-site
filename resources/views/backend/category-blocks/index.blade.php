@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ $data['p_heading'] }}
        </x-slot>
        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.category-blocks.create')"
                    :text="__('Create New Block')"
                />
            </x-slot>
        @endif
        <x-slot name="body">
            <livewire:backend.blocks-table />
        </x-slot>
    </x-backend.card>
@endsection