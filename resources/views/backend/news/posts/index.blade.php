@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.news-posts.create')"
            :text="__('Create News')" />
    </x-slot>
    @endif
    <x-slot name="body">
        <livewire:backend.news-posts-table />
    </x-slot>
</x-backend.card>
@endsection