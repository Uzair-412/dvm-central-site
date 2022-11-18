@extends('frontend.layouts.app')
@section('meta_keywords', 'DVM Central')
@section('meta_description', 'Market Place for Veterinarians and Distributors')
@section('title', $data['vendor']->name)
@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
    <link rel="stylesheet" href="assets/styles/seller.css" />
@endpush
@section('content')


    <!-- page content -->
    @php
    $logo = $header_image = '';
    if ($data['vendor']->logo != '') {
        $logo = 'vendors/logo/' . $data['vendor']->logo;
    }
    if ($data['vendor']->header_image != '') {
        $header_image = 'vendors/header_image/' . $data['vendor']->header_image;
    }

    @endphp
    <main id="seller-page" class="relative">
        <div class="seller-header w-full h-full relative overflow-hidden">
            {{-- <div class="ps-block__content"
                data-background="{{ Storage::disk('ds3')->exists($header_image)? Storage::disk('ds3')->url($header_image): 'https://via.placeholder.com/1519x304.png?text=' . $data['vendor']->name }}"
            alt="{{ $data['vendor']->name }}"> --}}
            <img class="w-full h-full object-cover" src="{{ 'up_data/' . $header_image }}" alt="{{ $data['vendor']->name }}" sizes="100%" alt="Seller" />
        </div>
        <!-- seller info container -->
        <div class="seller-info-container primary-black-bg text-xs lg:text-sm">
            <div class="seller-info-wrapper width flex justify-between p-2 lg:p-0">
                <div class="flex w-max">
                    <img class="seller-logo rounded-full border border-solid border-gray-200 transform -mt-4 md:-mt-20 lg:-mt-16 w-16 h-16 md:w-32 md:h-32 -mb-4 md:-mb-2 lg:mb-0"
                        src="{{ Storage::disk('ds3')->exists($logo)? Storage::disk('ds3')->url($logo): 'https://ui-avatars.com/api/?name=' . $data['vendor']->name . '&background=418ffe&color=fff' }}"
                        alt="{{ $data['vendor']->name }}" />

                    <div class="seller-location-wrapper items-center w-max ml-2 lg:ml-4 hidden sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="#fff">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <address class="seller-address text-gray-300">{{ $data['vendor']->city }},
                            {{ $data['vendor']->state }}, {{ $data['vendor']->zip_code }}</address>
                    </div>

                    <div class="seller-rating-wrapper items-center w-max ml-2 lg:ml-4 hidden sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="#fff">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <div class="text-gray-300"><span class="rating-percent mr-2">{{ number_format($data['ratingPercentage'],2) }}%</span><span>Positive Rating</span>
                        </div>
                    </div>

                    <div class="seller-follower-wrapper items-center w-max ml-2 lg:ml-4 hidden sm:inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="#fff">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <div class="text-gray-300"><span class="followers mx-2">{{ $data['followers'] }}</span><span>Followers</span></div>
                    </div>
                </div>

                <div class="seller-btn-wrapper hidden md:inline-flex items-center ml-2 lg:ml-4">
                    <form id="follow-form" action="{{ route('frontend.follow.vendor', $data['vendor']->slug) }}">
                        @php
                            $checkFollow = App\Models\Follow::where([['user_id', @Auth::user()->id],['vendor_id', $data['vendor']->id]])->first();
                        @endphp
                        <button class="follow btn black-btn relative overflow-hidden inline-block z-10 primary-black-bg text-white py-1.5 px-3 border-solid border blue-border">{{ $checkFollow ? 'Unfollow' : 'Follow' }}</button>
                    </form>
                    <button class="chat-btn btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white py-1.5 px-3 ml-3 border-solid border blue-border">Chat</button>
                </div>
            </div>
        </div>
        <!-- seller quick links container -->
        <div class="seller-quick-links-container bg-gray-100">
            <div class="seller-quick-links-wrapper width flex flex-col lg:flex-row lg:justify-between lg:items-center py-3 w-max relative">
                <!-- seller links -->
                <div class="seller-links-wrapper flex text-sm sm:text-base">
                    <ul class="seller-quick-links inline-flex items-center py-3 w-max relative">
                        <li class="mr-2 sm:mr-3 xl:mr-4">
                            <a href="/{{ $data['vendor']->name }}" class="underline-links relative overflow-hidden inline-flex w-max seller-link font-semibold" >{{ $data['vendor']->name }}</a>
                        </li>
                        @if ($data['vendor']->virtual_booth_url != null)
                            <li class="mr-2 sm:mr-3 xl:mr-5">
                                <a class="underline-links relative overflow-hidden inline-flex w-max seller-link seller-active-link "
                                    href="{{ $data['vendor']->virtual_booth_url }}">Virtual Booth</a>
                            </li>
                        @endif

                        @foreach ($data['page_list']->take(3) as $page)
                            <li class="nav-item mr-5">
                                <a class="underline-links relative overflow-hidden inline-flex w-max seller-link text-gray-500 font-semibold"
                                    href="{{ $page->slug }}"
                                    aria-label="{{ $page->name }}">{{ $page->name }}</a>
                            </li>            @endforeach

                        @if ($data['page_list']->count() > 3)
                            @foreach ($data['page_list']->skip(3) as $page)
                                <li class="mr-2 sm:mr-3 xl:mr-5">
                                    <a class="underline-links relative overflow-hidden inline-flex w-max seller-link text-gray-500 font-semibold"
                                        href="{{ $page->slug }}"
                                        aria-label="{{ $page->name }}">{{ $page->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <!-- more links button -->
                    <div class="seller-menu-btn-wrapper flex items-center relative hidden">
                        <div class="seller-menu-btn flex items-center cursor-pointer">
                            <div class="mr-1 cursor-pointer">More</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" fill="none"
                                viewBox="0 0 24 24" stroke="#999">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <!-- more links-container or hidden links -->
                        <div
                            class="seller-more-links-container seller-hidden-menu absolute top-12 right-0 bg-white border border-solid blue-border z-40 transform transition-transform duration-500 ease-in-out origin-top-right hidden scale-0">
                            <ul class="seller-more-links flex-col py-3 w-full p-2 md:p-4"></ul>
                        </div>
                    </div>
                </div>

                <!-- seller store search -->
                <div class="seller-store-search-wrapper lg:w-4/12 ml-0 lg:ml-2">
                    <div class="input-wrapper flex items-center relative border border-solid border-gray-200 overflow-hidden w-full">
                        <input type="search" placeholder="Search in store" class="desktop-search-bar p-2 focus:outline-none text-gray-500 w-full h-auto text-sm" />
                        <button class="btn blue-btn px-6 py-2 w-full lite-blue-bg-color text-white relative overflow-hidden h-full z-10 text-xs md:text-sm h-auto text-center">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- seller products container -->
        <div class="seller-products-container mt-12">
            <div class="seller-products-wrapper flex width">
                <!-- left col -->
                <div class="left-col w-3/12 mr-6 hidden lg:inline-block">
                    @php
                        $banner = $data['banner']
                            ->where('area_id', 16)
                            ->where('status', 'Y')
                            ->first();
                    @endphp
                    @if ($banner != '')
                        @php
                            if($banner->image){
                                $path = 'up_data/banners/'.$banner->image;
                            }else{
                                $path ='https://via.placeholder.com/290x400.png?text=Image+Not+Available+In+The+Bucket';
                            }
                        @endphp
                        <img class="border border-solid border-gray-200"
                            src="{{ $path }}"
                            alt="{{ $banner->name }}" />
                    @else
                        <img class="border border-solid border-gray-200" src="https://via.placeholder.com/290x400.png"
                            alt="Vendor Page Left Banner">
                    @endif
                </div>

                <!-- right col -->

                <div class="right-col hot-selling-products relative w-full lg:w-9/12">
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-semibold">Hot Selling Products</div>

                        <div class="swiper-buton-wrapper h-8 w-16 mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-next"
                                fill="none" viewBox="0 0 24 24" stroke="#418ffe">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-prev"
                                fill="none" viewBox="0 0 24 24" stroke="#418ffe">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                    </div>
                    @livewire('frontend.products.products-list', ['products_list' => $data['hot-products'], 'type' =>
                    'carousel-detail'])
                </div>
            </div>

            <div class="img-wrapper width mt-20 flex items-center">
                @php
                    $banner = $data['banner']
                        ->where('area_id', 17)
                        ->where('status', 'Y')
                        ->first();
                @endphp
                @if ($banner != '')
                @php
                    if($banner->image){
                        $path = 'up_data/banners/'.$banner->image;
                    }else{
                        $path ='https://via.placeholder.com/290x400.png?text=Image+Not+Available+In+The+Bucket';
                    }
                @endphp
                    <img class="lazyload border border-solid border-gray-200 w-full"
                        data-src="{{ $path }}"
                        alt="{{ $banner->name }}">
                @else
                    <img class="lazyload border border-solid border-gray-200 w-full" data-src="https://via.placeholder.com/1459x365.png" alt="Vendor Page Between Banner">
                @endif
            </div>
            <div class="seller-all-items-container mt-20">
                <div class="all-items-title-wrapper flex justify-between items-end gap-4 width">
                    <h1 class="title text-2xl font-semibold inline tracking-wide primary-black-color">All Items</h1>
                </div>
                <div class="width">
                    @livewire('frontend.products.products-list', ['products_list' => $data['list-products'], 'type' => 'portrate'])
                </div>
                <div class="pagination-wrapper flex items-center width" aria-label="Pagination">
                    {!! $data['list-products']->links() !!}
                </div>
            </div>

            <!-- 3 img section -->
            <section class="mt-20">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 width">
                    <div class="deal-of-the-day-img-wrapper border border-solid border-gray-200 overflow-hidden">
                        @php
                            $banner = $data['banner']
                                ->where('area_id', 18)
                                ->where('status', 'Y')
                                ->first();
                        @endphp
                        @if ($banner != '')
                        @php
                            if($banner->image){
                                $path = 'up_data/banners/'.$banner->image;
                            }else{
                                $path ='https://via.placeholder.com/290x400.png?text=Image+Not+Available+In+The+Bucket';
                            }
                        @endphp
                            <img class="lazyload w-full"
                                data-src="{{ $path}}"
                                alt="{{ $banner->name }}">
                        @else
                            <img class="lazyload w-full" data-src="https://via.placeholder.com/400x250.png"  alt="Vendor Page Bottom Center Banner">
                        @endif
                    </div>
                    <div class="deal-of-the-day-img-wrapper border border-solid border-gray-200 overflow-hidden">
                        @php
                            $banner = $data['banner']
                                ->where('area_id', 19)
                                ->where('status', 'Y')
                                ->first();
                        @endphp
                        @if ($banner != '')
                        @php
                            if($banner->image){
                                $path = 'up_data/banners/'.$banner->image;
                            }else{
                                $path ='https://via.placeholder.com/290x400.png?text=Image+Not+Available+In+The+Bucket';
                            }
                        @endphp
                            <img class="lazyload w-full"
                                data-src="{{ $path }}"
                                alt="{{ $banner->name }}">
                        @else
                            <img class="lazyload w-full" data-src="https://via.placeholder.com/400x250.png"
                                alt="Vendor Page Bottom Right Banner">
                        @endif
                    </div>
                    <div class="deal-of-the-day-img-wrapper border border-solid border-gray-200 overflow-hidden transform sm:translate-x-2/4 sm:-ml-6 lg:translate-x-0 lg:-ml-0">
                        @php
                            $banner = $data['banner']
                                ->where('area_id', 20)
                                ->where('status', 'Y')
                                ->first();
                        @endphp
                        @if ($banner != '')
                        @php
                            if($banner->image){
                                $path = 'up_data/banners/'.$banner->image;
                            }else{
                                $path ='https://via.placeholder.com/290x400.png?text=Image+Not+Available+In+The+Bucket';
                            }
                        @endphp
                            <img class="lazyload w-full"
                                data-src="{{ $path }}"
                                alt="{{ $banner->name }}">
                        @else
                            <img class="lazyload w-full" data-src="https://via.placeholder.com/400x250.png"
                                alt="Vendor Page Bottom Right Banner">
                        @endif
                    </div>
                </div>
            </section>
        </div>
        @livewire('chat-box', ['chat_type' => 'site', 'vendor_id' => $data['vendor_id'], 'chat_data' => $data['chat_data']])
        
    </main>
@endsection

@push('head-area')
    <style>
        .pagination-wrapper nav {
            transform: none;
        }
        .pagination-wrapper .pagination {
            display: grid;
            grid-template-columns: repeat(11, 1fr);
        }
        .pagination-wrapper .pagination .page-item {
            background: #fff;
            margin: 0px 3px;
            border: 1px solid #ddd;
            width: 40px;
            height: 35px;
        }
        .pagination-wrapper .pagination .page-item.active {
            background: #418ffe;
            color: #ffffff;
            border: 1px solid #418ffe;
        }
        .pagination-wrapper .pagination .page-item .page-link {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush
@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    {{-- <script defer src="/assets/js/seller.js?version=0.1"></script> --}}
    <script>
        document.querySelector('.chat-btn')?.addEventListener('click', (e) => {
            let user = <?php echo json_encode(auth()->user()); ?>;
           if(!user){
            showAlert(error_message ='Please Login Before Initiating Chat To The Vendor', {
                text: 'Login',
                link: '/login',
                type: 'error'
            });
           }
        });
        document.querySelector('#chat-icon')?.addEventListener('click', (e) => {
            let user = <?php echo json_encode(auth()->user()); ?>;
            if(!user){
                showAlert(error_message ='Please Login Before Initiating Chat To The Vendor', {
                    text: 'Login',
                    link: '/login',
                    type: 'error'
                });
            }    
        });
    </script>
    {{-- @livewireScripts --}}
@endpush
