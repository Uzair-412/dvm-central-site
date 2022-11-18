@extends('frontend.layouts.app')
@section('title', 'Shopping Cart')
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/cart.css') }}" />
@endpush
@section('content')
    @livewire('frontend.cart', ['rand_num'=>session()->get('rand_num')])
    <!-- remove from cart popup  -->
    <div class="remove-from-cart-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center hidden opacity-0">
        <div class="remove-from-cart-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 opacity-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="#EF4444">
                <path class="path" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="remove-from-cart-popup-msg">Item will be removed from your cart.</div>
            <div class="remove-from-cart-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-6">
                <button
                    class="cancel-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max text-center">
                    Cancel </button>
                <button
                    class="remove-btn btn red-bg red-btn text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Remove</button>
            </div>
        </div>
    </div>
@endsection