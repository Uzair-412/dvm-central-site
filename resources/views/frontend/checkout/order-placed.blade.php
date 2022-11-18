@extends('frontend.layouts.app')
@section('title', 'Order Placed')
@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
@endpush
@section('content')
<main id="thank-you-page" class="relative">
    <div class="thank-you-wrapper mt-20 width flex flex-col justify-center items-center text-center">
        <p class="text-gray-500"></p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" fill="none" viewBox="0 0 24 24" stroke="#418ffe">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <h1 class="text-3xl font-semibold">Thank you for your purchase.</h1>
        <p class="mt-4 text-gray-500 text-sm md:text-base px-2 sm:px-10">Great, We received your order and your order # is {{ $data['order']->id }}.</p>
        <p class="mt-2 text-gray-500 text-sm md:text-base px-2 sm:px-10">You will receive an order confirmation email with details of your order and a link to track it's progress.</p>

        <h3 class="text-xl font-semibold mt-6">Shipping Details</h3>
        <div class="grid grid-cols-3 mt-4 border border-solid border-gray-200 text-left bg-white text-xs sm:text-sm md:text-base sm-width" style="padding: 0;">
            <div class="grid grid-cols-3 col-span-3 w-full font-semibold">
                <div class="px-1 sm:px-4 py-2 border-b flex flex-wrap items-center justify-center sm:inline-block">Address</div>
                <div class="px-1 sm:px-4 py-2 border-b border-l border-solid border-gray-200 flex flex-wrap items-center justify-center sm:inline-block text-center sm:text-left">Shipping Service</div>
                <div class="px-1 sm:px-4 py-2 border-b border-l border-solid border-gray-200 flex flex-wrap items-center justify-center sm:inline-block">Charges</div>
            </div>
            <div class="flex flex-col px-1 sm:px-4 py-2 justify-center">
                <div class="address text-gray-500">
                    {{ $data['order']->address1 . ' ' . $data['order']->address2 }}
                    {{ $data['order']->city . ', ' . $data['order']->zip_code . ', ' . $data['state'] . ', ' . $data['country'] }}
                </div>
            </div>
            <div class="flex flex-col px-1 sm:px-4 py-2 border-l border-solid border-gray-200 justify-center">
                <div class="address text-gray-500">
                    {{ $data['order']->shipping_service }}
                </div>
            </div>
            <div class="flex flex-col px-1 sm:px-4 py-2 border-l border-solid border-gray-200 justify-center">
                <div><span class="inline-block text-gray-500">Sub Total:</span><span class="inline-block ml-1 font-semibold">${{ number_format($data['order']->sub_total, 2) }}</span></div>

                <div class="mt-1"><span class="inline-block text-gray-500">Discount:</span><span class="inline-block ml-1 font-semibold">${{ number_format($data['order']->discount, 2) }}</span></div>

                <div class="mt-1"><span class="inline-block text-gray-500">Shipping:</span><span class="inline-block ml-1 font-semibold">${{ number_format($data['order']->shipping_fee, 2) }}</span></div>

                <div class="mt-1"><span class="inline-block text-gray-500">Tax:</span><span class="inline-block ml-1 font-semibold">${{ number_format($data['order']->tax, 2) }}</span></div>

                @if($data['order']->engraving_charges > 0)
                    <div class="mt-1"><span class="inline-block text-gray-500">Custom Marking Charges:</span><span class="inline-block ml-1 font-semibold">${{ number_format($data['order']->engraving_charges, 2) }}</span></div>
                @endif

                <div class="mt-1"><span class="inline-block text-gray-500">Grand Total:</span><span class="inline-block ml-1 font-semibold">${{ number_format($data['order']->grand_total, 2) }}</span></div>
            </div>
        </div>
        <a href="/" class="mt-4 btn blue-btn relative overflow-hidden inline-block lite-blue-bg-color text-white py-2 px-4 md:py-3 md:px-6 z-10">Continue Shopping</a>

        <div class="interested-products mt-20 mb-12 width relative">
            <div class="interested-products relative flex items-center justify-between relative w-full">
                <div class="text-2xl font-semibold leading-none text-left mr-4">Products You Might Be Interested</div>

                <div class="swiper-buton-wrapper h-8 w-16 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-next" fill="none" viewBox="0 0 24 24" stroke="#418ffe">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-prev" fill="none" viewBox="0 0 24 24" stroke="#418ffe">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
            </div>
            @livewire('frontend.products.products-list',['products_list' => $data['same_products'], 'type'=> 'carousel'])
            {{-- <div class="interested-products-imgs-container swiper mySwiper mt-6 w-full">
                <div class="interested-products-img-wrapper swiper-wrapper w-full">
                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/3.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/4.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/5.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/6.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/1.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/2.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/3.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/4.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/5.jpg" alt="Realted Products" />
                        </a>
                    </div>

                    <div class="interested-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <a href="#" class="interested-product-img-wrapper overflow-hidden inline-block">
                            <img class="interested-product-img swiper-lazy" data-src="assets/imgs/top-categories/6.jpg" alt="Realted Products" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-scrollbar mt-4"></div> --}}
        </div>
    </div>
</main>
    @push('after-scripts')
        <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
		<script defer src="{{ asset('assets/js/thankyou.js') }}"></script>
        <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
        {{-- <script>
            fbq('track', 'Purchase', {value: {{ round($data['order']->grand_total, 2) }}, currency: 'USD'});
        </script> --}}
    @endpush
@endsection