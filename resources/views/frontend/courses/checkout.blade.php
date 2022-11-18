@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/courses-category.css" />
@endpush
@section('content')
    <main id="courses-category-page" class="relative bg-gray-50">
        <div class="courses-category-container width flex flex-col justify-center items-start">
            @include('includes.partials.messages')
            <h1 class="text-2xl font-semibold mt-20">Checkout</h1>
            <div class="courses-category-wrapper flex flex-col lg:flex-row w-full sm:items-center lg:items-start">
                @if(count($cart) > 0)
                <div class="course-cart-wrapper w-full lg:w-8/12 xl:w-9/12 lg:mr-4 overflow-x-auto">
                    <div class="p-2 sm:p-4 bg-white border border-solid border-gray-200">
                        <form name="purchase_payment" id="purchase_payment" class="mt-4" method="POST" action="{{ route('frontend.course.checkout.pay') }}" publishable-key="{{ env('STRIPE_KEY') }}">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="p-2 md:p-4 relative block">
                                        Name On Card:
                                        <input type="text" name="bl_name" id="bl_name" required
                                            placeholder="Name on card ..."
                                            class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                    </label>
                                </div>
                                <div>
                                    <label for="bl_email" class="p-2 md:p-4 relative block">
                                        Email:
                                        <input type="text" name="bl_email" id="bl_email" required
                                            placeholder="Email ..."
                                            class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                    </label>
                                </div>
                                <div class="col-span-2">
                                    <label for="bl_phone" class="p-2 md:p-4 relative block">
                                        Phone no:
                                        <input type="text" name="bl_phone" id="bl_phone" required
                                            placeholder="Phone no ..."
                                            class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                    </label>
                                </div>

                                {{-- <div id="card-element"></div> --}}
                                <label for="number" class="p-2 md:p-4 relative block col-span-2">
                                    Card Number:
                                    <div
                                        class="card-number-input-wrapper flex border border-solid border-gray-200 mt-2 p-2 md:p-3 relative">
                                        <input type="text" required name="cardnumber"
                                            placeholder="Card number ..."
                                            class="w-11/12 focus:outline-none input-credit-card" />
                                        <div
                                            class="card-icon-wrapper inline bg-gray-100 w-max h-full absolute right-0 top-0 p-2 md:p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -mt-1"
                                                fill="none" viewBox="0 0 24 24" stroke="#333">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-expiry-detail-wrapper px-2 sm:px-4 mt-4 flex flex-col sm:flex-row">
                                <label for="card-expire-month" class="relative block w-full">
                                    Expiry Month:
                                    <select required
                                        class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none"
                                        name="month">
                                        <option selected>Please Select ...</option>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                </label>

                                <label for="card-expire-year"
                                    class="sm:px-4 relative block mt-4 sm:mt-0 w-full">
                                    Expiry Year:
                                    <select required
                                        class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none"
                                        name="year">
                                        <option selected>Please Select ...</option>
                                        @php
                                            $time = date('Y')
                                        @endphp
                                        @for ($i=0; $i < 10; $i++) { <option value="{{ (int)$time + (int)$i }}">
                                            {{ (int)$time + (int)$i }}</option>
                                        @endfor
                                    </select>
                                </label>

                                <label for="text" class="relative block mt-4 sm:mt-0 w-full">
                                    CVC:
                                    <input type="text" name="cvc" required placeholder="Enter CVC ..."
                                        class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                </label>
                            </div>

                            <div class="terms-acceptance-wrapper p-2 md:p-4 mt-4 leading-snug">
                                <label for="agree_terms_conditions"
                                    class="terms block relative flex items-center">
                                    <input type="checkbox" id="agree_terms_conditions" class="mr-2" />
                                    <span class="text-gray-500">I’ve read and accept the </span><span
                                        class="lite-blue-color">&nbsp;<a
                                            class="underline-anchors inline-flex relative overflow-hidden w-max"
                                            href="/terms-and-conditions">terms & conditions.</a></span>
                                </label>
                            </div>

                            <button type="submit" class="place-order-btn btn blue-btn inline-block overflow-hidden relative py-2 md:py-3 px-4 md:px-6 lite-blue-bg-color text-white overflow-hidden relative ml-4 mt-4 z-10">Purchase</button>
                        </form>
                    </div>
                </div>
                <div class="sm:w-6/12 lg:w-4/12 xl:w-3/12 mt-4 lg:mt-0">
                    <h3 class="text-xl font-semibold mb-2">{{ $cart->count() }} - @if($cart->count()>1){{ 'Courses' }} @else {{ 'Course' }} @endif in checkout</h3>
                    <div class="p-2 sm:p-4 bg-white border border-solid border-gray-200">
                        @php
                            $total_discount = 0;
                        @endphp
                        @foreach($cart as $key => $course_cart)
                        @php
                            $course = \App\Models\Course::find($course_cart->id);
                            $total_discount += $course->discount($course->id);
                        @endphp
                            <div class="flex flex-wrap bg-gray-100 border border-solid border-gray-200 p-2 mb-2">
                                <div style="flex: 2;">
                                    <h3 class="font-semibold">{{ $course->title }}</h3>
                                    <span class="text-sm">By {{ $course->instructor->name }}</span>
                                </div>
                                <div class="price font-semibold text-xs text-right" style="flex: 1;">
                                    <p class="text-blue-500 w-full">{{ '$'.number_format($course->price, 2) }}</p>
                                    @if($course->price_original)
                                        <span class="text-red-500">({{ number_format($course->discount($course->id),2).'% Off' }})</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="flex flex-wrap justify-between font-semibold mb-2 border-t border-solid pt-2 mt-2">
                            <h3 class="text-xl">Total</h3>
                            <p class="text-blue-500">{{ '$'.number_format($cart_subtotal, 2) }}</p>
                        </div>
                        @if($total_discount)
                            <div class="flex flex-wrap justify-between text-sm text-gray-500 mb-2">
                                <p>Discount</p>
                                <span class="text-red-500">({{ number_format($total_discount, 2) }}% Off)</span>
                            </div>
                        @endif
                        <button class="btn blue-btn lite-blue-bg-color text-white w-full px-6 py-3 h-auto relative overflow-hidden z-10 mt-4 sm:mt-0">checkout</button>
                    </div>
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
@push('after-scripts')
    <script src="/static/js/cleave.min.js"></script>
    <script>
        let creditCart = new Cleave('.input-credit-card', {
            creditCard: true,
        });
    </script>
@endpush