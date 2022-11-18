@extends('backend.layouts.app')
@section('title', $p_heading)
@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses">Courses</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $course->title }}
    </li>
</ol>
@endsection
@section('content')
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="url('admin/manage-courses/courses/'.$slug.'/module/create')"
            :text="__('Create Course Module')" />
    </x-slot>
    @endif
    <x-slot name="body">
        <livewire:backend.course-management.course-modules-table :params="$course->id" />
    </x-slot>
</x-backend.card>
@endsection