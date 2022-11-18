@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.manage-courses.types.create')"
            :text="__('Create Course Type')" />
    </x-slot>
    @endif
    <x-slot name="body">
        <livewire:backend.course-management.course-types-table />
    </x-slot>
</x-backend.card>
@endsection