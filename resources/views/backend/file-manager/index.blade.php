@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ $data['p_heading'] }}
        </x-slot>
        <x-slot name="body">
            <div style="height: 600px;">
                <div id="fm"></div>
            </div>
        </x-slot>
    </x-backend.card>
    @push('after-styles')
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    @endpush
    @push('after-scripts')
        <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    @endpush
@stop