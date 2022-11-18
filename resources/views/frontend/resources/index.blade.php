@extends('frontend.layouts.app')
@section('title', 'Vet Resources | Online Vet Resources to Learn and Grow!')
@section('meta_description', 'DVM Central offers online vet resources ✓educational programs ✓CE courses ✓webinars ✓guides ✓associations ✓surgical procedures ✓trade shows ✓news ✓common diseases ✓blogs and more!')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/resources.css" />
@endpush
@section('content')
    @livewire('resources', ['data' => $data])
@endsection
