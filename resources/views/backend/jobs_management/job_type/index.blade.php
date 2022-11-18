@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link icon="c-icon cil-plus" cla ss="card-header-action" :href="route('admin.manage-jobs.types.create')" :text="__('Create Job Type')" />
            </x-slot>
        @endif
        <x-slot name="body">
            <livewire:backend.job-management.job-type-table />
        </x-slot>
    </x-backend.card>
@endsection
