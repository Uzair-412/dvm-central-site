<div>
    <!-- header of entire page -->
    <div class="header-container border-b border-solid border-gray-300 bg-gray-50">
        <div class="header-wrapper flex justify-between items-center width sm:gap-12">
            <div class="logo-shop-wrapper relative overflow-hidden h-full">
                <div class="first-logo logo flex items-center transform-gpu transition-transform duration-300">
                    <a href="/" class="cursor-pointer w-auto h-full"> <img
                            src="{{ asset('/assets/icons/dvm-central.png') }}" alt="{{ appName() }}" /> </a>
                </div>
                <div
                    class="shop-by-container absolute top-0 left-0 transform-gpu translate-y-full transition-transform duration-300 justify-center h-full hidden xl:inline-flex flex-col">
                    <div
                        class="shop-by-wrapper bg-white nav cursor-pointer flex justify-center items-center border border-gray-300 border-solid p-3 card relative overflow-hidden">
                        <span
                            class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span
                            class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span
                            class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span
                            class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <ul class="hamburger mr-0 sm:mr-2 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </ul>
                        <div class="n-c primary-black-color font-semibold hidden sm:block">Shop By Department</div>
                    </div>
                </div>
            </div>
            <!-- nav search bar -->
            <div class="input-container w-full hidden xl:block mx-8 relative">
                {{-- <div class="block primary-black-bg text-white p-1 text-center text-xs md:text-sm">Free shipping on all orders over 100.00 USD</div> --}}
                @livewire('frontend.includes.partials.search-list')
            </div>
            <div class="flex flex-col">
                {{-- <div class="hidden sm:flex items-cenetr justify-end border-b border-solid border-gray-200 pb-1">
                    <a class="relative overflow-hidden underline-links text-gray-500 mr-4"
                        href="{{ route('frontend.jobs.listing') }}">Jobs</a>
                    <a class="relative overflow-hidden underline-links text-gray-500 mr-4"
                        href="{{ route('frontend.pages', ['about-us']) }}">About</a>
                    <a class="relative overflow-hidden underline-links text-gray-500" href="/contact">Contact</a>
                </div> --}}
                <div class="header-icons-wrapper flex justify-end items-center w-max">
                    <a class="relative overflow-hidden red-btn btn z-10 bg-red-500 p-1 text-white hidden sm:inline-block py-0 px-2 mr-2"
                        href="/contact-us">Help?</a>
                    <!-- compare icon -->
                    {{-- <a href="{{ url('/compare') }}"
                        class="nav-compare-icon-wrapper relative mr-2 rounded-full p-1.5 transition duration-300 ease-in-out hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-compare-icon" fill="none"
                            viewBox="0 0 24 24" stroke="#666">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </a> --}}

                    <!-- whishlist icon -->
                    <a href="{{ route('frontend.user.wishlist.index') }}"
                        class="nav-whishlist-icon-wrapper relative mr-1 py-0.5 px-1 transition duration-300 ease-in-out hover:bg-gray-200 flex items-center">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-whishlist-icon" fill="none"
                                viewBox="0 0 24 24" stroke="#555">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            @if(auth()->user())
                            <div
                                class="cart-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute -bottom-1 -right-1 text-xs text-center text-white">
                                @livewire('frontend.includes.wish-list-counts', ['rand_num'=> $rand_num])
                            </div>
                            @endif
                        </div>
                        <div class="text-xs text-gray-500 ml-1 mt-0.5 hidden sm:inline-block">Wishlist</div>
                    </a>

                    <!-- cart-icon -->
                    <div
                        class="nav-cart-icon-wrapper relative mr-1 py-0.5 px-1 hidden xl:inline-flex items-center transition duration-300 ease-in-out hover:bg-gray-200 cursor-pointer">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-cart-icon" fill="none"
                                viewBox="0 0 24 24" stroke="#555">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <div
                                class="cart-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute -bottom-1 -right-1 text-xs text-center text-white">
                                @livewire('frontend.includes.mini-cart-counts', ['rand_num'=> $rand_num])
                            </div>
                        </div>
                        <div class="text-xs text-gray-500 ml-1 mt-0.5">Cart</div>
                    </div>
                    <!-- login-icon -->
                    @if (\App\Models\Customer::logged_in())
                        <li class="relative user-dropdown-menu-link list-none z-30">
                            <a href="/dashboard"
                                class="nav-login-icon-wrapper relative inline-flex items-center py-0.25 px-1 mt-1 transition duration-300 ease-in-out hover:bg-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="#555" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <div class="text-xs text-gray-500 ml-1 mt-0.5 hidden sm:inline-block"> Account </div>
                            </a>

                            <ul
                                class="absolute bg-white border border-gray-200 border-solid duration-200 ease-in-out invisible mt-1 p-3 right-0 text-gray-500 text-sm top-8 transform transition-all user-dropdown-menu w-max z-10">
                                <li class="mt-2 relative flex overflow-hidden underline-links block w-max">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                        fill="none" stroke="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    <a href="/dashboard" class="text-gray-500 block px-4 py-1 text-sm" role="menuitem"
                                        tabindex="-1" id="menu-item-0">Dashboard</a>
                                </li>
                                <li class="mt-2 relative flex overflow-hidden underline-links block w-max">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                        stroke="currentColor" fill="none">
                                        <path
                                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                        </path>
                                    </svg>
                                    <a href="/dashboard/orders" class="text-gray-500 block px-4 py-1 text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-1">Orders</a>
                                </li>
                                <li class="mt-2 relative flex overflow-hidden underline-links block w-max">
                                    <form action="/logout" method="POST" class="flex">
                                        @csrf
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg> <button type="submit"
                                            class="pl-3">
                                            <span class="text-gray-500 block py-1 text-sm">Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <a href="@if (\App\Models\Customer::admin_check()) {{ '/admin/dashboard' }}@else{{ '/login' }} @endif"
                            class="nav-login-icon-wrapper relative inline-flex items-center py-0.25 px-1 transition duration-300 ease-in-out hover:bg-gray-200">
                            {{-- <img class="h-7 w-7 nav-login-icon rounded-full" src="assets/icons/login.png" alt="Login" /> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="#555" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-xs text-gray-500 ml-1 mt-0.5 hidden sm:inline-block">
                                @if (\App\Models\Customer::admin_check())
                                    Account
                                @else
                                    Login
                                @endif
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- bottom navigation for below 1280 -->
    <header
        class="nav-bottom-bar-container w-full overflow-hidden fixed bottom-0 left-0 bg-gray-100 z-30 block xl:hidden border-t border-solid border-gray-200">
        <div class="nav-bottom-bar-wrapper width overflow-hidden">
            <div class="bottom nav-icons flex justify-between sm:justify-center items-center py-2 w-auto h-full">
                <div
                    class="page-navigation-icon-wrapper relative sm:mr-12 flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 page-navigation-icon cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke="#777">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span>Menu</span>
                </div>
                <div
                    class="nav-category-icon-wrapper relative sm:mr-12 flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-category-icon cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke="#777">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <span>Categories</span>
                </div>
                <div
                    class="nav-search-icon-wrapper relative sm:mr-12 flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer nav-search-icon"
                        fill="none" viewBox="0 0 24 24" stroke="#777">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Search</span>
                </div>
                <div
                    class="nav-cart-icon-wrapper relative flex flex-col items-center rounded-full text-xs sm:text-sm cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 nav-cart-icon" fill="none"
                        viewBox="0 0 24 24" stroke="#777">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Cart</span>
                    <div class="cart-quantity lite-blue-bg-color rounded-full w-4 h-4 absolute -top-1 -left-2 sm:left-auto sm:-right-2 text-xs text-center text-white mini-cart-count">
                        @livewire('frontend.includes.mini-cart-counts', ['rand_num'=> $rand_num])
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- mob search -->
    <div
        class="mob-search-container input-container fixed top-0 left-0 z-50 w-screen h-screen hidden opacity-0 transition duration-300 ease-in-out">
        <div class="mob-search-wrapper relative w-full h-screen bg-white transition duration-300 ease-in-out">
            <h3 class="text-xl primary-black-bg p-4 text-white flex justify-between">
                <span>Search Something!</span><span><svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 mob-search-close-btn cursor-pointer" fill="none" viewBox="0 0 24 24"
                        stroke="#fff">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </h3>

            @livewire('frontend.includes.partials.mob-search-list')
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            let searchContainer = document.querySelectorAll('.input-container');
            searchContainer.forEach((cont) => {
                cont.querySelector('input[type=search]').addEventListener('keyup', (e) => {
                    if (e.target.value.length === 0) {
                        document.body.classList.remove('body-height');
                        // document.querySelector('.header-input-bg').classList.add('hidden');
                        // document.querySelector('.header-input-bg').classList.add('opacity-0');
                    } else {
                        document.body.classList.add('body-height');
                        cont.querySelector('.header-input-bg')?.classList.remove('hidden');
                        setTimeout(() => {
                            cont.querySelector('.header-input-bg')?.classList.remove(
                                'opacity-0');
                        }, 100);
                    }
                });
            });
        })
    </script>
</div>
