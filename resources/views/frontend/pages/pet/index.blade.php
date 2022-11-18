@extends('frontend.layouts.app')
@section('title', 'Pet of The Month')

@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
    <link rel="stylesheet" href="/assets/styles/pet-of-the-month.css" />
@endpush
@section('content')
    @livewire('pet-of-the-month', ['data'=>$data])
@endsection
@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script defer src="/assets/js/pet-of-the-month.js"></script>
@endpush
