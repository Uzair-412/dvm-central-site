@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/course-listing.css" />
@endpush
@section('content')
     @livewire('course.popup')
     @livewire('course.course-listing', ['data' => $data])
     {{-- <livewiire:course.course-listing :data="$data" /> --}}

    @push('after-scripts')
        {{-- <script defer src="/assets/js/course-listing.js"></script> --}}
    @endpush
@endsection
