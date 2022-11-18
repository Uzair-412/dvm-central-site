@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/jobs.css" />
@endpush
@section('content')
    <!-- page content -->
    <main id="jobs-page" class="relative bg-gray-50">
        @livewire('frontend.jobs.job-list', ['data' => $data])
    </main>
@endsection
@push('after-scripts')
    <script defer src="{{ asset('assets/js/jobs.js') }}"></script>
@endpush
