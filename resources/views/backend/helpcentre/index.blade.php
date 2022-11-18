@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="body">
            <livewire:backend.help-centre-table />
        </x-slot>
    </x-backend.card>
@endsection