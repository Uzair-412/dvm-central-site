<div>
    <main id="product-page relative overflow-x-hidden">
        <!-- enlarged imgs -->
        <div
            class="enlarged-img-container flex justify-center items-center fixed top-0 left-0 w-screen h-screen z-50 hidden overflow-y-scroll lg:overflow-hidden flex justify-center items-center" wire:ignore>
            <div class="enlarged-img-inner-container absolute"></div>
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 enlarged-close-btn absolute top-5 right-5 cursor-pointer" fill="none" viewBox="0 0 24 24"
                stroke="#ffffff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <div class="enlarged-img-wrapper w-10/12 lg:w-7/12 bg-white flex flex-col md:flex-row m-8 p-4">
                @php
                    $path = 'products/images/large/';
                    $path1 = 'products/images/thumbnails/';
                    $path2 = 'products/images/medium/';
                @endphp
                {{-- For product videos --}}
                @php
                $product_files = \App\Models\Files::where([['fileable_id' ,$product->id],['type' ,'videos']])->get();
                @endphp
                {{-- @if($product_files)
                    @foreach ($product_files as $file)
                        @if($file->video_type == 'youtube')
                            <iframe id="ytplayer" type="text/html" width="120" height="100" class="absolute top-0 left-0 w-full h-full"  
                            src="https://www.youtube.com/embed/{{$file->name}}"
                            frameborder="0"/></iframe>  
                        @elseif($file->video_type == 'vimeo')
                            <iframe id="vimeo_player" type="text/html" width="120" height="100" class="absolute top-0 left-0 w-full h-full"  
                            src="https://player.vimeo.com/video/{{$file->name}}"
                            frameborder="0"/></iframe>
                        @else
                                @if(app()->environment()=='local')
                                <video width="120" height="100"  controls><source src="'http://127.0.0.1:8001/up_data/products/videos/'{{$file->name}}" id="product_video" type="video/mp4">Your browser does not support the video tag.</video>
                                @else
                                <video width="120" height="100"  controls><source src="'https://www.dvmcentral.com'/up_data/products/videos/'{{$file->name}}" id="product_video" type="video/mp4">Your browser does not support the video tag.
                                </video>
                                @endif
                        @endif        
                    @endforeach
                @endif  --}}
                <img class="enlarged-img h-auto w-full md:w-8/12 popup-img md:mr-4"
                    data-src="{{ trim($product->image) != '' ? (Storage::disk('ds3')->exists($path . $product->image) ? Storage::disk('ds3')->url($path . $product->image) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                    alt="{{ $product->name }}" />
                <div class="product-img-gallery mt-4 w-full md:w-4/12">
                    <div class="gallery-product-title text-lg my-4 font-semibold">{{ $product->name }}</div>
                    <div class="product-img-gallary-wrapper grid grid-cols-5 gap-4">
                        @if (trim($product->image) != '')
                            {{-- When Variation of products images exist --}}
                            @if ($product->type == 'variation')
                                @if ($images->count() > 0 || $sub_products->count() > 0)
                                    @foreach ($images as $image)
                                        @if ($image->name != '')
                                            <img class="opacity-60 border border-solid border-gray-300 popup-img cursor-pointer"
                                                data-src="{{ $image != '' ? (Storage::disk('ds3')->exists($path . $image->name) ? Storage::disk('ds3')->url($path . $image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                                                alt="{{ $product->name }}" />
                                        @endif
                                    @endforeach
                                @endif

                                {{-- When sub products images of variantion products exist --}}
                                @foreach ($sub_products as $sub_product)
                                    @php
                                        $sp_images = $sub_product
                                            ->files()
                                            ->where('type', 'images')
                                            ->get();
                                    @endphp
                                    @foreach ($sp_images as $image)
                                        @if ($image)
                                            <img class="opacity-60 border border-solid border-gray-300 popup-img cursor-pointer"
                                                data-src="{{ $image != '' ? (Storage::disk('ds3')->exists($path . $image->name) ? Storage::disk('ds3')->url($path . $image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                                                alt="{{ $sub_product->name }}" />
                                        @endif
                                    @endforeach
                                @endforeach
                            @else
                                @foreach ($images as $image)
                                    <img class="opacity-60 border border-solid border-gray-300 popup-img cursor-pointer"
                                        data-src="{{ $image != '' ? (Storage::disk('ds3')->exists($path . $image->name) ? Storage::disk('ds3')->url($path . $image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                                        alt="{{ $image->name }}" />
                                @endforeach
                            @endif
                        @else
                            <img class="opacity-60 border border-solid border-gray-300 popup-img cursor-pointer"
                                data-src="/up_data/na.jpg" alt="{{ $product->name }}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="product-page-container mt-20">
            <div class="product-page-wrapper">
                <section class="product-page-product-wrapper width relative overflow-visible">
                    <div class="two-col-wrapper flex flex-col md:grid md:grid-cols-2 lg:grid-cols-6 md:gap-4 w-full">
                        <div class="product-page-left-col w-full h-full lg:col-span-2" wire:ignore>
                            <div class="flex flex-col items-center sticky top-24">
                                <div class="product-img-container inline-flex flex-col items-center md:items-start w-full">
                                    <div class="product-img-wrapper relative cursor-pointer w-full bg-white">
                                        @php
                                            $galleryImgPath = trim($product->image) != '' ? (Storage::disk('ds3')->exists($path . $product->image) ? Storage::disk('ds3')->url($path . $product->image) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                                        
                                        @endphp

                                        <img class="absolute top-0 left-0 w-full h-full" src="{{ $galleryImgPath }}" default-src="{{ $galleryImgPath }}" alt="{{ $product->name }}" />   
                                    </div>
                                    <div
                                        class="flex justify-center items-center text-gray-500 click-text mt-4 text-center w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="#151515">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <p class="text-xs w-max">click to see the large image</p>
                                    </div>
                                    <div class="product-img-gallery main mt-4 swiper mySwiper bg-gray-100 p-2 pr-0 border">
                                        <div class="product-img-gallary-wrapper swiper-wrapper">
                                            {{-- For products videos --}} 
                                           @if ($product_files)
                                                @foreach ($product_files as $file)
                                                <div class="border-2 mr-2">
                                                    {{-- <img src="/up_data/products/videos/thumbnails/{{$file->video_thumbnail}}" file-type="{{$file->video_type}}" alt="video" class="mr-2 block"> --}}
                                                    <img src="/up_data/products/videos/thumbnails/video-play-icon.png" name={{$file->name}} thumbnail-link="/up_data/products/videos/thumbnails/{{$file->video_thumbnail}}" file-type="{{$file->video_type}}" class="opacity-50 bg-white " alt="" />
                                                </div>
                                                {{-- <iframe id="ytplayer" type="text/html" width="120" height="100"  
                                                    src="/up_data/products/videos/{{ $file->name }}"
                                                    frameborder="0"/></iframe> --}}
                                                @endforeach
                                           @endif
                                            @if (trim($product->image) != '')

                                                {{-- When Variation of products images exist --}}
                                                @if ($product->type == 'variation')
                                                    @if ($images->count() > 0 || $sub_products->count() > 0)
                                                        @foreach ($images as $imageKeys => $image)
                                                            @if ($image->name != '')
                                                                <img class="border border-solid border-gray-300 sm-img popup-img cursor-pointer swiper-slide"
                                                                    data-src="{{ $image != '' ? (Storage::disk('ds3')->exists($path1 . $image->name) ? Storage::disk('ds3')->url($path1 . $image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                                                                    alt="{{ $product->name }}" sub-pro-id="0" />
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    {{-- When sub products images of variantion products exist --}}
                                                    @foreach ($sub_products as $sub_product)
                                                        @php
                                                            $sp_images = $sub_product
                                                                ->files()
                                                                ->where('type', 'images')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($sp_images as $image)
                                                            @if ($image)
                                                                <img class="border border-solid border-gray-300 sm-img popup-img cursor-pointer swiper-slide hidden"
                                                                    data-src="{{ $image != '' ? (Storage::disk('ds3')->exists($path1 . $image->name) ? Storage::disk('ds3')->url($path1 . $image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                                                                    alt="{{ $sub_product->name }}"
                                                                    sub-pro-id="{{ $sub_product->id }}" />
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    @foreach ($images as $image)
                                                        <img class="border border-solid border-gray-300 sm-img popup-img cursor-pointer swiper-slide"
                                                            data-src="{{ $image != '' ? (Storage::disk('ds3')->exists($path1 . $image->name) ? Storage::disk('ds3')->url($path1. $image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp' }}"
                                                            alt="{{ $product->name }}" sub-pro-id="0" />
                                                    @endforeach
                                                @endif
                                            @else
                                                <img class="border border-solid border-gray-300 sm-img popup-img cursor-pointer swiper-slide"
                                                    data-src="/up_data/na.jpg" alt="{{ $product->name }}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-page-center-col flex flex-col mt-10 md:mt-0 w-full md:pl-8 relative lg:col-span-4">
                            <div>
                                <h1 class="product-title text-2xl font-semibold leading-normal title" id="main-product-title">{{ $name }}</h1>
                                {{-- @foreach ($sub_products as $sub_product)
                                    <h1 class="product-title text-2xl font-semibold leading-normal title title_id-{{ $sub_product->id }} hidden" id="title_id-{{ $sub_product->id }}">{{ $sub_product->name }}</h1>
                                @endforeach --}}
                            </div>
                            <div class="flex items-center justify-between gap-2 sm:gap-4 border-b border-solid border-gray-200 product-ratings-icon-wrapper" wire:ignore>
                                <div class="star-rating flex py-4">
                                    @php
                                        $j = 0;
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < (int) $reviews)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 star"
                                                fill="#418ffe" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @else
                                            @php
                                                $decimal = ($reviews - (int) $reviews) * 100;
                                            @endphp
                                            @if ($decimal > 0 && $j == 0)
                                                @php
                                                    $j = 1;
                                                @endphp
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 star"
                                                    fill="#418ffe" viewBox="0 0 24 24" stroke="none">
                                                    <defs>
                                                        <linearGradient id="grad1">
                                                            <stop offset="0%" stop-color="#418ffe" />
                                                            <stop offset="{{ $decimal }}%" stop-color="#418ffe" />
                                                            <stop offset="{{ $decimal }}%" stop-color="white" />
                                                            <stop offset="100%" stop-color="white" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        fill="url(#grad1)" stroke="#418ffe" stroke-width="1"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 star"
                                                    fill="#fff" viewBox="0 0 24 24" stroke="#418ffe"
                                                    data-value="1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            @endif
                                        @endif
                                    @endfor
                                </div>
                                @php
                                    $wishlist = 0;
                                    if (Auth::user()) {
                                        $wishlist = \App\Models\Wishlist::where([['product_id', $product->id], ['customer_id', Auth::user()->id]])->count();
                                    }
                                @endphp
                                <div class="flex items-center gap-2">
                                    @if ($wishlist)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 carasoul-heart-icon"
                                            fill="rgb(239,68,68)" viewBox="0 0 24 24" stroke="rgb(239,68,68)">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    @else
                                        <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post"
                                            action="{{ url('dashboard/wishlist/store') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="product_id" class="product_id"
                                                value="{{ $product->id }}" />
                                            <button type="submit" style="display: contents;">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-8 w-8 carasoul-heart-icon" fill="none"
                                                    viewBox="0 0 24 24" stroke="#333">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- <a href="#" class="carasoul-icon-wrapper relative hover:bg-gray-200 transition-all duration-300 rounded-full p-2 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 carasoul-compare-icon" fill="none" viewBox="0 0 24 24" stroke="#333">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                            />
                                        </svg>
                                        <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                    </a> --}}
                                </div>
                            </div>

                            {{-- Product Price --}}
                            @if(auth()->user())
                                @if ($product->type == 'variation')
                                    {{-- @foreach ($sub_products as $sub_product)
                                        @php
                                            $price_info = \App\Models\Product::getPriceText($sub_product, 'detail');
                                            $discount = 0;
                                            if ((float) $price_info['sale_price'] != 0) {
                                                $discount = (((float) $price_info['price'] - (float) $price_info['sale_price']) / (float) $price_info['price']) * 100;
                                            }
                                        @endphp
                                        <div class="product-price text-base mt-4 text-xl sm:text-2xl font-semibold hidden"
                                            id="product-price-{{ $sub_product->id }}">$<span
                                                id="sale-price">@php
                                                    if ((float) $discount == 0) {
                                                        echo number_format($price_info['price'], 2);
                                                    } else {
                                                        echo number_format($price_info['sale_price'], 2);
                                                    }
                                                @endphp</span>
                                            <span
                                                class="text-red-500 mx-1.5 @if ($discount == 0) hidden @endif"
                                                style="font-size: 16px;">
                                                (<span class="line-through">$<span
                                                        id="price-catalog">{{ number_format($price_info['price'], 2) }}</span></span>)
                                            </span>
                                            <span class="text-black-500 @if ($discount == 0) hidden @endif"
                                                style="font-size: 16px;">(-<span
                                                    id="discount">{{ number_format($discount, 2) }}</span>%)</span>
                                        </div>
                                    @endforeach --}}
                                @else
                                    {{-- @php
                                        $price_info = \App\Models\Product::getPriceText($product, 'detail');
                                        $discount = 0;
                                        if ((float) $price_info['sale_price'] != 0) {
                                            $discount = (((float) $price_info['price'] - (float) $price_info['sale_price']) / (float) $price_info['price']) * 100;
                                        }
                                    @endphp
                                    <div
                                        class="product-price text-base mt-4 text-xl sm:text-2xl font-semibold @if ($product->type == 'variation') hidden @endif">
                                        $<span id="sale-price">@php
                                            if ((float) $discount == 0) {
                                                echo number_format($price_info['price'], 2);
                                            } else {
                                                echo number_format($price_info['sale_price'], 2);
                                            }
                                        @endphp</span>
                                        <span class="text-red-500 mx-1.5 @if ($discount == 0) hidden @endif"
                                            style="font-size: 16px;">
                                            (<span class="line-through">$<span
                                                    id="price-catalog">{{ number_format($price_info['price'], 2) }}</span></span>)
                                        </span>
                                        <span class="text-black-500 @if ($discount == 0) hidden @endif"
                                            style="font-size: 16px;">
                                            (-<span id="discount">{{ number_format($discount, 2) }}</span>%)
                                        </span>
                                    </div> --}}
                                @endif
                                <div class="product-price text-base mt-4 text-xl sm:text-2xl font-semibold @if ($product->type == 'variation' && $sub_product_id == null){{'hidden'}}@endif">
                                    $<span id="sale-price">
                                        @php
                                            if ($price_info['sale_price']) {
                                                echo number_format($price_info['sale_price'], 2);
                                            } elseif ($price_info['price']) {
                                                echo number_format($price_info['price'], 2);
                                            } 
                                        @endphp
                                    </span>
                                    @if($price_info['sale_price'] > 0 && $price_info['sale_price'] < $price_info['price'])
                                        <span class="text-red-500 mx-1.5 @if ($discount == 0) hidden @endif"
                                            style="font-size: 16px;">
                                            (<span class="line-through">$<span
                                                    id="price-catalog">{{ number_format($price_info['price'], 2) }}</span></span>)
                                        </span>
                                        <span class="text-black-500 @if ($discount == 0) hidden @endif"
                                            style="font-size: 16px;">
                                            (-<span id="discount">{{ number_format($discount, 2) }}</span>%)
                                        </span>
                                    @endif
                                </div>
                            @else
                                <p class="text-sm mb-1"><a href="/login" class="text-red-500">Login</a> to see price and order.</p>
                            @endif

                            {{-- Product Short Description --}}
                            <div class="product-description text-gray-500 pt-4 pb-4 leading-normal text-sm md:text-base dynamic-data"
                                id="product-description">
                                <div
                                    class="text-gray-500 pt-4 pb-4 leading-normal text-sm md:text-base border-b border-solid border-gray-200">
                                    @if (trim($product_description) != null)
                                        {!! nl2br($product_description) !!}
                                    @endif
                                </div>
                            </div>

                            {{-- @foreach ($sub_products as $sub_product)
                                @php
                                    $uniq_id = uniqid();
                                    $stock_info = \App\Models\Product::printStockInformation($sub_product);
                                @endphp
                                <div class="product-description text-gray-500 pt-4 pb-4 leading-normal text-sm md:text-base dynamic-data hidden sid-{{ $sub_product->id }}"
                                    id="product-description-{{ $sub_product->id }}">
                                    <div
                                        class="text-gray-500 pt-4 pb-4 leading-normal text-sm md:text-base border-b border-solid border-gray-200">
                                        {!! nl2br($sub_product->short_description) !!}
                                    </div>
                                </div>
                            @endforeach --}}

                            @php
                                $sub_items = $product->setProducts()->orderBy('pos', 'ASC')->get(); 
                            @endphp 
                            @if($sub_items->count() > 0)
                                <div class="pb-4 mb-4 border-b border-solid border-gray-200">
                                    <p class="font-semibold mb-2">What's Included in This Set</p>
                                    <table class="table set_items w-full">
                                        @foreach ($sub_items as $key => $item)
                                            <tr> 
                                                <td>{{$item->pivot->qty}}</td>
                                                <td>{{$item->sku}}</td>
                                                <td>{{$item->name}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif

                            {{-- Product SKU Code --}}
                            <div class="product-sku mt-4" id="sku-wrapper">
                                <strong class="text-black">SKU :</strong>
                                <span class="sku ml-2 text-gray-500" id="sku-text">{{ $sku }}</span>
                            </div>
                            {{-- @if ($product->type == 'variation')
                                @foreach ($sub_products as $sub_product)
                                    <div class="product-sku mt-4 hidden" id="sku-wrapper-{{ $sub_product->id }}">
                                        <strong class="text-black">SKU : </strong><span class="sku ml-2 text-gray-500"
                                            id="sku-text">{{ $sub_product->sku }}</span>
                                    </div>
                                @endforeach
                            @else
                                <div class="product-sku mt-4" id="sku-wrapper"><strong class="text-black">SKU :
                                    </strong><span class="sku ml-2 text-gray-500"
                                        id="sku-text">{{ $product->sku }}</span></div>
                            @endif --}}

                            <div class="flex items-center mt-2 relative">
                                <div class="flex">
                                    <strong class="text-black">Sold By : </strong>
                                    <span class="underline-anchors relative overflow-hidden inline-block ml-1 text-gray-500"><a href="{{ $product->vendor->slug }}" class="sold-by">{{ $product->vendor->name }}</a></span>
                                </div>
                            </div>
                            <div class="availability-wrapper mt-4 inline-flex items-center @if (!$isStock){{'hidden'}}@endif">
                                <strong>Availability : </strong>
                                @if ($isStock)
                                    <div class="stock ml-1 bg-green-500 text-white p-1 md:px-2 inline-flex items-center leading-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-xs sm:text-sm lg:text-base">In Stock</span>
                                    </div>
                                @else
                                    <div class="stock ml-1 bg-red-500 text-white p-1 md:px-2 inline-flex items-center leading-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-xs sm:text-sm lg:text-base">Out Of Stock</span>
                                    </div>
                                @endif
                            </div>

                            <div class="variation-container mt-4">
                                @if ($product->type == 'variation')
                                    <h3 class="font-semibold">{{$product->caption_type}}</h3>
                                @endif
                                <!-- variation -->
                                <form wire:submit.prevent="add_to_cart">
                                    @csrf
                                    <input type="hidden" class="item_stock_qty" name="stock_qty" id="stock_qty"
                                        value="{{ $product->type == 'variation' ? '0' : $product->quantity }}" />
                                    @if ($product->type == 'variation')

                                        <input type="hidden" name="product_id" id="product_id" class="product_id" value="" />
                                        <div class="flex flex-col sm:flex-row items-cener justify-between text-gray-500 mt-2 variation-wrapper text-sm md:text-base">
                                            <label class="inline-flex items-center mb-2 sm:mb-0"
                                                for="type">Variations :</label>
                                            <select name="type" id="type" wire:model="sub_product_id"
                                                class="border border-solid border-gray-200 p-2 bg-white w-full select-variation">
                                                <option hidden value="">Select product variation</option>
                                                @foreach ($sub_products as $sub_product)
                                                    <option value="{{ $sub_product['id'] }}">
                                                        {{ $sub_product['caption'] ? $sub_product['caption'] : $sub_product['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="flex flex-col sm:flex-row items-cener justify-between text-gray-500 mt-2 variation-wrapper text-sm md:text-base">
                                            <label class="inline-flex items-center mb-2 sm:mb-0" for="length">Length</label>
                                            <select name="length" id="length" class="border border-solid border-gray-200 p-2 bg-white w-full">
                                                <option selected value="">Select length</option>
                                                <option>4"</option>
                                                <option>6"</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-cener justify-between text-gray-500 mt-2 variation-wrapper text-sm md:text-base">
                                            <label class="inline-flex items-center mb-2 sm:mb-0" for="tip-size">Tip Size</label>
                                            <select name="tip-size" id="tip-size" class="border border-solid border-gray-200 p-2 bg-white w-full">
                                                <option selected value="">Select tip-size</option>
                                                <option>0.5mm</option>
                                                <option>1mm</option>
                                            </select>
                                        </div> --}}
                                    @else
                                        <input type="hidden" name="product_id" class="product_id"
                                            value="{{ $product->id }}" />
                                    @endif

                                    @if ($stock_info['in_stock'] == 'Y')
                                        <div class="product-quantity-wrapper mt-6 flex items-center">
                                            <div class="mr-6">Quantity :</div>
                                            <div class="mr-6 flex">
                                                <button type="button" id="qty-minus" wire:click="updateQuantity('minus')" 
                                                    class="quantity quantity-minus py-2 px-3.5 lite-blue-bg-color text-white text-normal">-</button>
                                                <input name="qty" id="qty" type="text" size="4"
                                                    class="border-gray-300 border-solid border text-center inline-block py-2"
                                                    value="{{$quantity}}" wire:model="quantity" />
                                                <button type="button" id="qty-plus" wire:click="updateQuantity('plus')"
                                                    class="quantity quantity-add py-2 px-3 lite-blue-bg-color text-white text-normal">+</button>
                                            </div>
                                        </div>
                                        <div
                                            class="pp-button-wrapper flex flex-col sm:flex-row mt-6 pb-6 border-b border-solid border-gray-200">
                                            <button type="submit"
                                                class="add-cart-btn cart-btn btn black-btn bg-black z-10 text-white py-2 md:py-3 px-4 md:px-6 cursor-pointer overflow-hidden w-max sm:mr-6 relative"
                                                id="add2cart" @if ($product->type == 'variation' && $sub_product_id==null) disabled @endif>Add To Cart</button>

                                            <button type="submit"
                                                class="buy-now-btn btn blue-btn lite-blue-bg-color z-10 text-white py-2 md:py-3 px-4 md:px-6 cursor-pointer overflow-hidden w-max mt-4 sm:mt-0 relative"
                                                id="buynow" @if ($product->type == 'variation' && $sub_product_id==null) disabled @endif>Buy Now</button>
                                        </div>
                                        <input type="hidden" name="cmd" id="cmd" value="add2cart" />
                                    @endif
                                    <div id="qty-exceed-error" class="text-red-500 font-semibold">{{$add_to_cart_error}}</div>
                                    {{-- <input type="hidden" name="session_num" id="session_num" value="{{ session()->get('rand_num') }}" />
                                    <input type="hidden" name="parent_id" class="parent_id" value="{{ $product->id }}" />
                                    <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}" /> --}}
                                </form>
                            </div>

                            <div class="category-name mt-6 text-sm">
                                <strong>Categories : </strong>
                                @foreach ($product_categories as $cats)
                                    <a href="{{ $cats->slug }}" class="md:ml-2 lite-blue-color"
                                        aria-label="{{ $cats->name }}">{{ $cats->name }}</a>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </div>

                            {{-- <div class="tags-name mt-2 text-sm">
                                @if (trim($product->tags) != null)
                                    @php
                                        $tags = explode(',', $product->tags);
                                    @endphp
                                    <div class="tags-name mt-2 text-sm">
                                        <strong>Tags : </strong>
                                        @foreach ($tags as $tag)
                                            <a href="search-results?s={{ $tag }}"
                                                aria-label="{{ $tag }}"
                                                class="md:ml-2 hover:text-red-600 text-gray-500 text-gray-500">{{ $tag }}</a>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div> --}}
                        </div>
                    </div>
                    <div class="flex flex-col md:grid md:grid-cols-2 md:gap-4 w-full">
                        <div 
                            class="product-page-returns-policy grid sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 text-center w-full relative mt-20 col-span-2 text-sm md:text-base" wire:ignore>
                            <div
                                class="flex flex-col items-center bg-gray-100 p-2 border border-solid border-gray-200 p-4">
                                <img data-src="assets/icons/product/worldwide-shipping.svg"
                                    class="mb-2 h-12 w-14 lazyload" alt="Worldwide Shipping">
                                <div>Shipping Worldwide</div>
                            </div>
                            <div
                                class="flex flex-col items-center bg-gray-100 p-2 border border-solid border-gray-200 p-4">
                                <img data-src="assets/icons/product/return.svg" class="mb-2 h-12 w-12 lazyload"
                                    alt="Easy Return">
                                <div>Free 7-day return if eligible, so easy</div>
                            </div>
                            <div
                                class="flex flex-col items-center bg-gray-100 p-2 border border-solid border-gray-200 p-4">
                                <img data-src="assets/icons/product/bill.svg" class="mb-2 h-12 w-12 lazyload"
                                    alt="Supplier Bills">
                                <div>Supplier give bills for this product.</div>
                            </div>
                            <div
                                class="flex flex-col items-center bg-gray-100 p-2 border border-solid border-gray-200 p-4">
                                <img data-src="assets/icons/product/Pay online.svg" class="mb-2 h-12 w-14 lazyload"
                                    alt="Pay Online">
                                <div>Pay online or when receiving goods</div>
                            </div>
                        </div>

                        <!-- product details, warranty and reviews section -->
                        <div class="product-detail-reviews bg-white mt-20 w-full col-span-2">
                            <div class="product-detail-reviews-container w-full">
                                <div class="product-detail-reviews-wrapper bg-gray-100 py-6 px-2 sm:px-4 sm:px-14">
                                    <div
                                        class="product-detail-review-title sm:flex justify-between md:justify-start text-normal md:text-lg font-semibold border-b border-solid border-gray-200 pb-1">
                                        <h2
                                            class="cursor-pointer inline w-max description-btn lite-blue-color underline-links relative overflow-hidden z-10">
                                            Description</h2>
                                        <h2
                                            class="mx-4 cursor-pointer w-max addit-info-btn underline-links relative overflow-hidden z-10 hidden md:inline-flex">
                                            Additional Information</h2>
                                        <h2
                                            class="mx-4 cursor-pointer w-max addit-info-btn underline-links relative overflow-hidden z-10 inline-flex md:hidden">
                                            Additional Info</h2>
                                        <h2
                                            class="mr-4 cursor-pointer inline w-max warranty-btn underline-links relative overflow-hidden z-10 @if(!trim($product->warranty)) {{'hidden'}} @endif">
                                            Warranty</h2>
                                        <h2
                                            class="cursor-pointer inline-flex w-max reviews-btn underline-links relative overflow-hidden z-10">
                                            Reviews <span class="reviews-num">({{ $totalReviews }})</span></h2>
                                            @php
                                            $product_pdfs =  $product->pdfs;
                                            $totalPdfs = count($product_pdfs);
                                            @endphp
                                        <h2
                                        class="cursor-pointer inline-flex ml-4 overflow-hidden pdf-btn relative underline-links w-max z-10">
                                        PDFs ({{ $totalPdfs }})</h2>
                                    </div>
                                    <div class="product-detail detail mt-6 text-gray-500 w-full text-sm">
                                        <div class="product-description dynamic-data">
                                            @php
                                                $product_data = \App\Models\Product::where('name', $name )->first();
                                            @endphp
                                            @if (trim($product_data->full_description) != null)
                                                {!! $product_data->full_description !!}
                                            @endif
                                        </div>
                                        {{-- @foreach ($sub_products as $sub_product)
                                            <div class="product-description dynamic-data hidden sid-{{ $sub_product->id }}"
                                                id="product-description-{{ $sub_product->id }}">
                                                @if (trim($sub_product->full_description) != null)
                                                    {!! $sub_product->full_description !!}
                                                @endif
                                            </div>
                                        @endforeach --}}
                                    </div>
                                    <div class="product-addit-info detail mt-6 text-gray-500 text-sm w-full hidden">
                                        <div class="product-addit-info dynamic-data" id="product-addit-info">
                                            {!! \App\Models\Product::printAddtionalInformation($additional_information) !!}
                                        </div>

                                        {{-- @foreach ($sub_products as $sub_product)
                                            <div class="product-addit-info dynamic-data hidden sid-{{ $sub_product->id }}"
                                                id="product-addit-info-{{ $sub_product->id }}">
                                                {!! \App\Models\Product::printAddtionalInformation($sub_product->additional_information) !!}
                                            </div>
                                        @endforeach --}}
                                    </div>

                                    <div class="product-warrant detail mt-6 hidden text-gray-500 text-sm w-full">
                                        {{$product->warranty}}
                                    </div>

                                    <div class="review-form detail mt-6 hidden grid grid-cols-1">
                                        <div class="w-full flex flex-col lg:flex-row justify-between gap-4 md:gap-6">
                                            <div class="old-review-wrapper flex flex-col w-full">
                                                <div class="current-rating text-5xl lite-blue-color">
                                                    {{ $reviews == null ? '0.00' : number_format($reviews, 2) }}/5.00
                                                </div>
                                                <div class="old-star-ratings flex mt-4">
                                                    @php
                                                        $j = 0;
                                                    @endphp
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < (int) $reviews)
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6 mr-1 star" fill="#418ffe"
                                                                viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1"
                                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                            </svg>
                                                        @else
                                                            @php
                                                                $decimal = ($reviews - (int) $reviews) * 100;
                                                            @endphp
                                                            @if ($decimal > 0 && $j == 0)
                                                                @php
                                                                    $j = 1;
                                                                @endphp
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 mr-1 star" fill="#418ffe"
                                                                    viewBox="0 0 24 24" stroke="none">
                                                                    <defs>
                                                                        <linearGradient id="grad1">
                                                                            <stop offset="0%"
                                                                                stop-color="#418ffe" />
                                                                            <stop offset="{{ $decimal }}%"
                                                                                stop-color="#418ffe" />
                                                                            <stop offset="{{ $decimal }}%"
                                                                                stop-color="white" />
                                                                            <stop offset="100%" stop-color="white" />
                                                                        </linearGradient>
                                                                    </defs>
                                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" fill="url(#grad1)"
                                                                        stroke="#418ffe" stroke-width="1"
                                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6 mr-1 star" fill="#fff"
                                                                    viewBox="0 0 24 24" stroke="#fff"
                                                                    data-value="1">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1"
                                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                                </svg>
                                                            @endif
                                                        @endif
                                                    @endfor
                                                </div>
                                                <ul class="ratings-bar-wrapper flex flex-col w-full">
                                                    @for ($i = 5; $i > 0; $i--)
                                                        <li class="flex items-center gap-4 w-full mt-4">
                                                            <div class="star-num w-4/10">{{ $i }} Star
                                                            </div>
                                                            <div
                                                                class="rating-bar bg-gray-300 h-2 w-8/12 sm:w-5/12 lg:w-8/12 relative">
                                                                <div class="absolute h-full left-0 lite-blue-bg-color top-0"
                                                                    style="width: {{ $startReviews[$i] }}%;"></div>
                                                            </div>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="new-review-wrapper">
                                                @if (Auth::user())
                                                    {!! Form::open(['route' => ['frontend.review.store'], 'method' => 'POST', 'files' => true, 'id' => 'review_form', 'class' => 'ps-form--review']) !!}
                                                    <input type="hidden" name="customer_id" id="customer_id"
                                                        value="{{ Auth::user()->id }}" />
                                                    <div id="message"
                                                        class="text-green-500 bg-green-100 px-3 py-1 text-center hidden">
                                                        Thank you for the Review.</div>
                                                    <h3 class="text-lg font-semibold">Submit Your Review</h3>

                                                    <p class="text-gray-500 text-sm mt-4">Your email address will not
                                                        be
                                                        published.
                                                        Required fields are marked <span
                                                            class="text-red-600 ml-0.5">*</span>
                                                    </p>

                                                    <div class="flex items-center">
                                                        <p class="text-sm mt-4 text-gray-500 mr-2">Your rating of this
                                                            product
                                                        </p>
                                                        <div class="star-rating mt-4">
                                                            <input type="radio" id="star5" name="rating"
                                                                value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rating"
                                                                value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rating"
                                                                value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rating"
                                                                value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rating"
                                                                value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                        <div id="rating_err"></div>
                                                    </div>

                                                    <div class="comment">
                                                        <input type="hidden" name="product_id" class="product_id"
                                                            value="{{ $product->id }}" />
                                                        <textarea class="mt-4 focus:outline-none text-gray-500 w-full border border-solid border-gray-200 p-4"
                                                            placeholder="Write your review" name="comments" id="comments" cols="30" rows="8" required></textarea>

                                                        <div class="flex flex-col sm:flex-row justify-between">
                                                            <label for="name"
                                                                class="flex flex-col mt-4 w-full sm:w-4/12">Name
                                                                <input
                                                                    class="mt-4 p-3 focus:outline-none text-gray-500 text-sm border border-solid border-gray-200"
                                                                    type="text" name="name" id="name"
                                                                    required placeholder="Your Name" />
                                                            </label>

                                                            <label for="email"
                                                                class="flex flex-col mt-4 sm:mx-2 w-full sm:w-4/12">Email
                                                                <input
                                                                    class="mt-4 p-3 focus:outline-none text-gray-500 text-sm border border-solid border-gray-200"
                                                                    type="email" name="email" id="email"
                                                                    required placeholder="Your email" />
                                                            </label>

                                                            <label for="phone"
                                                                class="flex flex-col mt-4 w-full sm:w-4/12">Phone
                                                                <input
                                                                    class="mt-4 p-3 focus:outline-none text-gray-500 text-sm border border-solid border-gray-200"
                                                                    type="number" name="mobile" id="mobile"
                                                                    required placeholder="Your phone" />
                                                            </label>
                                                        </div>
                                                        {{-- <div class="group mt-3">
                                                            {!! Form::label('review_image', 'Upload Image:') !!} <br>
                                                            {!! Form::file('image', ['placeholder'=>'Upload Product Image ...']) !!}
                                                        </div> --}}
                                                        
                                                        <button type="submit"
                                                            class="review-btn lite-blue-bg-color btn blue-btn overflow-hidden z-10 text-white py-3 px-6 cursor-pointer w-max relative mt-4">Submit
                                                            Review</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                @else
                                                    <h3 class="bg-red-100 p-1 text-center text-red-500">Please login
                                                        before giving reviews to product</h3>
                                                    <div class="item-center justify-center flex">
                                                        <a href="/login"
                                                            class=" relative overflow-hidden blue-btn btn z-10 bg-blue-500 p-1 text-white hidden sm:inline-block m-4 p-3 "
                                                            id="login">Login</a>

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-6">
                                            <h4 class="text-xl capitalize font-semibold">Reviews</h4>
                                            @foreach ($customerReviews as $review)
                                                @php
                                                    $isBuy = App\Models\Customer::isBuyProduct($product->id, $review->customer->id);
                                                @endphp
                                                <div
                                                    class="bg-white p-4 flex flex-col w-full mt-2 border border-gray-200">
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full sm:w-3/12 lg:w-2/12">
                                                            <h4 class="font-semibold capitalize">
                                                                {{ $review->customer->name }}</h4>
                                                            <p class="text-xs text-gray-500">
                                                                {{ date('M d, Y', strtotime($review['created_at'])) }}
                                                            </p>
                                                            @if ($isBuy > 0)
                                                                <span
                                                                    class="bg-green-100 inline-block py-0 px-2 text-green-600 text-xs">Verified</span>
                                                            @else
                                                                <span
                                                                    class="bg-red-100 inline-block py-0 px-2 text-red-600 text-xs">Not-verified</span>
                                                            @endif
                                                        </div>
                                                        <div class="w-full sm:w-9/12 lg:w-10/12">
                                                            @if ($review['rating'] > 0)
                                                                <div class="rating flex flex-wrap mb-2">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        @if ($i < $review['rating'])
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 mr-1 star"
                                                                                fill="#418ffe" viewBox="0 0 24 24"
                                                                                stroke="#418ffe" data-value="1">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="1"
                                                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                                            </svg>
                                                                        @else
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-5 w-5 mr-1 star"
                                                                                fill="#fff" viewBox="0 0 24 24"
                                                                                stroke="#418ffe" data-value="1">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="1"
                                                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                                            </svg>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            @endif

                                                            <div class="text-gray-500 text-xs md:text-sm">
                                                                {{ $review['comments'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="pdf-form flex detail mt-6 hidden text-gray-500 text-sm w-full ml-4 hidden">
                                        @foreach ($product_pdfs as $pdf)
                                            <div class="text-center flex relative overflow-hidden w-full" style="width: 14rem;">
                                                <a href="{{ asset('/up_data/products/files/'.$pdf->name) }}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16"> <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/> <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/> </svg>
                                                </a>
                                                <div class="card-body"> 
                                                <a href="{{ asset('/up_data/products/files/'.$pdf->name) }}" target="_blank">{{  empty($pdf->title) ? $pdf->name : $pdf->title }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @if(count($same_products) > 0)
                <section class="same-brand-container mt-24">
                    <div class="width">
                        <h3 class="font-semibold text-2xl">More From Seller</h3>
                        @livewire('frontend.products.products-list', ['products_list' => $same_products, 'type' => 'portrate'])
                    </div>
                </section>
                @endif
                @if (count($related_products) > 0 && $related_products[0] != '')
                    <section class="related-products mt-20 mb-12 width relative">
                        <div class="items-center relative w-full py-2">
                            <div class="text-2xl font-semibold">Related Products</div>
                            @livewire('frontend.products.products-list', ['products_list' => $related_products, 'type' => 'carousel'])
                        </div>
                    </section>
                @endif
            </div>
        </div>
        @livewire('chat-box', ['chat_type' => 'site', 'vendor_id' => $vendor_id, 'chat_data' => $chat_data])
    </main>
    <script>
        var variation = document.getElementById("type");
        variation?.addEventListener("change", function(e) {
            let value = e.target.value;
            document.querySelector("#qty-exceed-error").classList.add('hidden');
            if (Number(value) == 0) {
                document.querySelector('.availability-wrapper').classList.add('hidden');
                document.getElementById("buynow").setAttribute("disabled");
                document.getElementById("add2cart").setAttribute("disabled");
                document.querySelector("#qty-exceed-error").classList.remove('hidden');
                window.scrollTo(0, 75);
            } else {
                document.querySelector('.availability-wrapper').classList.remove('hidden');
                document.getElementById("buynow").removeAttribute("disabled");
                document.getElementById("add2cart").removeAttribute("disabled");
                window.scrollTo(0, 75);
            }
            if (document.querySelectorAll(
                    `.product-img-gallery.main .product-img-gallary-wrapper img[sub-pro-id='${Number(value)}']`)
                .length > 1) {
                document.querySelector(`.product-img-gallery.main`).classList.remove('hidden');
                document.querySelectorAll('.product-img-gallery.main .product-img-gallary-wrapper img').forEach(
                    img => {
                        let pro_id = img.getAttribute('sub-pro-id');
                        if (Number(pro_id) == Number(value)) {
                            img.classList.remove('hidden');
                        } else {
                            img.classList.add('hidden');
                        }
                    });
            } else {
                document.querySelector(`.product-img-gallery.main`).classList.add('hidden');
            }
        });
    </script>
    <script>
        window.addEventListener('on_change_variation', function(){

            setTimeout(() => {
                // for data-src images
                document.querySelectorAll('.popup-img').forEach((img) => {
                    let initialImgSrc = img.getAttribute('data-src');
                    img.src = initialImgSrc;
                });

                $('.product-img-wrapper img').blowup({
                    background: 'rgb(249,250,251)',
                    width: 200,
                    height: 200,
                    border: '4px solid #000',
                    scale: 1.5
                });
            }, 300);

            // Detail page tabs issue
            let reviewsBtn = document.querySelector('.reviews-btn'),
                warrantyBtn = document.querySelector('.warranty-btn'),
                pdfBtn = document.querySelector('.pdf-btn'),
                additInfoBtn = document.querySelector('.addit-info-btn'),
                descriptionBtn = document.querySelector('.description-btn'),
                productDetail = document.querySelector('.product-detail'),
                productAdditInfo = document.querySelector('.product-addit-info'),
                reviewPost = document.querySelector('.review-form'),
                productWarranty = document.querySelector('.product-warrant'),
                contentDetail = document.querySelectorAll('.product-detail-reviews .detail'),
                pdfDetail = document.querySelector('.pdf-form'),
                allBtnHeadings = document.querySelectorAll('.product-detail-review-title h2');

            pdfBtn.addEventListener('click', () => {
                if (pdfDetail.classList.contains('hidden')) {
                    contentDetail.forEach((detail) => {
                        detail.classList.add('hidden');
                    });

                    pdfDetail.classList.remove('hidden');
                }
                allBtnHeadings.forEach((btn) => {
                    btn.classList.remove('lite-blue-color');
                });
                pdfBtn.classList.add('lite-blue-color');
            });

            descriptionBtn.addEventListener('click', () => {
                if (productDetail.classList.contains('hidden')) {
                    contentDetail.forEach((detail) => {
                        detail.classList.add('hidden');
                    });

                    productDetail.classList.remove('hidden');
                }
                allBtnHeadings.forEach((btn) => {
                    btn.classList.remove('lite-blue-color');
                });
                descriptionBtn.classList.add('lite-blue-color');
            });

            additInfoBtn.addEventListener('click', () => {
                if (productAdditInfo.classList.contains('hidden')) {
                    contentDetail.forEach((detail) => {
                        detail.classList.add('hidden');
                    });

                    productAdditInfo.classList.remove('hidden');
                }
                allBtnHeadings.forEach((btn) => {
                    btn.classList.remove('lite-blue-color');
                });
                additInfoBtn.classList.add('lite-blue-color');
            });

            reviewsBtn.addEventListener('click', () => {
                if (reviewPost.classList.contains('hidden')) {
                    contentDetail.forEach((detail) => {
                        detail.classList.add('hidden');
                    });

                    reviewPost.classList.remove('hidden');
                }
                allBtnHeadings.forEach((btn) => {
                    btn.classList.remove('lite-blue-color');
                });
                reviewsBtn.classList.add('lite-blue-color');
            });

            warrantyBtn.addEventListener('click', () => {
                if (productWarranty.classList.contains('hidden')) {
                    contentDetail.forEach((detail) => {
                        detail.classList.add('hidden');
                    });

                    productWarranty.classList.remove('hidden');
                }
                allBtnHeadings.forEach((btn) => {
                    btn.classList.remove('lite-blue-color');
                });
                warrantyBtn.classList.add('lite-blue-color');
            });
            
            // product and enlarged img gallary replacing img src on click
            let productGalleryImgs = document.querySelectorAll('.enlarged-img-container .product-img-gallary-wrapper img, .product-img-container .product-img-gallary-wrapper img');
            productGalleryImgs.forEach((img) => {
                img.addEventListener('mouseleave', () => {
                    let mainImageWrapper = document.querySelector('.product-img-wrapper img');
                    let ImageSrc = mainImageWrapper.getAttribute('default-src');
                    mainImageWrapper.setAttribute('src', ImageSrc);
                });

                img.addEventListener('mouseover', async () => {
                    let largeImage = null;
                    
                    if(img.getAttribute('file-type')!==null)
                    {
                        largeImage = await img.getAttribute('thumbnail-link');
                        type="video";
                    }
                    else
                    {
                        largeImage = await img.src.replaceAll('thumbnails', 'large');
                        type="image";
                    }
                    await setProductImage(largeImage, type);
                });

                img.addEventListener('click', async () => {
                    let largeImage = null;
                    
                    if(img.getAttribute('file-type')!==null)
                    {
                        largeImage = await img.getAttribute('thumbnail-link');
                        let large_image_element = document.querySelector('.product-img-wrapper img');
                        large_image_element.setAttribute('name', img.getAttribute('name'));
                        large_image_element.setAttribute('file-type', img.getAttribute('file-type'));
                        type="video";
                    }
                    else
                    {
                        largeImage = await img.src.replace('thumbnails', 'large');
                        let large_image_element = document.querySelector('.product-img-wrapper img');
                        large_image_element.removeAttribute('name');
                        large_image_element.removeAttribute('file-type');
                        type="image";
                    }
                    await setProductImage(largeImage, type);
                    document.querySelector('.product-img-wrapper img').setAttribute('default-src', largeImage);
                });
            });

            document.querySelector('.select-variation')?.addEventListener('change', async (e) => {
                let pId = e.target.value;

                let enlargImage;
                if (pId == 0) {
                    document.querySelector('#product-description').classList.remove('hidden');
                    enlargImage = document.querySelector(`.product-img-gallary-wrapper img[sub-pro-id='0']`);
                } else { 
                    enlargImage = document.querySelector(`.product-img-gallary-wrapper img[sub-pro-id='${pId}']`);
                }

                let largeImage = enlargImage.src.replace('thumbnails', 'large');
                await setProductImage(largeImage);
                document.querySelector('.product-img-wrapper img').setAttribute('default-src', largeImage);
                setTimeout(() => {
                    $('.product-img-wrapper img').blowup({
                        background: 'rgb(249,250,251)',
                        width: 200,
                        height: 200,
                        border: '4px solid #000',
                        scale: 1.5
                    });
                }, 50);
            });

            async function setProductImage(image, type="image") {
                $('.product-img-wrapper img').blowup({
                    background: 'rgb(249,250,251)',
                    width: 200,
                    height: 200,
                    border: '4px solid #000',
                    scale: 1.5
                });
                let productImg = document.querySelectorAll('.enlarged-img, .product-img-wrapper img');
                productImg.forEach(async (img) => {
                    img.setAttribute('src', image);
                    enlargedImg.setAttribute('src', image);
                });
                
                if(type=='video')
                {
                    productImgWrapper.classList.add("video-thumbnail");
                }
                else
                {
                    productImgWrapper.classList.remove("video-thumbnail");
                }
                return image;
            }

            // product detail modal img gallary replacing img src on click
            let popupProductModalImg = document.querySelector('.popup-product-detail-main-img'),
                popupProductModalGalleryImgs = document.querySelectorAll('.popup-product-detail-container .product-img-gallary-wrapper img');

            popupProductModalGalleryImgs.forEach((img) => {
                img.addEventListener('click', () => {
                    let clickedImgSrc = img.getAttribute('src');
                    popupProductModalImg.src = clickedImgSrc;
                    popupProductModalImg.setAttribute('default-src', clickedImgSrc);
                });
            });

            //enlarge img
            let productImgWrapper = document.querySelector('.product-img-wrapper'),
                productMainImg = document.querySelector('.product-img-wrapper img'),
                enlargeBtn = document.querySelector('.product-img-container'),
                enlargedImgContainer = document.querySelector('.enlarged-img-container'),
                closeEnlargedImgContainer = document.querySelectorAll('.enlarged-img-container, .enlarged-close-btn'),
                enlargedImg = document.querySelector('.enlarged-img-wrapper');

            productImgWrapper.addEventListener('click', () => {
                enlargedImgContainer.classList.remove('hidden');
                let scr_image = document.querySelector('.product-img-wrapper img').getAttribute('src');
                document.querySelector('.enlarged-img').setAttribute('src', scr_image);
                let check_iframe = document.querySelector('.enlarged-img-wrapper iframe');
                if(check_iframe!==null)
                {
                    check_iframe.remove();
                }
                if(productMainImg.getAttribute('file-type')!== null)
                {
                    document.querySelector('.enlarged-img-wrapper img').classList.add('hidden');
                    document.querySelector('.enlarged-img-wrapper .product-img-gallery').classList.add('hidden');
                    let pre_url = null;
                    if(productMainImg.getAttribute('file-type') == 'youtube')
                    {
                        pre_url = 'https://www.youtube.com/embed/';
                    }
                    else if(productMainImg.getAttribute('file-type') == 'file'){
                        pre_url = '/up_data/products/videos/';
                    }
                    else
                    {
                        pre_url = 'https://player.vimeo.com/video/';
                    }
                    let iframe = document.createElement('iframe');
                    iframe.setAttribute('id', 'ytplayer');
                    iframe.setAttribute('type', 'text/html');
                    iframe.setAttribute('width', '100%');
                    iframe.setAttribute('height', '500');
                    iframe.setAttribute('src', pre_url+productMainImg.getAttribute('name'));
                    iframe.setAttribute('frameborder', '0');
                    // document.querySelector('.enlarged-img-wrapper').append(`<iframe id="ytplayer" type="text/html" width="120" height="100"  
                    // src="https://www.youtube.com/embed/${productMainImg.getAttribute('name')}"
                    // frameborder="0"/></iframe>`);
                    document.querySelector('.enlarged-img-wrapper').append(iframe);
                }
                else
                {
                    document.querySelector('.enlarged-img-wrapper img').classList.remove('hidden');
                    document.querySelector('.enlarged-img-wrapper .product-img-gallery').classList.remove('hidden');
                }
                setTimeout(() => {
                    enlargedImgContainer.classList.remove('opacity-0');
                    enlargedImg.classList.add('popup-scale-1');
                    enlargedImg.classList.remove('opacity-0');
                    document.body.classList.add('body-height');
                }, 100);
            });

            // for closing large images popup
            window.addEventListener('click', (e) => {
                closeEnlargedImgContainer.forEach((btn) => {
                    if (e.target === btn) {
                        enlargedImg.classList.remove('popup-scale-1');
                        enlargedImg.classList.add('opacity-0');

                        setTimeout(() => {
                            enlargedImgContainer.classList.add('opacity-0');
                            document.body.classList.remove('body-height');
                            enlargedImgContainer.classList.add('hidden');
                        }, 300);
                    }
                });
            });

            //replace the large image with variation  thumbnail image
            document.querySelectorAll('.popup-img').forEach((img) => {
                    let initialImgSrc = img.getAttribute('data-src');
                    img.src = initialImgSrc;
            });

            //for add to cart, add to wish list icons

            if (window.localStorage !== undefined) {
            var fields = JSON.parse(window.localStorage.getItem('viewed_products'));
            let pageName = $('#pageTitle').val();
                if (fields && pageName == 'Home Page') {
                    setTimeout(() => {
                        $.ajax({
                            type: 'POST',
                            url: '/viewed_products',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: { data: fields },
                            success: function (response) {
                                var tr_str = ``;
                                var csrf_token = response['csrf_token'];
                                var url = response['url'];
                                for (var i = 0; response['data'].length - 1 >= 6 ? i <= 6 : i <= response['data'].length - 1; i++) {
                                    var id = response['data'][i].id;
                                    var name = response['data'][i].name;
                                    var slug = response['data'][i].slug;
                                    var img_url = `up_data/products/images/thumbnails/${response['data'][i].image}`;
                                    var featured = response['data'][i].featured;
                                    var hot = response['data'][i].hot;
                                    var newly = response['data'][i].new;
                                    var deals_of_the_day = response['data'][i].deals_of_the_day;
                                    var type = response['data'][i].type;
                                    var caption = '';
                                    if (featured == 'Y') {
                                        caption = 'Featured!';
                                    } else if (hot == 'Y') {
                                        caption = 'Hot!';
                                    } else if (newly == 'Y') {
                                        caption = 'New!';
                                    } else if (deals_of_the_day == 'Y') {
                                        caption = 'Deals Of The Day!';
                                    }
                                    if (caption != '') {
                                        caption = caption ? `<div class="ps-product__badge"><span class="onsale-badge">${caption}</span></div>` : '';
                                    }
                                    var active = '';
                                    if (i < 7) {
                                        active = 'active';
                                    }
                                    if (type != 'variation') {
                                        var btn_link = `<div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <form class="frm_add_to_cart" method="post" action="cart" style="display:contents;">
                                            <input type="hidden" name="_token" value="${csrf_token}" />
                                            <input type="hidden" name="product_id" class="product_id" value="${id}" />
                                            <input type="hidden" name="cmd" id="cmd" value="add2cart" />
                                            
                                            
                                                <button type="submit" style="display: contents;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                    </svg>
                                                    <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                                                </button>
                                            </form>
                                        </div>`;
                                    } else {
                                        var btn_link = `<div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <a href="${slug}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                                            </a>
                                        </div>`;
                                    }
                                    tr_str += `<div class="order-you-like flex flex-col justify-center items-center relative text-center border border-solid border-gray-200 overflow-hidden card bg-white">
                                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                        <a href="${slug}" class="order-you-like-img-wrapper overflow-hidden inline-block">
                                                <div class="sale-notify absolute top-0 left-0 text-xs bg-red-500 w-max text-white px-2 py-1">Featured!</div>
                                                <img class="lazyload order-you-like-img" data-src="${img_url}" alt="${name}" />
                                        </a>
                                        <div class="order-you-like-icons-container carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                                                ${btn_link}
                                            <div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="productQuickViews(${id})">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
                                            </div>

                                            <div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <form class="frm_add_to_wishlist" method="post" action="${url}">
                                                    <input type="hidden" name="_token" value="${csrf_token}" />
                                                    <input type="hidden" name="product_id" class="product_id" value="${id}" />
                                                        <button type="submit" style="display: contents;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                            </svg>
                                                        </button>
                                                        <div wire:ignore class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Whishlist</div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>`;
                                }
                                if (pageName == 'Home Page') {
                                    $('#viewed_products').append(tr_str);
                                } else {
                                    $('#viewed_products_list').append(tr_str);
                                }
                                recallableProductsEvents();
                            },
                            error: function (exception) {
                                console.log(exception);
                            }
                        });
                    }, 500);
                }	
            }
            else {
                console.log('Storage Failed. Try refreshing');
            }
        });
    </script>
</div>
