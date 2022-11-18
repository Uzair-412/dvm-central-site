<!-- add to cart pop  -->
<div
    class="add-to-cart-pop-container fixed top-0 left-0 w-full h-screen z-50 flex justify-center items-center @if(!$isShowMessageForAddToCart){{'hidden opacity-0'}}@endif">
    <div
        class="add-to-cart-pop-wrapper flex flex-col justify-center items-center bg-white p-2 sm:p-6 w-9/12 lg:w-7/12 xl:w-6/12 relative @if(!$isShowMessageForAddToCart){{'opacity-0'}}@endif">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 right-2 cursor-pointer close-cart-popup"
            fill="none" viewBox="0 0 24 24" stroke="#777" wire:click="closeMessageForAddToCart">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <div class="flex items-center mr-6 sm:mr-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="#418ffe">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <div class="add-to-cart-popup-msg text-gray-500 text-sm md:text-base leading-none">Product successfully added to shopping cart.</div>
        </div>
        <div
            class="add-to-cart-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row py-4 text-sm md:text-base">
            <a href="{{ route('frontend.cart.index') }}"
                class="view-shopping-cart btn blue-btn lite-blue-bg-color text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max text-center">
                View Shopping Cart </a>
            <button type="button"
                class="continue-shopping-btn btn bg-black black-btn text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0" wire:click="closeMessageForAddToCart">Continue
                Shopping</button>
        </div>
            <div class="flex items-center justify-between relative w-full py-2 border-t border-solid border-gray-200 @if(count($same_products) == 0){{'hidden'}}@endif"
                id="items-you-might-like-in-popup">
                <div class="text-lg sm:text-xl font-semibold leading-none">Items You Might Like</div>

                <div class="swiper-buton-wrapper h-8 w-16 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-next" fill="none"
                        viewBox="0 0 24 24" stroke="#418ffe">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-prev" fill="none"
                        viewBox="0 0 24 24" stroke="#418ffe">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
            </div>
            
            <div class="might-like-items-container swiper mySwiper w-full relative @if(count($same_products) == 0){{'hidden'}}@endif">
                <div class="might-like-items-wrapper mt-2 text-sm swiper-wrapper">
                    @if(count($same_products) > 0)
                        @foreach($same_products as $key => $product)
                            @php
                                $img_path = 'up_data/products/images/thumbnails/' . $product->image;
                                $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                                $url = $product->slug;
                                if ($product->type == 'child' && $product->show_individual == 'N') {
                                    $url = $product->getParentSlug($product->id) . '#' . $product->sku;
                                } else if ($product->show_individual == 'Y' && $product->link_type == 'variation') {
                                    $url = $product->getParentSlug($product->id) . '#' . $product->sku;
                                }
                                $caption = '';
                                if ($product->new == 'Y')
                                    $caption = 'New!';
                                else if ($product->hot == 'Y')
                                    $caption = 'Hot!';
                                else if ($product->featured == 'Y')
                                    $caption = 'Featured!';
                                else if ($product->deals_of_the_day == 'Y')
                                    $caption = 'Deals Of The Day!';
                                else if ($product->related_products == 'Y')
                                    $caption = 'Deals Of The Day!';

                                if ($product->on_sale)
                                    $caption = 'Sale!';
                            @endphp
                            <div class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white"
                                id="item_0">
                                <span
                                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span
                                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span
                                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span
                                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                                <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                                    <a href="{{$url}}" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                        <img class="might-like-item-img swiper-lazy" src="{{url($path)}}" data-src="{{url($path)}}"
                                            alt="Product" />
                                    </a>
                                </div>
                                <a href="{{@$product->vendor->slug}}"
                                    class="sold-by mx-2 py-2 border-b border-solid border-gray-200">{{@$product->vendor->name}}</a>
                                <a href="{{$url}}" class="p-2">
                                    <div class="might-like-item-title lite-blue-color leading-snug">{{$product->name}}</div>
                                    @if($product->type != "variation")
                                        <div class="hs-price font-semibold mt-1 text-lg">${{number_format($product->price,2)}}</div>
                                    @else
                                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                                    @endif
                                    
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="swiper-scrollbar-1 w-full mt-4"></div>
    </div>
    <script>
        window.addEventListener('addedInCart', function(e){
            // add to cart popup carasoul
            document.querySelector('.add-to-cart-popup-msg').innerHTML = e.detail.message;
            var swiper2 = new Swiper('.might-like-items-container', {
                slidesPerView: 1,
                spaceBetween: 20,
                grabCursor: true,
                freeMode: true,
                preloadImages: false,
                lazy: true,
                watchSlidesProgress: true,
                speed: 1500,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                scrollbar: {
                    el: '.swiper-scrollbar-1',
                    hide: false
                },
                breakpoints: {
                    641: {
                        slidesPerView: 2,
                        slidesPerGroup: 2
                    },
                    769: {
                        slidesPerView: 3,
                        slidesPerGroup: 2
                    },
                    1025: {
                        slidesPerView: 3,
                        slidesPerGroup: 2
                    },
                    1441: {
                        slidesPerView: 4,
                        slidesPerGroup: 2
                    }
                }
            });
        });
    </script>
</div>