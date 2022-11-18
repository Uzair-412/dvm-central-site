@extends('frontend.layouts.app')
@section('title', $data['News']->meta_title)
@section('meta_keywords', $data['News']->meta_keywords)
@section('meta_description', $data['News']->meta_description)

@push('after-styles')
    <link rel="stylesheet" href="assets/styles/resource.css?version=0.1" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css') }}" />
@endpush

@section('content')

    @livewire('resource', ['data' => $data])
@endsection
@push('after-scripts')
    <script defer src="assets/js/resource.js"></script>
@endpush
