@extends('frontend.layouts.app')
@section('title', appName() . ' | ' . __('Payment History'))
@section('content')
    @push('after-styles')
        <link rel="stylesheet" href="/assets/styles/dashboard.css" />
    @endpush
    <main id="orders-page" class="relative">
        <div class="orders-container">
            <div class="dashboard-page-container width mt-20 mb-20 flex flex-col items-center lg:items-start lg:flex-row">
                @include('frontend.user.sidebar')
                <div class="right-col-wrapper border border-solid border-gray-200 mt-10 lg:mt-0 lg:w-9/12 lg:ml-8 bg-white p-2 sm:p-4 md:p-6 w-full">
                    @livewire('frontend.dashboard.payment-history-detail', ['payment' => $data['payment']])
                </div>
            </div>
        </div>
    </main>
@endsection