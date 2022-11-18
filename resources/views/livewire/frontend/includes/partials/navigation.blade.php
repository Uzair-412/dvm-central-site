<div>
    @include('frontend.includes.popups')
    <!-- product detail modal -->
    <div class="popup-product-container fixed top-0 left-0 w-full h-screen z-40 flex justify-center md:items-center hidden opacity-0 transition duration-300 ease-in-out">
        <div
            class="popup-product-outer-wrapper sm:w-9/12 md:w-8/12 xl:w-7/12 overflow-x-hidden my-8 overflow-x-hidden overflow-y-scroll lg:overflow-hidden opacity-0">
            <div class="popup-product-wrapper bg-white flex flex-col md:flex-row justify-between p-4 relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 popup-close-btn absolute top-2 right-2 cursor-pointer" fill="none"
                    viewBox="0 0 24 24" stroke="#333">
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
                <div class="product-img-gallery mt-4 w-full md:w-6/12">
                    <div class="gallery-product-title text-xl py-4 border-b border-solid border-gray-200 font-semibold primary-black-color"
                        id="product_detail_model_title"></div>
                    <div class="popup-product-price flex items-center mt-2">
                        <span class="lite-blue-color font-semibold text-xl" id="product_detail_model_price">$399</span>
                        <span class="text-red-400 text-sm mx-2 line-through"
                            id="product_detail_model_del">$799.98</span><span
                            id="product_detail_model_discount">(-50.00%)</span>
                    </div>
                    <div class="flex items-center mt-2">
                        <span class="text-gray-500">Sold By : </span>
                        <strong class="underline-anchors relative overflow-hidden inline-block ml-1" id="sold_by_name">
                            <a href="" rel="noopener" rel="noreferrer"
                                class="sold-by">GerVetUSA</a>
                        </strong>
                    </div>
                    <div class="mt-2"><span class="text-gray-500">SKU: </span> <strong class="pop-up-product-sku"
                            id="sku_code">G13-344</strong></div>
                    <p class="text-gray-500 leading-normal pop-product-description py-4 text-sm md:text-base"
                        id="desc">
                        Balfour Abdominal Retractor Self-Retaining is used to hold tissues apart and lock it in a place.
                        This adjustable instrument allows user to use it by adjusting size instead of buying separate
                        sizes.
                        This is commonly used in laparotomy
                        surgeries of the animals.
                    </p>
                    <form class="frm_add_to_cart" method="post" action="cart">
                        <input type="hidden" name="user_id" value="{{auth()->user() ? auth()->user()->id : ''}}" />
                        <div id="product_form">
                        </div>
                        {{-- Product details --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- nav cart container-->
    <div
        class="cart-container bg-gray-100 fixed top-0 right-0 w-screen h-screen z-50 flex justify-end hidden opacity-0 transition duration-300 ease-in-out">
        <div class="cart-container-wrapper bg-white shadow-lg relative bg-white transition duration-300 ease-in-out">
            @livewire('frontend.includes.partials.mini-cart-list')
        </div>
    </div>

    <!-- shop by departments nav links -->
    <div class="nav-backdrop fixed top-0 left-0 w-screen h-screen overflow-x-hidden overflow-y-scroll z-50 hidden">
        <nav
            class="left-nav fixed top-0 left-0 overflow-x-hidden overflow-y-scroll transition duration-300 ease-in-out h-full bg-white">
            <div class="hello p-2 flex justify-center items-center nav-heading text-xl font-semibold relative">
                <a class="cursor-pointer w-full flex text-white items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="left-nav-user-status mr-2 w-10 h-10"
                            viewBox="0 0 20 20" fill="#fff">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span>Hello,</span>
                    @if (@auth()->user()->name)
                        <span class="user-status"> &nbsp;{{ auth()->user()->name }}</span>
                    @else
                        <span class="user-status">Sign In</span>
                    @endif
                </a>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="left-nav-close-icon absolute cursor-pointer w-6 h-6 top-4 right-2 transition-all duration-300 ease-in-out" fill="none"
                    stroke="#fff" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="left-main-nav w-full bg-white">
                <ul class="main-nav-list-container">
                    @foreach ($menu_categories as $key => $mc)
                        @if (@$mc->subcategories && count($mc->subcategories) > 0)
                            <li
                                class="main-nav-list-wrapper border-b border-solid border-gray-300 accordion-list h-auto accordion-wrapper">
                                <div
                                    class="main-nav-list cursor-pointer flex justify-between items-center accordion-opener nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                    <div class="nav-heading font-semibold business-type p-3 inline-block">
                                        {{ $mc->name }}
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="nav-arrow-icon w-4 h-4 inline open-icon transition duration-300 ease-in-out mx-2 mr-3"
                                        fill="none" viewBox="0 0 24 24" stroke="#999">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <ul class="bussiness-type-sub-menu-wrapper links-hider h-full overflow-hidden">
                                    @foreach (@$mc->subcategories as $category)
                                        @if (@$category->subcategories && count($category->subcategories) > 0)
                                            <li class="sub-menu-wrapper">
                                                <div
                                                    class="nav-sub-heading text-base text-gray-500 cursor-pointer sub-business-type has-sub-menu flex justify-between w-full px-3 py-2 pl-5 nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                                    <span>{{ $category->name }}</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="nav-arrow-right-icon w-5 h-5 open-icon transition duration-300 ease-in-out ml-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="#999">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                    </svg>
                                                </div>
                                                <ul
                                                    class="sub-links-hider fixed bottom-0 left-0 h-screen w-full bg-white overflow-x-hidden overflow-y-scroll z-30 transition duration-300 ease-in-out">
                                                    <div
                                                        class="back-to-menu transition duration-300 ease-in-out hover:bg-gray-200 flex items-center p-3 border-b border-solid border-gray-300 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="nav-arrow-icon w-6 h-6 inline mr-2" fill="none"
                                                            viewBox="0 0 24 24" stroke="#999">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                        </svg>
                                                        <span>Main Menu</span>
                                                    </div>
                                                    @foreach ($category->subcategories as $subChild)
                                                        <li
                                                            class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                                            <a href="{{ $subChild->slug }}"
                                                                class="block px-3 py-2 text-gray-500">{{ $subChild->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li
                                                class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                                <a class="nav-sub-heading text-base text-gray-500 cursor-pointer sub-business-type flex justify-between w-full px-3 py-2 pl-5"
                                                    href="{{ $category->slug }}">
                                                    <span>{{ $category->name }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="main-nav-list-wrapper border-b border-solid border-gray-300">
                                <a href="{{ $mc['slug'] }}"
                                    class="nav-heading font-semibold business-type p-3 block nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">{{ $mc['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                    {{-- <li
                        class="main-nav-list-wrapper border-b border-solid border-gray-300 accordion-list h-auto accordion-wrapper">
                        <div
                            class="main-nav-list cursor-pointer flex justify-between items-center accordion-opener nav-hover hover:bg-gray-100 transition duration-300 ease-in-out">
                            <div class="nav-heading font-semibold business-type p-3 inline-block">
                                <a href="/jobs/listing">Jobs</a>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="nav-arrow-icon w-4 h-4 inline open-icon transition duration-300 ease-in-out mx-2 mr-3"
                                fill="none" viewBox="0 0 24 24" stroke="#999">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <ul class="bussiness-type-sub-menu-wrapper links-hider h-full overflow-hidden">
                            @foreach (@$job_categories as $job_category)
                                @if (@$job_category->job_categories->count() > 0)
                                    <li class="sub-menu-wrapper">
                                        <div
                                            class="nav-sub-heading text-base text-gray-500 cursor-pointer sub-business-type has-sub-menu flex justify-between w-full px-3 py-2 pl-5 nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                            <span>{{ $job_category->name }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="nav-arrow-right-icon w-5 h-5 open-icon transition duration-300 ease-in-out ml-2"
                                                fill="none" viewBox="0 0 24 24" stroke="#999">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </div>
                                        <ul
                                            class="sub-links-hider fixed bottom-0 left-0 h-screen w-full bg-white overflow-x-hidden overflow-y-scroll z-30 transition duration-300 ease-in-out">
                                            <div
                                                class="back-to-menu transition duration-300 ease-in-out hover:bg-gray-200 flex items-center p-3 border-b border-solid border-gray-300 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="nav-arrow-icon w-6 h-6 inline mr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke="#999">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                                </svg>
                                                <span>Main Menu</span>
                                            </div>
                                            @foreach ($job_category->job_categories as $jobCat)
                                                @if (@$jobCat->vendor_job)
                                                    <li
                                                        class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                                                        <a href="/jobs/detail/{{ @$jobCat->vendor_job->slug }}"
                                                            class="block px-3 py-2 text-gray-500">{{ @$jobCat->vendor_job->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li> --}}
                    <ul class="help-container bg-white">
                        <li class="nav-heading text-xl font-semibold p-3">Help & Settings</li>
                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                            <a href="@if (\App\Models\Customer::logged_in()) /dashboard @else /login @endif"
                                class="block py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer">Your
                                Account</a>
                        </li>
                        @php
                            $zip = '';
                            $city = '';
                            $country = 'United State';
                            if (Session::has('ses_shipping_details')) {
                                $zip = isset(Session::get('ses_shipping_details')['zip']) ? Session::get('ses_shipping_details')['zip'] : '';
                                $city = isset(Session::get('ses_shipping_details')['city']) ? Session::get('ses_shipping_details')['city'] : '';
                                $country = Session::get('ses_shipping_details')['country'];
                            }
                        @endphp
                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                            <a class="shipping-cost-calculater py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer flex items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="nav-help-icon w-6 h-6 mr-2"
                                        fill="none" viewBox="0 0 24 24" stroke="#999">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </span>
                                <span class="nav-language">Delivery Address</span></a>
                        </li>
                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                            <a class="py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer flex items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="nav-help-icon w-6 h-6 mr-2"
                                        fill="none" stroke="#999" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                    </svg>
                                </span>
                                <span class="nav-language">
                                    @if (Session::has('ses_shipping_details'))
                                        @if ($city != '')
                                            {{ $city }},
                                            @endif @if ($zip != '')
                                                {{ $zip }},
                                            @endif
                                            {{ $country }}
                                        @else
                                            United States @endif
                                </span></a>
                        </li>
                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                            <a class="block py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer">Customer
                                Service</a>
                        </li>
                        @if (auth()->user())
                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                            <form action="{{ route('frontend.auth.logout') }}" method="POST"
                                class="flex items-center p-4 db-links">
                                @csrf
                                <button type="submit" class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                        @else
                        <li class="nav-hover hover:bg-gray-200 transition duration-300 ease-in-out">
                            <a href="/login"
                                class="block py-2 pl-3 nav-sub-heading text-base text-gray-500 cursor-pointer">Log
                                In</a>
                        </li>
                        @endif
                    </ul>
                </ul>
            </div>
        </nav>
    </div>

    <header class="bg-gray-100 relative">
        <!-- small bar below main navigation -->
        <div class="small-header-container primary-black-bg hidden xl:block">
            <div class="small-header-wrapper width flex justify-between items-center">
                <div class="shop-by-wrapper flex items-center p-2 pl-0 cursor-pointer">
                    <ul class="hamburger mr-0 sm:mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="#fff" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </ul>
                    <div class="n-c text-white hidden sm:block">Shop By Department</div>
                </div>

                <ul class="small-header-right-wrapper text-white flex justify-between text-xs relative">
                    {{-- <li>
                        <a href="" class="underline-links relative overflow-hidden border-l border-solid px-3">
                            Get Your Discount </a>
                    </li>
                    <li>
                        <a href="" class="underline-links relative overflow-hidden border-l border-solid px-3">
                            Today Hot Deals </a>
                    </li> --}}
                    <li>
                        <a href="/seller"
                            class="underline-links relative overflow-hidden border-l border-r border-solid px-3 inline-block">
                            Sell
                            on {{ appName() }} </a>
                    </li>
                    <li>
                        <a href="/vendors"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Vendors </a>
                    </li>
                    {{-- <li>
                        <a href="/speakers"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Speakers </a>
                    </li>
                    <li>
                        <a href="/pet-of-the-month"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Pets of The
                            Month </a>
                    </li>
                    <li>
                        <a href="/courses/categories"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Courses </a>
                    </li>
                    <li class="relative resources-mega-menu-link  z-30">
                        <a href="/resources"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-flex items-center">
                            <span>Vet Resources</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="#fff">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>

                        <ul
                            class="resouces-mega-menu absolute top-8 left-0 transform bg-white text-gray-500 z-10 p-4 border border-solid border-gray-200 w-max invisible opacity-0 transition-all duration-300 ease-in-out text-sm">
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/resources/news"> News Feed </a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/resources/educational-programs"> Educational Programs </a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/resources/online-resources"> Online Resources </a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/resources/veterinary-associations"> Associations </a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/resources/surgical-procedures"> Surgical Procedures
                                </a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/trade-shows"> Trade Shows </a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max">
                                <a href="/blog"> Blogs </a>
                            </li>
                            <li class="mt-2 relative underline-links block w-max desease-sub-menu-wrapper ">
                                <a class="relative overflow-hidden underline-links inline-flex items-center w-max"
                                    href="/resources/common-diseases">
                                    <span>Common Diseases</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="#999" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>

                                <ul
                                    class="desease-sub-menu mt-5 bg-white border border-solid border-gray-200 text-gray-500 p-4 absolute top-0 left-0 w-full invisible opacity-0">
                                    @foreach ($all_animals as $animal)
                                        <li>
                                            <a class="block py-1 relative overflow-hidden underline-links w-max"
                                                href="/resources/common-diseases/{{ $animal['slug'] }} ">
                                                {{ $animal['name'] }} </a>
                                        </li>
                                    @endforeach
                                </ul>


                            </li>


                        </ul>
                    </li>

                    <li>
                        <a href="/jobs/listing"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Jobs
                        </a>
                    </li> --}}
                    <li>
                        <a href="/products/today-deals"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Today's Deals
                        </a>
                    </li>
                    <li>
                        <a href="/track-your-order"
                            class="underline-links relative overflow-hidden border-r border-solid px-3 inline-block">
                            Track Your
                            Order </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- mob page navigation like home - about etc -->
    <div
        class="page-navigation-container fixed top-0 left-0 z-50 w-screen h-screen transition hidden opacity-0 duration-300 ease-in-out overflow-x-hidden lg:overflow:hidden overflow-y-scroll lg:overflow:hidden">
        <div class="page-navigation-wrapper relative h-screen bg-white transition duration-300 ease-in-out">
            <h3 class="text-xl primary-black-bg p-4 text-white flex justify-between">
                <span>Menu</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 page-navigation-close-btn cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke="#fff">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </h3>

            <ul>
                <li class="border-b border-solid border-gray-300 mt-6 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/">Home</a>
                </li>
            </ul>

            <ul class="grid grid-cols-1 gap-3 bg-white">
                <li class="border-b border-solid border-gray-300 py-4 pl-6">
                    <div class="font-semibold text-xl">Vet Resources</div>
                </li>
                <li class="border-b border-solid border-gray-300 mt-2 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/resources/news">News Feeds</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/resources/educational-programs">Educational Programs</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/resources/online-resources">Online Resources</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/resources/veterinary-associations">Associations</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/resources/surgical-procedures">Surgical Procedures</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/trade-shows">Trade Shows</a>
                </li>
            </ul>

            <ul class="grid grid-cols-1 gap-3 bg-white">
                <li class="border-b border-solid border-gray-300 py-4 pl-6">
                    <div class="font-semibold text-xl">About</div>
                </li>
                <li class="border-b border-solid border-gray-300 mt-2 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/about-us">About Us</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/our-mission">Our Mission</a>
                </li>
                {{-- <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="{{ route('frontend.pages', ['warranty']) }}">Warranty</a>
                </li> --}}
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/repairs">Repairs</a>
                </li>
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/contact">Contact Us</a>
                </li>
            </ul>

            <ul class="grid grid-cols-1 gap-3 bg-white">
                <li class="border-b border-solid border-gray-300 py-4 pl-6">
                    <div class="font-semibold text-xl">Media</div>
                </li>
                <li class="border-b border-solid border-gray-300 mt-2 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/downloads">Downloads</a>
                </li>
                {{-- <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="{{ route('frontend.videos') }}">Videos</a>
                </li> --}}
                <li class="border-b border-solid border-gray-300 pl-12">
                    <a class="underline-links relative inline-block w-max overflow-hidden pb-1"
                        href="/blog">Blogs</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- shipping cost calculater -->
    @include('frontend.includes.partials._calculate-shipping-form')

    <div
        class="alert-pop-container fixed top-0 left-0 w-full h-screen z-50 flex justify-center items-center hidden opacity-0 transition-all duration-300 ease-in-out bg-black bg-opacity-70">
        <div
            class="alert-pop-wrapper flex flex-col justify-center items-center bg-white p-2 sm:p-6 w-9/12 lg:w-6/12 xl:w-4/12 transform scale-125 relative opacity-0 transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 absolute top-2 right-2 cursor-pointer close-alert-popup" fill="none"
                viewBox="0 0 24 24" stroke="#777">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <div class="flex flex-col items-center mr-6 sm:mr-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full mr-2 success" fill="none"
                    viewBox="0 0 24 24" stroke="#418ffe" fill="#fff" height="80px">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full error hidden" fill="#fff"
                    viewBox="0 0 24 24" stroke="#ff0000" height="80px">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="alert-popup-msg text-gray-500 text-sm md:text-base leading-none"></div>
            </div>
            <div
                class="alert-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row pt-4 text-sm md:text-base">
                <a href="/cart"
                    class="view-alert-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max text-center"></a>
                <button
                    class="alert-continue-shopping-btn btn bg-black black-btn text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Continue
                    Shopping</button>
            </div>
        </div>
    </div>
</div>
