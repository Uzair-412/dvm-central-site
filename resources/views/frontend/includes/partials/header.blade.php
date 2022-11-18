<!-- add to cart pop  -->
<div class="add-to-cart-pop-container fixed top-0 left-0 w-full h-screen z-50 flex justify-center items-center hidden opacity-0">
    <div class="add-to-cart-pop-wrapper flex flex-col justify-center items-center bg-white p-2 sm:p-6 w-9/12 lg:w-7/12 xl:w-6/12 relative opacity-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 right-2 cursor-pointer close-cart-popup"
            fill="none" viewBox="0 0 24 24" stroke="#777">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <div class="flex items-center mr-6 sm:mr-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="#418ffe">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <div class="add-to-cart-popup-msg text-gray-500 text-sm md:text-base leading-none">Product successfully
                added to shopping cart.</div>
        </div>
        <div
            class="add-to-cart-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row py-4 text-sm md:text-base">
            <a href="{{ route('frontend.cart.index') }}"
                class="view-shopping-cart btn blue-btn lite-blue-bg-color text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max text-center">
                View Shopping Cart </a>
            <button
                class="continue-shopping-btn btn bg-black black-btn text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Continue
                Shopping</button>
        </div>

        <div class="flex items-center justify-between relative w-full py-2 border-t border-solid border-gray-200">
            <div class="text-lg sm:text-xl font-semibold leading-none">Items You Might Like</div>

            <div class="swiper-buton-wrapper h-8 w-16">
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
        <div class="might-like-items-container swiper mySwiper w-full relative">
            <div class="might-like-items-wrapper mt-2 text-sm swiper-wrapper">
                <div
                    class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        <a href="#" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <img class="might-like-item-img swiper-lazy" data-src="assets/imgs/top-categories/1.jpg"
                                alt="Product" />
                        </a>
                    </div>

                    <a href="https://www.gervetusa.com/"
                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                    <a href="#" class="p-2">
                        <div class="might-like-item-title lite-blue-color leading-snug">Castroviejo Needle Holder
                            Tungsten Carbide Insert Jaws</div>
                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                    </a>
                </div>

                <div
                    class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        <a href="#" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <img class="might-like-item-img swiper-lazy" data-src="assets/imgs/top-categories/2.jpg"
                                alt="Product" />
                        </a>
                    </div>

                    <a href="https://www.gervetusa.com/"
                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                    <a href="#" class="p-2">
                        <div class="might-like-item-title lite-blue-color leading-snug">Castroviejo Needle Holder
                            Tungsten Carbide Insert Jaws</div>
                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                    </a>
                </div>

                <div
                    class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        <a href="#" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <img class="might-like-item-img swiper-lazy" data-src="assets/imgs/top-categories/3.jpg"
                                alt="Product" />
                        </a>
                    </div>

                    <a href="https://www.gervetusa.com/"
                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                    <a href="#" class="p-2">
                        <div class="might-like-item-title lite-blue-color leading-snug">Castroviejo Needle Holder
                            Tungsten Carbide Insert Jaws</div>
                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                    </a>
                </div>

                <div
                    class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        <a href="#" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <img class="might-like-item-img swiper-lazy" data-src="assets/imgs/top-categories/4.jpg"
                                alt="Product" />
                        </a>
                    </div>

                    <a href="https://www.gervetusa.com/"
                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                    <a href="#" class="p-2">
                        <div class="might-like-item-title lite-blue-color leading-snug">Castroviejo Needle Holder
                            Tungsten Carbide Insert Jaws</div>
                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                    </a>
                </div>

                <div
                    class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        <a href="#" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <img class="might-like-item-img swiper-lazy" data-src="assets/imgs/top-categories/5.jpg"
                                alt="Product" />
                        </a>
                    </div>

                    <a href="https://www.gervetusa.com/"
                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                    <a href="#" class="p-2">
                        <div class="might-like-item-title lite-blue-color leading-snug">Castroviejo Needle Holder
                            Tungsten Carbide Insert Jaws</div>
                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                    </a>
                </div>

                <div
                    class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        <a href="#" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <img class="might-like-item-img swiper-lazy" data-src="assets/imgs/top-categories/6.jpg"
                                alt="Product" />
                        </a>
                    </div>

                    <a href="https://www.gervetusa.com/"
                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                    <a href="#" class="p-2">
                        <div class="might-like-item-title lite-blue-color leading-snug">Castroviejo Needle Holder
                            Tungsten Carbide Insert Jaws</div>
                        <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                    </a>
                </div>
            </div>
        </div>

        <div class="swiper-scrollbar-1 w-full mt-4"></div>
    </div>
