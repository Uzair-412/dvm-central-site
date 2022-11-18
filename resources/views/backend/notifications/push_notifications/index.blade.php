@extends('backend.layouts.app')
@section('title', @$p_heading)
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ @$p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.notifications.create')"
                :text="__('Create Notification')"
            />
        </x-slot>
        <x-slot name="body">
            <livewire:backend.push-notifications-table />
        </x-slot>
    </x-backend.card>
@endsection