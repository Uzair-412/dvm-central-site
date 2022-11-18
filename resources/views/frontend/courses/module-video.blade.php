@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/course-video.css" />
@endpush
@section('content')
    @livewire('course.popup', ['course'=>$data['course']])
    @livewire('course.module-video', ['data' => $data])

    <script defer src="/assets/js/course-listing.js"></script>
@endsection