</div>

<!-- product detail modal -->
<div class="popup-product-container fixed top-0 left-0 w-full h-screen z-40 flex justify-center md:items-center hidden opacity-0 transition duration-300 ease-in-out">
    <div class="popup-product-outer-wrapper sm:w-9/12 md:w-8/12 xl:w-7/12 overflow-x-hidden my-8 overflow-x-hidden overflow-y-scroll lg:overflow-hidden opacity-0">
        <div class="popup-product-wrapper bg-white flex flex-col md:flex-row justify-between p-4 relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 popup-close-btn absolute top-2 right-2 cursor-pointer" fill="none" viewBox="0 0 24 24"
                stroke="#333">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <div class="popup-product-inner-wrapper flex flex-col md:w-5/12" id="product_detail_model_imgs">
                <img class="popup-product h-auto w-full popup-main-img"
                    data-src="assets/imgs/product-page-product-gallery/p-1.jpg" alt="Product Large Image" />
                <div class="product-img-gallary-wrapper grid grid-cols-5 md:grid-cols-6 gap-4">
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-1.jpg" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-2.jpg" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-3.webp" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-4.jpg" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-5.webp" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-6.jpg" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-7.jpg" alt="Product Gallery" />
                    <img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img"
                        data-src="assets/imgs/product-page-product-gallery/p-8.jpg" alt="Product Gallery" />
                </div>
            </div>

            <div class="navigation__right">
                <ul class="menu">
                </ul>
                <ul class="navigation__extra">
                    <li><a href="{{route('frontend.seller.index')}}" aria-label="Sell on DVM Central">Sell on {{ appName() }}!</a></li>
                    <li><a href="{{route('frontend.pet_of_the_month')}}" aria-label="Sell on DVM Central">Pet of The Month</a></li>
                    <li class="dropdown">
                        <a href="{{route('frontend.resources.index')}}" aria-label="Sell on DVM Central">Vet Resources</a>
                        <ul>
                            <li><a href="{{ route('frontend.resources.news') }}">News Feeds</a></li>
                            <li><a href="{{ route('frontend.resources.programs') }}">Educational Programs</a></li>
                            <li><a href="{{ route('frontend.resources.online-resources') }}">Online Resources</a></li>
                            <li><a href="{{ route('frontend.resources.associations') }}">Associations</a></li>
                            <li><a href="{{ route('frontend.resources.surgical-procedures') }}">Surgical Procedures</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('products/today-deals')}}" aria-label="Today's Deals">Today's Deals</a></li>
                    <li><a href="{{ route('frontend.track-your-order') }}" aria-label="Track Your Order">Track Your Order</a></li>
                    {{-- <li><a href="#">Customer Service</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- nav cart container-->
<div
    class="cart-container bg-gray-100 fixed top-0 right-0 w-screen h-screen z-50 flex justify-end hidden opacity-0 transition duration-300 ease-in-out">
    <div class="cart-container-wrapper bg-white shadow-lg relative bg-white transition duration-300 ease-in-out">
        <div class="cart-container-inner-wrapper flex flex-col w-full overflow-x-hidden overflow-y-scroll">
            <div class="cart-items-container h-full">
                <h2
                    class="text-2xl font-semibold p-2 sm:p-4 border-b border-gray-300 border-solid flex justify-between items-center">
                    <span>Cart</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer cart-close-btn transition-all duration-300 ease-in-out" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </h2>
                <div id="cart-items-header"></div>
            </div>
        </div>
        <div
            class="subtotal-detail-wrapper bg-white border-t border-solid border-gray-300 w-full p-2 sm:p-4 relative flex flex-col justify-center">
            <h3 class="text-lg flex justify-between items-center font-semibold">
                <span>Subtotal</span>
                <span class="text-red-600 mini-cart-total">$299.99</span>
            </h3>
            <div class="cart-cont-btn-wrapper flex justify-between mt-2 sm:mt-4">
                <a href="{{ route('frontend.cart.index') }}" class="btn blue-btn relative overflow-hidden lite-blue-bg-color text-white px-4 py-2 z-10 mr-2">
                    View Cart </a>

                <a href="{{ route('frontend.checkout') }}" class="btn black-btn bg-black relative overflow-hidden text-white px-4 py-2 z-10"> Checkout
                </a>
            </div>
        </div>
    </div>
</div>

<!-- shop by departments nav links -->
<div class="nav-backdrop fixed top-0 left-0 w-screen h-screen overflow-x-hidden overflow-y-scroll z-50 hidden">
    <nav
        class="left-nav fixed top-0 left-0 overflow-x-hidden overflow-y-scroll transition duration-300 ease-in-out h-full bg-white">
        <div class="hello p-2 flex justify-center items-center nav-heading text-xl font-semibold relative">
            <a href="#" class="w-full flex text-white items-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="left-nav-user-status mr-2 w-10 h-10"
                        viewBox="0 0 20 20" fill="#fff">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span>Hello,</span>
                <span class="user-status">Sign in</span>
            </a>
            <svg xmlns="http://www.w3.org/2000/svg"
                class="left-nav-close-icon absolute cursor-pointer w-6 h-6 top-4 right-2 transition-all duration-300 ease-in-out" fill="none" stroke="#fff"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <div class="left-main-nav w-full bg-white">
            <ul class="main-nav-list-container">
                @foreach($menu_categories as $key => $mc)
                    @if(!empty($mc['child_categories']) && count($mc['child_categories']) > 0)
                        <li class="main-nav-list-wrapper border-b border-solid border-gray-300 accordion-list h-auto accordion-wrapper">
                            <div
                                class="main-nav-list cursor-pointer flex justify-between items-center accordion-opener nav-hover hover:bg-gray-100 transition duration-300 ease-in-out">
                                <div class="nav-heading text-xl font-semibold business-type p-3 inline-block">{{ $mc['name'] }}</div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="nav-arrow-icon w-6 h-6 inline open-icon transition duration-300 ease-in-out mx-2 mr-3" fill="none"
                                    viewBox="0 0 24 24" stroke="#999">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <ul class="bussiness-type-sub-menu-wrapper links-hider h-full overflow-hidden">
                                @foreach($mc['child_categories'] as $child)
                                    @if(!empty($child['child_categories']) && count($child['child_categories']) > 0)
                                        <li class="sub-menu-wrapper">
                                            <div
                                                class="nav-sub-heading text-base text-gray-500 cursor-pointer sub-business-type has-sub-menu flex justify-between w-full px-3 py-2 pl-5 nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                                <span>{{ $child->name }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="nav-arrow-right-icon w-6 h-6 open-icon transition duration-300 ease-in-out ml-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="#999">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg>
                                            </div>
                                            <ul
                                                class="sub-links-hider fixed bottom-0 left-0 h-screen w-full bg-white overflow-x-hidden overflow-y-scroll z-30 transition duration-300 ease-in-out">
                                                <div
                                                    class="back-to-menu transition duration-300 ease-in-out hover:bg-gray-200 flex items-center p-3 border-b border-solid border-gray-300 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="nav-arrow-icon w-6 h-6 inline mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="#999">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                    </svg>
                                                    <span>Main Menu</span>
                                                </div>
                                                @foreach($child['child_categories'] as $subChild)
                                                    <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                                        <a href="{{ $subChild['slug'] }}" class="block px-3 py-2">{{ $subChild['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                            <a class="nav-sub-heading text-base text-gray-500 cursor-pointer sub-business-type flex justify-between w-full px-3 py-2 pl-5"
                                                href="{{ $child['slug'] }}">
                                                <span>{{ $child['name'] }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="main-nav-list-wrapper border-b border-solid border-gray-300">
                            <a href="{{ $mc['slug'] }}" class="nav-heading text-xl font-semibold business-type p-3 block nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">{{ $mc['name'] }}</a>
                        </li>
                    @endif
                @endforeach
                <ul class="help-container bg-white">
                    <li class="nav-heading text-xl font-semibold p-3">Help & Settings</li>
                    <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                        <a href="@if(\App\Models\Customer::logged_in()) /dashboard @else /login @endif" class="block py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer">Your Account</a>
                    </li>
                    @php
                        $zip = '';
                        $city = '';
                        $country = 'United State';
                        if(Session::has('ses_shipping_details'))
                        {
                            $zip = isset(Session::get('ses_shipping_details')['zip']) ? Session::get('ses_shipping_details')['zip'] : '';
                            $city= isset(Session::get('ses_shipping_details')['city']) ? Session::get('ses_shipping_details')['city'] : '';
                            $country = Session::get('ses_shipping_details')['country'];
                        }
                    @endphp
                    <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                        <a href="#" class="py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer flex items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="nav-help-icon w-6 h-6 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="#999">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <span class="nav-language">Delivery Address</span></a>
                    </li>
                    <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                        <a href="#" class="py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer flex items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="nav-help-icon w-6 h-6 mr-2" fill="none"
                                    stroke="#999" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </span>
                            <span class="nav-language">">@if(Session::has('ses_shipping_details')) @if($city!='') {{ $city }}, @endif @if($zip!='') {{ $zip }}, @endif {{
                            $country }} @else United States @endif</span></a>
                    </li>
                    <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                        <a href="#"
                            class="block py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer">Customer
                            Service</a>
                    </li>
                    <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                        <a href="/login" class="block py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer">Sign
                            In</a>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>
</div>

<!-- header will scroll down on scroll otherwise remains hidden -->
<header class="bg-gray-100 hidden-header hidden sm:block fixed top-0 z-30 w-full border-b border-solid border-gray-300">
    <div class="header-container flex justify-between items-center width py-2">
        <div class="shop-by-container hidden xl:block">
            <div class="shop-by-wrapper nav cursor-pointer flex items-center border border-gray-300 border-solid p-3">
                <ul class="hamburger mr-0 sm:mr-4">
                    <li class="first"></li>
                    <li class="second"></li>
                    <li class="third"></li>
                </ul>
                <div class="n-c primary-black-color font-semibold hidden sm:block">Shop By Department</div>
            </div>
        </div>
        <div class="scrollable-nav-logo block xl:hidden w-max">
            <div class="first-logo logo flex items-center">
                <a href="/" class="cursor-pointer"> <img src="assets/icons/logo.svg" alt="GerDentUSA" /> </a>
            </div>
        </div>

    </div>
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="/" aria-label="Home Link"><img class="lazyload" data-src="{{ asset('static/img/vet-and-tech-logo-white.png') }}" alt="{{ appName() }}" width="150"></a></div>
        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i class="mini-cart-count">0</i></span></a>
                    <div class="ps-cart__content">
                        {{-- <div class="ps-cart__items">
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img class="lazyload" data-src="static/img/products/clothing/7.jpg" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>

                                </div>
                                <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                    </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                    Multiple SKUs, Click for Details</div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                    </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                    Multiple SKUs, Click for Details</div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                    </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                    Multiple SKUs, Click for Details</div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                    </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                    <a href="#"
                        class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                        <div class="flex items-center">
                            <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                            </div>
                            <div class="search-result-item-detail flex flex-col">
                                <div class="search-result-item-title font-semibold">
                                    Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                </div>
                                <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                    Multiple SKUs, Click for Details</div>
                            </div>
                        </div>
                        <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                    </a>

                </div>
            </div>

        </div>

        <div class="header-icons-wrapper flex justify-end items-center w-max">
            <!-- compare icon -->
            <a href="{{url('/compare')}}"
                class="nav-compare-icon-wrapper relative mr-2 rounded-full p-1.5 transition duration-300 ease-in-out hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-compare-icon" fill="none" viewBox="0 0 24 24"
                    stroke="#666">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </a>

            <!-- whishlist icon -->
            <a href="{{route('frontend.user.wishlist.index')}}"
                class="nav-whishlist-icon-wrapper relative mr-2 rounded-full p-1 transition duration-300 ease-in-out hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 nav-whishlist-icon" fill="none"
                    viewBox="0 0 24 24" stroke="#333">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <div class="whishlist-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute bottom-0 right-0 text-xs text-center text-white">
                    @auth
                        @php
                        $id = Auth::user()->id;
                        $data = DB::table('wishlists')->where('customer_id', $id)->where('status', '1')->count();
                        @endphp
                    {{ ($data != NULL ? $data : '0') }}
                    @endauth
                    @guest
                    0
                    @endguest
                </div>
            </a>

            <!-- cart-icon -->
            <div
                class="nav-cart-icon-wrapper relative mr-2 rounded-full p-1 hidden xl:block transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 nav-cart-icon" fill="none" viewBox="0 0 24 24"
                    stroke="#333">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <div
                    class="cart-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute bottom-0 right-0 text-xs text-center text-white mini-cart-count">
                    0</div>
            </div>

            <!-- login-icon -->
            <a href="@if(\App\Models\Customer::logged_in()) {{route('frontend.user.dashboard')}} @elseif(\App\Models\Customer::admin_check()) /admin/dashboard @else /login @endif"
                class="nav-login-icon-wrapper relative flex justify-center items-center h-10 w-10 rounded-full transition duration-300 ease-in-out hover:bg-gray-200">
                <img class="h-10 w-10 nav-login-icon rounded-full" src="/assets/icons/login.png" alt="Login" />
            </a>
        </div>
    </div>
</header>

<!-- header that will scroll with the entire page -->
<header class="bg-gray-100 relative">
    <div class="header-container border-b border-solid border-gray-300">
        <div class="header-wrapper flex justify-between items-center width sm:gap-12">
            <div class="first-logo logo flex items-center">
                <a href="/" class="cursor-pointer w-max h-full"> <img src="{{ asset('static/img/vet-and-tech-logo.png') }}" alt="{{ appName() }}" />
                </a>
            </div>
            <!-- nav search bar -->
            <div class="input-container w-full hidden xl:block mx-8 relative">
                <div
                    class="header-input-bg fixed w-screen h-screen top-0 left-0 z-30 hidden opacity-0 transition duration-500 ease-in-out">
                </div>
                <div
                    class="input-wrapper flex items-center relative z-40 border border-solid border-gray-300 overflow-hidden">
                    <input type="search" placeholder="I am shopping for ..."
                        class="desktop-search-bar p-3 focus:outline-none text-gray-500 w-full h-auto" />
                    <button
                        class="btn blue-btn px-6 py-3 w-max lite-blue-bg-color text-white relative overflow-hidden h-full z-10">Search</button>
                </div>

                <!-- search results -->
                <div class="search-results-container desk-search-resutls-container absolute top-auto left-0 w-full h-auto border border-solid border-gray-200 bg-white z-30 hidden opacity-0 transition-all duration-300 ease-in-out overflow-y-scroll">
                    <div class="search-results-wrapper w-full">
                        <a href="#" class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                        </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                        Multiple SKUs, Click for Details</div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                        </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                        Multiple SKUs, Click for Details</div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                        </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                        Multiple SKUs, Click for Details</div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU :
                                        </span><strong class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                        <a href="#"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="assets/imgs/search-result-item-imgx80.jpg" alt="Search Result">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        Atraumatic Extraction Forceps Set of 2 Upper and Lower
                                    </div>
                                    <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                        Multiple SKUs, Click for Details</div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">$104.72</div>
                        </a>

                    </div>
                </div>

            </div>
            <div class="header-icons-wrapper flex justify-end xl:justify-end items-center w-max">
                <!-- compare icon -->
                <a href="{{url('/compare')}}" class="nav-compare-icon-wrapper relative mr-2 rounded-full p-1.5 transition duration-300 ease-in-out hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-compare-icon" fill="none"
                        viewBox="0 0 24 24" stroke="#666">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </a>

                <!-- whishlist icon -->
                <a href="{{route('frontend.user.wishlist.index')}}"
                    class="nav-whishlist-icon-wrapper relative mr-2 rounded-full p-1 transition duration-300 ease-in-out hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 nav-whishlist-icon" fill="none"
                        viewBox="0 0 24 24" stroke="#333">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <div class="whishlist-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute bottom-0 right-0 text-xs text-center text-white">
                        @auth
                            @php
                                $id = Auth::user()->id;
                                $data = DB::table('wishlists')->where('customer_id', $id)->where('status', '1')->count();
                            @endphp
                                {{ ($data != NULL ? $data : '0') }}
                            @endauth
                        @guest
                            0
                        @endguest
                    </div>
                </a>

                <!-- cart-icon -->
                <div
                    class="nav-cart-icon-wrapper relative mr-2 rounded-full p-1 hidden xl:block transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 nav-cart-icon" fill="none"
                        viewBox="0 0 24 24" stroke="#333">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <div class="cart-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute bottom-0 right-0 text-xs text-center text-white mini-cart-count">0</div>
                </div>

                <!-- login-icon -->
                <a href="@if(\App\Models\Customer::logged_in()) {{route('frontend.user.dashboard')}} @elseif(\App\Models\Customer::admin_check()) /admin/dashboard @else /login @endif" class="nav-login-icon-wrapper relative flex justify-center items-center h-10 w-10 rounded-full transition duration-300 ease-in-out hover:bg-gray-200">
                    <img class="h-10 w-10 nav-login-icon rounded-full" src="/assets/icons/login.png" alt="Login" />
                </a>
            </div>
        </div>
    </div>

    <!-- small bar below main navigation -->
    <div class="small-header-container primary-black-bg hidden xl:block">
        <div class="small-header-wrapper width flex justify-between items-center">
            <div class="shop-by-wrapper flex items-center p-2 cursor-pointer">
                <ul class="hamburger mr-0 sm:mr-4">
                    <li class="first"></li>
                    <li class="second"></li>
                    <li class="third"></li>
                </ul>
                <div class="n-c text-white hidden sm:block">Shop By Department</div>
            </div>

            <div class="small-header-right-wrapper text-white flex justify-between text-sm">
                <a href="{{route('frontend.seller.index')}}"
                    class="underline-links relative overflow-hidden border-l border-r border-solid px-4"> Sell on {{ appName() }} </a>
                <a href="{{route('frontend.pet_of_the_month')}}" class="underline-links relative overflow-hidden border-r border-solid px-4"> Pet of The Month </a>
                <a href="{{route('frontend.resources.index')}}" class="underline-links relative overflow-hidden border-r border-solid px-4"> Vet Resources 
                    {{-- <ul>
                        <li><a href="{{ route('frontend.resources.news') }}">News Feeds</a></li>
                        <li><a href="{{ route('frontend.resources.programs') }}">Educational Programs</a></li>
                        <li><a href="{{ route('frontend.resources.online-resources') }}">Online Resources</a></li>
                        <li><a href="{{ route('frontend.resources.associations') }}">Associations</a></li>
                    </ul> --}}
                </a>
                <a href="{{url('products/today-deals')}}" class="underline-links relative overflow-hidden border-r border-solid px-4"> Today's Deals </a>
                <a href="{{ route('frontend.track-your-order') }}" class="underline-links relative overflow-hidden border-r border-solid px-4"> Track Your Order </a>
            </div>
        </div>
    </div>
</header>

<!-- bottom navigation for below 1280 -->

<header class="nav-bottom-bar-container w-full overflow-hidden fixed bottom-0 left-0 bg-gray-100 z-30 block xl:hidden border-t border-solid border-gray-200">
    <div class="nav-bottom-bar-wrapper width overflow-hidden">
        <div class="bottom nav-icons flex justify-between sm:justify-center items-center py-2 w-auto h-full">
            <div class="page-navigation-icon-wrapper relative sm:mr-12 flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 sm:h-8 h-6 w-6 sm:w-8 page-navigation-icon cursor-pointer" fill="none"
                    viewBox="0 0 24 24" stroke="#333">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span>Menu</span>
            </div>
            <div class="nav-category-icon-wrapper relative sm:mr-12 flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 sm:h-8 h-6 w-6 sm:w-8 nav-category-icon cursor-pointer" fill="none"
                    viewBox="0 0 24 24" stroke="#333">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <span>Categories</span>
            </div>
            <div class="nav-search-icon-wrapper relative sm:mr-12 flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 sm:h-8 h-6 w-6 sm:w-8 cursor-pointer nav-search-icon" fill="none" viewBox="0 0 24 24"
                    stroke="#333">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span>Search</span>
            </div>
            <div class="nav-cart-icon-wrapper relative flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 h-6 w-6 sm:w-8 nav-cart-icon" fill="none"
                    viewBox="0 0 24 24" stroke="#333">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>Cart</span>
                <div class="cart-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute -top-1 -left-2 sm:left-auto sm:-right-2 text-xs text-center text-white mini-cart-count">0</div>
            </div>
        </div>
    </div>
</header>

<!-- mob search -->
<div class="mob-search-container input-container fixed top-0 left-0 z-50 w-screen h-screen hidden opacity-0 transition duration-300 ease-in-out">
    <div class="mob-search-wrapper relative w-full h-screen bg-white transition duration-300 ease-in-out">
        <h3 class="text-xl primary-black-bg p-4 text-white flex justify-between">
            <span>Search Something!</span><span><svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 mob-search-close-btn cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="#fff">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </h3>
        <div class="input-wrapper flex items-center relative z-20 border-b border-solid border-gray-300 relative">
            <input type="search" placeholder="I am shopping for ..."
                class="mob-search-bar p-3 focus:outline-none text-gray-500 w-full h-auto" />
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-10 w-10 absolute right-0 cursor-pointer p-1 lite-blue-bg-color h-full" fill="none"
                viewBox="0 0 26 26" stroke="#fff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>


        </div>

        <!-- search results -->
        <div
            class="search-results-container mob-search-resutls-container text-sm absolute top-auto left-0 w-full h-auto border border-solid border-gray-200 bg-white z-30 hidden opacity-0 transition-all duration-300 ease-in-out overflow-y-scroll">
            <div class="search-results-wrapper w-full h-full">
                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU : </span><strong
                                    class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">Multiple
                                SKUs, Click for Details</div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU : </span><strong
                                    class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">Multiple
                                SKUs, Click for Details</div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU : </span><strong
                                    class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">Multiple
                                SKUs, Click for Details</div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-sku text-sm"><span class="text-gray-500">SKU : </span><strong
                                    class="sku ml-2 lite-blue-color">GD50-3485</strong></div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

                <a href="#"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="flex items-center mr-2">
                        <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                            <img src="assets/imgs/search-result-item-imgx60.jpg" alt="Search Result">
                        </div>
                        <div class="search-result-item-detail flex flex-col">
                            <div class="search-result-item-title font-semibold">
                                Atraumatic Extraction Forceps Set of 2 Upper and Lower
                            </div>
                            <div class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">Multiple
                                SKUs, Click for Details</div>
                        </div>
                    </div>
                    <div class="search-result-item-price font-semibold">$104.72</div>
                </a>

            </div>
        </div>
    </div>
</div>

<!-- mob page navigation like home - about etc -->
<div class="page-navigation-container fixed top-0 left-0 z-50 w-screen h-screen transition hidden opacity-0 duration-300 ease-in-out overflow-x-hidden lg:overflow:hidden overflow-y-scroll lg:overflow:hidden">
    <div class="page-navigation-wrapper relative h-screen bg-white transition duration-300 ease-in-out">
        <h3 class="text-xl primary-black-bg p-4 text-white flex justify-between">
            <span>Menu</span>
            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 page-navigation-close-btn cursor-pointer"
                    fill="none" viewBox="0 0 24 24" stroke="#fff">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </h3>

        <ul>
            <li class="border-b border-solid border-gray-300 mt-6 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="/">Home</a>
            </li>
        </ul>

        <ul class="grid grid-cols-1 gap-3 bg-white">
            <li class="border-b border-solid border-gray-300 py-4 pl-6">
                <div class="font-semibold text-xl">About</div>
            </li>
            <li class="border-b border-solid border-gray-300 mt-2 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.pages', ['about-us']) }}">About Us</a>
            </li>
            <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.pages', ['our-mission']) }}">Our Mission</a>
            </li>
            <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.pages', ['warranty']) }}">Warranty</a>
            </li>
            <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.pages', ['repairs']) }}">Repairs</a>
            </li>
            <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.contact') }}">Contact Us</a>
            </li>
        </ul>

        <ul class="grid grid-cols-1 gap-3 bg-white">
            <li class="border-b border-solid border-gray-300 py-4 pl-6">
                <div class="font-semibold text-xl">Media</div>
            </li>
            <li class="border-b border-solid border-gray-300 mt-2 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.downloads') }}">Downloads</a>
            </li>
            <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.shows') }}">Virtual Trade Shows</a>
            </li>
            {{-- <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.videos') }}">Videos</a>
            </li> --}}
            <li class="border-b border-solid border-gray-300 pl-12">
                <a class="underline-links relative inline-block w-max overflow-hidden pb-1" href="{{ route('frontend.blog') }}">Blogs</a>
            </li>
        </ul>
    </div>
</div>


{{-- <div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li><a href="/">Home</a></li>
            <li class="menu-item-has-children has-mega-menu">

                <h4><a href="#">Information</a></h4>
                {{-- <span class="sub-toggle"></span> --}}
                {{-- <div class="mega-menu"> --}}
                    {{-- <div class="mega-menu__column"> --}}
                        {{-- <h4>About Us<span class="sub-toggle"></span></h4> --}}
                        {{-- <ul class="mega-menu__list"> --}}
                        <li><a aria-label="About Us" href="{{ route('frontend.pages', ['about-us']) }}">About Us</a></li>
                        <li><a aria-label="Our Mission" href="{{ route('frontend.pages', ['our-mission']) }}">Our Mission</a></li>
                        <li><a aria-label="Trade Shows" href="">Trade Shows</a></li>
                        <li><a aria-label="FAQs" href="{{ route('frontend.faqs') }}">FAQs</a></li>
                        <li><a aria-label="Privacy Policy" href="{{ route('frontend.privacy-policy']) }}">Privacy Policy</a></li>
                        <li><a aria-label="Terms & Conditions" href="{{ route('frontend.terms-and-conditions']) }}">Terms & Conditions</a></li>
                        <li><a aria-label="Contact Us" href="{{ route('frontend.contact') }}">Contact Us</a></li>
                        {{-- </ul> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            </li>
            <li class="menu-item-has-children has-mega-menu">
                <h4><a href="#" aria-label="Media">Media</a></h4>
                <li><a aria-label="Warranty" href="{{ route('frontend.resources.news') }}">News Feeds</a></li>
                <li><a aria-label="Warranty" href="{{ route('frontend.resources.programs') }}">Educational Programs</a></li>
                <li><a aria-label="Warranty" href="{{ route('frontend.resources.online-resources') }}">Online Resources</a></li>
                <li><a aria-label="Warranty" href="{{ route('frontend.resources.associations') }}">Associations</a></li>
                <li><a aria-label="Warranty" href="{{ route('frontend.resources.surgical-procedures') }}">Surgical Procedures</a></li>
                <li><a aria-label="Warranty" href="{{ route('frontend.shows') }}">Events / Trade Shows</a></li>
            </li>
            <li class="menu-item-has-children has-mega-menu">
                <h4><a href="#" aria-label="Media">Resources</a></h4>
                {{-- <span class="sub-toggle"></span> --}}
                {{-- <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Media<span class="sub-toggle"></span></h4> --}}
                        {{-- <ul class="mega-menu__list"> --}}
                            <li><a href="{{ route('frontend.downloads') }}" aria-label="Downloads">Downloads</a></li>
                            {{-- <li><a href="{{ route('frontend.videos') }}" aria-label="Videos">Videos</a></li> --}}
                        {{-- </ul>
                    </div>
                </div> --}}
            </li>
            <li><a href="{{ route('frontend.blog') }}" aria-label="Blog">Blog</a></li>
        </ul>
    </div>
</div> --}}
{{-- @include('frontend.includes.partials._calculate-shipping-form') --}}
@push('after-scripts')
    <script>
        // $('.shipping-calculate').click(function() {
        //     $('#modal_calculate_shipping_form').modal('show');
        // })
    </script>
@endpush
