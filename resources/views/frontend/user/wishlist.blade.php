@extends('frontend.layouts.app')
@section('title', appName() . ' | ' . __('Wishlist'))
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/wishlist.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
@endpush

@section('content')
    @push('after-styles')
        <link rel="stylesheet" href="/assets/styles/dashboard.css" />
    @endpush
    <main id="orders-page" class="relative">
        <div class="orders-container">
            <div class="dashboard-page-container width mt-20 mb-20 flex flex-col items-center lg:items-start lg:flex-row">
                @include('frontend.user.sidebar')
                <div class="right-col-wrapper border border-solid border-gray-200 mt-10 lg:mt-0 lg:w-9/12 lg:ml-8 bg-white p-2 sm:p-4 md:p-6 w-full">
                    @livewire('frontend.dashboard.wish-list')
                </div>
            </div>
        </div>
    </main>
@endsection

@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script defer src="/assets/js/wishlist.js?version=0.1"></script>
@endpush