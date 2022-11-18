@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/courses-category.css" />
@endpush
@section('content')
    <main id="courses-category-page" class="relative bg-gray-50">
        <div class="courses-category-container width flex flex-col justify-center items-center">
            <h1 class="text-2xl font-semibold mt-20">Shopping Cart</h1>
            <div class="w-full">
                <h3 class="text-xl font-semibold mt-6 mb-2">{{ $cart->count() }} - @if($cart->count()>1){{ 'Courses' }} @else {{ 'Course' }} @endif in Cart</h3>
            </div>
            <div class="courses-category-wrapper flex flex-col lg:flex-row w-full sm:items-center lg:items-start">
                @if(count($cart) > 0)
                <div class="course-cart-wrapper w-full lg:w-8/12 xl:w-9/12 lg:mr-4 overflow-x-auto">
                    @php
                        $total_discount = 0;
                    @endphp
                    @foreach($cart as $key => $course_cart)
                    @php
                        $course = \App\Models\Course::find($course_cart->id);
                        $total_discount += $course->discount($course->id);
                    @endphp
                        <div class="p-2 sm:p-4 bg-white border border-solid border-gray-200">
                            <div class="flex flex-col sm:flex-row">
                                <div style="flex: 1;" class="sm:mr-4 bg-gray-50 flex justify-center items-center">
                                    <img src="{{ url('/up_data/courses/thumbnails/'.$course->thumbnail) }}" alt="{{ $course->title }}" />
                                </div>
                                <div class="mt-2 sm:mt-0" style="flex: 3;">
                                    <h3 class="font-semibold">{{ $course->title }}</h3>
                                    <span class="text-sm">By {{ $course->instructor->name }}</span>
                                </div>
                                <div class="flex justify-between w-full sm:w-3/12 mt-2 sm:mt-0">
                                <div class="price font-semibold text-sm flex sm:justify-center">
                                    <p class="text-blue-500">{{ '$'.number_format($course->price, 2) }}
                                        @if($course->price_original)
                                            <span class="text-red-500">({{ number_format($course->discount($course->id),2).'% Off' }})</span>
                                        @endif
                                    </p>
                                    @if($course->price_original)
                                        <p class="text-red-500 line-through">{{ '$'.number_format($course->price_original, 2) }}</p>
                                    @endif
                                </div>
                                <div class="price">
                                    <form class="flex sm:justify-center" action="{{ route('frontend.course.cart.delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $course->id }}" />
                                        <button type="submit" class="text-red-500 text-white cursor-pointer inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="sm:w-6/12 lg:w-4/12 xl:w-3/12 mt-4 lg:mt-0 p-2 sm:p-4 bg-white border border-solid border-gray-200">
                    <div class="flex flex-wrap justify-between font-semibold mb-2">
                        <h3 class="text-xl">Total</h3>
                        <p class="text-blue-500">{{ '$'.number_format($cart_subtotal, 2) }}</p>
                    </div>
                    @if($total_discount)
                        <div class="flex flex-wrap justify-between text-sm text-gray-500 mb-2">
                            <p>Discount</p>
                            <span class="text-red-500">({{ number_format(($total_discount), 2) }}% Off)</span>
                        </div>
                    @endif
                    <a href="{{ route('frontend.course.checkout') }}" class="btn blue-btn lite-blue-bg-color text-white w-full px-6 py-3 h-auto relative overflow-hidden z-10 mt-4 sm:mt-0 inline-block text-center">checkout</a>
                </div>
                @else
                    <div class="p-2 sm:p-4 bg-white border border-solid border-gray-200 w-full text-center md:col-span-3 lg:col-span-4 xl:col-span-5">
                        Atleast add 1 course in your cart to proceed!
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection