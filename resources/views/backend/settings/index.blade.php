@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ $data['p_heading'] }}
        </x-slot>
        <x-slot name="body">
            <livewire:backend.settings-table />
        </x-slot>
    </x-backend.card>
@endsection