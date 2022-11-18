@extends('frontend.layouts.app')
@section('title', 'Resources')
@section('meta_keywords','Pet-Disease')
@section('meta_description','Pet-Disease' )

@push('after-styles')
    <link rel="stylesheet" href="assets/styles/common-deseases.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css') }}" />
@endpush

@section('content')
    @livewire('pet-diseases', ['data' => $data])
@endsection

@push('after-scripts')
    <script defer src="assets/js/pet-deseases.js"></script>
@endpush
