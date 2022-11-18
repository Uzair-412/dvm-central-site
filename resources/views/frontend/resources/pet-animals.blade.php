@extends('frontend.layouts.app')
@section('title', 'Animal Diseases | Medicine, Symptom & Treatment | DVM Central')
@section('meta_keywords','Veterinary Diseases, Animal Diseases, Animal Health Solutions, Dog Diseases, Horse Diseases, Bird Diseases, Cat Diseases, Vet Tech')
@section('meta_description','Insights about medicine and treatments for commonly found diseases in animals to safeguard the health and welfare of animals.' )

@push('after-styles')
    <link rel="stylesheet" href="assets/styles/common-deseases.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css') }}" />
@endpush

@section('content')
    <main id="cmn-deseases-page" class="relative">
        @livewire('pet-animals', ['data' => $data])
    </main>
@endsection
@push('after-scripts')
    <script defer src="assets/js/common-deseases.js"></script>
@endpush
