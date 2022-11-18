@extends('frontend.layouts.app')
@section('meta_keywords',  $data['business-type']->name )
@section('meta_description', 'DVM Central offers a wide range of Veterinary Surgical Instruments for Small Animals such as Needle Holders, Forceps, Surgical Scissors, Retractors, Nasal and many more.') 
@section('title', $data['business-type']->name)
@push('after-styles')
    {{-- <link rel="stylesheet" href="{{ asset('static/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}"> --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/styles/business-type.css') }}" />
@endpush
@section('content')
<main id="category-page" class="relative">
    <div class="category-page-container">
        <div class="category-page-inner-container width mt-14 grid grid-cols-1 lg:grid-cols-4 gap-x-6 h-max">
            <div class="filter-categories-container lg:col-span-1 flex flex-col relative h-max">
                <div class="font-semibold text-black text-xl">Categories</div>
                <div class="filter-categories-wrapper flex flex-col md:flex-row md:justify-between lg:flex-col">
                    @if(isset($data['main-categories']))
                        <div class="bt-accordion-container w-full sm:w-max xl:w-full h-max border border-t-0 border-solid border-gray-200">
                            @foreach($data['main-categories'] as $mc)
                                @php
                                    $child_categories = \App\Models\Category::getLeftMenuCategories(['parent_id' => $mc->id]);
                                @endphp
                                @if(count($child_categories)>0)
                                    <ul class="bt-accordion-wrapper">
                                        <li class="flex justify-between w-full leading-normal font-semibold p-4 items-center border-t border-solid border-gray-200 relative overflow-hidden bg-white hover:bg-gray-100 transition-all duration-300 ease-in-out">
                                            <a href="{{ $mc->slug }}" class=mr-4> {{ $mc->name }} </a>
                                            <svg xmlns=http://www.w3.org/2000/svg class="cursor-pointer w-5 h-5 bt-open-icon absolute" fill=none viewBox="0 0 24 24" stroke=#52A0F2>
                                                <path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </li>
                                        <ul class="bt-text-hider text-gray-500 bg-gray-100">
                                            @foreach($child_categories as $key => $cc)
                                                <li class="leading-normal hover:bg-white transition-all duration-200 ease-in-out">
                                                    <a href="{{ $cc->slug }}" class="py-2 pl-8 block">{{ $cc->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                @else
                                    <ul class="border-t border-solid border-gray-200 font-semibold p-4 bg-white hover:bg-gray-100 transition-all duration-300 ease-in-out">
                                        <li>
                                            <a href="{{ $mc->slug }}"> {{ $mc->name }} </a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    @php
                    $banner = \App\Models\Banner::where(['area_id' => 12, 'status' => 'Y'])->inRandomOrder()->first();
                    @endphp
                    @if($banner)
                        @if($banner->link != '')
                            <a href="{{ $banner->link }}">
                                <img class="lazyload md:ml-4 lg:ml-0 mt-4 border border-solid border-gray-200 w-max lg:w-full"
                                    data-src="/up_data/banners/{{ $banner->image }}" alt="{{ $banner->name }}" />
                            </a>
                        @else
                            <img class="lazyload md:ml-4 lg:ml-0 mt-4 border border-solid border-gray-200 w-max lg:w-full"
                            data-src="/up_data/banners/{{ $banner->image }}" alt="{{ $banner->name }}" />
                        @endif
                    @endif
                </div>
            </div>

            <div class="category-detail-wrapper lg:col-start-2 lg:col-end-5 mt-6 lg:mt-0 h-max">
                <h1 class="category-title text-2xl font-bold">{{ $data['business-type']->name }}</h2>
                <div class="category-banner text-gray-500 mt-4 w-full">
                    @php
                        $path = 'up_data/business-type/regular-image/'.$data['business-type']->regular_image;
                    @endphp
                    @if($data['business-type']->regular_image != '')
                        <img class="lazyload w-full" data-src="{{$path}}" sizes="100%" alt="{{ $data['business-type']->name }}" />
                    @endif
                </div>
                <div class="category-description text-gray-500 leading-snug mt-4 text-sm md:text-base">
                    {!! $data['business-type']->long_description !!}
                </div>
                
                @if ($data['hot-products']->count() > 1)
                <div class="right-col hot-selling-products relative w-full mt-5">
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-semibold">Hot Selling Products</div>
                
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
                
                    <div class="hs-products-imgs-container swiper mySwiper mt-6 w-full">
                        <div class="hs-products-img-wrapper swiper-wrapper w-full">
                            @foreach($data['hot-products'] as $product)
                            @php
                                $alt = Str::replace('"', ' inch', $product->name);
                                $url = $product->slug;
                                
                                if($product->type == 'child' && $product->show_individual == 'N')
                                {
                                if($force_link)
                                $url = $force_link.'#'.$product->sku;
                                else
                                $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                                }
                                else if($product->show_individual == 'Y' && $product->link_type == 'variation')
                                {
                                $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                                }
                                $img_path = 'products/images/thumbnails/'.$product->image;
                                $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) :
                                'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';

                                $info = \App\Models\Product::getPriceText($product);
                            @endphp
                                <div class="hs swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                                    <div class="sale-notify absolute top-0 right-0 text-xs bg-red-500 w-max text-white px-2 py-1 z-10">Hot
                                    </div>
                                    <span
                                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span
                                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span
                                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span
                                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    
                                    <div class="hs-img-container relative overflow-hidden flex justify-center xl:w-full">
                                        <a href="{{ $url }}" class="hs-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                            <img class="hs-img xl:w-full swiper-lazy" src="{{ $path }}"
                                                alt="{{ $alt }}" />
                                        </a>
                                        <div class="carasoul-icons-container lite-blue-color carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                                            <div
                                                class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-cart-icon" fill="none"
                                                    viewBox="0 0 24 24" stroke="#fff">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart
                                                </div>
                                            </div>
                                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-eye-icon" fill="none"
                                                    viewBox="0 0 24 24" stroke="#fff">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View
                                                </div>
                                            </div>
                                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none"
                                                    viewBox="0 0 24 24" stroke="#fff">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To
                                                    Whishlist</div>
                                            </div>
                                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-compare-icon" fill="none"
                                                    viewBox="0 0 24 24" stroke="#fff">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <a href="{{ $product->vendor['slug'] }}"
                                        class="sold-by mx-2 py-2 border-b border-solid border-gray-200">{{ $product->vendor['name'] }}</a>
                                    <a href="#" class="p-2">
                                        <div class="hs-title lite-blue-color leading-snug">{{$product->name}}</div>
                                        <div class="hs-price font-semibold mt-1 text-lg">{{ $info['price_text'] }}</div>
                                    </a>
                                </div>
                            @endforeach
                            {{-- <div class="hs swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                                <div class="sale-notify absolute top-0 right-0 text-xs bg-red-500 w-max text-white px-2 py-1 z-10">Hot
                                </div>
                                <span
                                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span
                                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span
                                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span
                                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                
                                <div class="hs-img-container relative overflow-hidden flex justify-center xl:w-full">
                                    <a href="#" class="hs-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                        <img class="hs-img xl:w-full swiper-lazy" src="assets/imgs/top-categories/2.jpg"
                                            alt="Seller Hot Selling Product" />
                                    </a>
                                    <div
                                        class="carasoul-icons-container lite-blue-color carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-cart-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart
                                            </div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-eye-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View
                                            </div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To
                                                Whishlist</div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-compare-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                        </div>
                                    </div>
                                </div>
                
                                <a href="https://www.gervetusa.com/"
                                    class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                                <a href="#" class="p-2">
                                    <div class="same-brand-title lite-blue-color leading-snug">Castroviejo Needle Holder Tungsten
                                        Carbide Insert Jaws</div>
                                    <div class="multiple-sku text-red-400 mt-2 leading-snug text-sm">Multiple SKUs, Click for Details
                                    </div>
                                </a>
                            </div>
                
                            <div
                                class="hs swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                                <div class="sale-notify absolute top-0 right-0 text-xs bg-red-500 w-max text-white px-2 py-1 z-10">Hot
                                </div>
                                <span
                                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span
                                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span
                                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span
                                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                
                                <div class="hs-img-container relative overflow-hidden flex justify-center xl:w-full">
                                    <a href="#" class="hs-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                        <img class="hs-img xl:w-full swiper-lazy" src="assets/imgs/top-categories/3.jpg"
                                            alt="Seller Hot Selling Product" />
                                    </a>
                                    <div
                                        class="carasoul-icons-container lite-blue-color carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-cart-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart
                                            </div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-eye-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View
                                            </div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To
                                                Whishlist</div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-compare-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                        </div>
                                    </div>
                                </div>
                
                                <a href="https://www.gervetusa.com/"
                                    class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                                <a href="#" class="p-2">
                                    <div class="same-brand-title lite-blue-color leading-snug">TTA Cage Implant 7.5/19 Titanium Wing
                                        Rotates 360° Size 7.5x19mm</div>
                                    <div class="same-brand-price font-semibold mt-1 text-lg">$104.72</div>
                                </a>
                            </div>
                
                            <div
                                class="hs swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                                <div class="sale-notify absolute top-0 right-0 text-xs bg-red-500 w-max text-white px-2 py-1 z-10">Hot
                                </div>
                                <span
                                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span
                                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span
                                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span
                                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                
                                <div class="hs-img-container relative overflow-hidden flex justify-center xl:w-full">
                                    <a href="#" class="hs-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                        <img class="hs-img xl:w-full swiper-lazy" src="assets/imgs/top-categories/1.jpg"
                                            alt="Seller Hot Selling Product" />
                                    </a>
                                    <div
                                        class="carasoul-icons-container lite-blue-color carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-cart-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart
                                            </div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-eye-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View
                                            </div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To
                                                Whishlist</div>
                                        </div>
                                        <div
                                            class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-compare-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#fff">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                        </div>
                                    </div>
                                </div>
                
                                <a href="https://www.gervetusa.com/"
                                    class="sold-by mx-2 py-2 border-b border-solid border-gray-200">GerVetUSA</a>
                                <a href="#" class="p-2">
                                    <div class="hs-title lite-blue-color leading-snug">TTA Cage Implant 7.5/19 Titanium Wing Rotates
                                        360° Size 7.5x19mm</div>
                                    <div class="hs-price font-semibold mt-1 text-lg">$104.72</div>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                
                    <div class="swiper-scrollbar mt-4"></div>
                </div>
                @endif
            </div>
            @if ($data['hot-products']->count() > 1)
                <div class="owl-slider" id="bestsale" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30"
                    data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2"
                    data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($data['hot-products'] as $product)
                        {!! \App\Models\Product::productBlock($product, 'vo-hot-carousel') !!}
                    @endforeach
                </div>
            @else
                @foreach($data['hot-products'] as $product)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                        {!! \App\Models\Product::productBlock($product, 'vo-hot-carousel') !!}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</main>
    {{-- <div class="ps-container">
        <div class="ps-page--shop" id="shop-sidebar">
            <input type="hidden" name="VendorSearch" value="Business Type Page">
            <div class="ps-layout--shop">
                @include('frontend.includes.partials.left-bar-for-shop')
                <div class="ps-layout__right" data-select2-id="8">
                    <div class="ps-page__header">
                        <h1>{{ $data['business-type']->name }}</h1>
                        @php
                            $path = 'up_data/business-type/regular_image1/'.$data['business-type']->regular_image;
                            if($data['business-type']->regular_image != '' && file_exists($path))
                            {
                                $show_image = true;
                            }
                            else
                            {
                                $show_image = false;
                            }
                        @endphp
                        @if($show_image)
                            <img class="w-100" src="{{$path}}" alt="{{ $data['business-type']->name }}">
                        @endif
                        <p>{!! strip_tags($data['business-type']->long_description) !!}</p>
                    </div>
                    <div class="ps-block--shop-features">
                        <div class="ps-block__header">
                            <h3>Hot Selling Items</h3>
                            <div class="ps-block__navigation"><a class="ps-carousel__prev" aria-label="Carousel Prev" href="#bestsale"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" aria-label="Carousel Next" href="#bestsale"><i class="icon-chevron-right"></i></a></div>
                        </div>
                        <div class="ps-block__content">
                            @if ($data['hot-products']->count() > 1)
                                <div class="owl-slider" id="bestsale" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                                    @foreach($data['hot-products'] as $product)
                                        {!! \App\Models\Product::productBlock($product, 'vo-hot-carousel') !!}
                                    @endforeach
                                </div>
                            @else
                                @foreach($data['hot-products'] as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                        {!! \App\Models\Product::productBlock($product, 'vo-hot-carousel') !!}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-shopping ps-tab-root" data-select2-id="7">
            <div class="ps-shopping__header">
                <p><strong> {{ $data['list-products']->count() }}</strong> Products found</p>
                <div class="ps-shopping__actions">
                    <div class="ps-shopping__view">
                        <p>View</p>
                        <ul class="ps-tab-list">
                            <script>
                                var BusinessTypeListGridView = localStorage.getItem('BusinessTypeListGridView');
                                if(BusinessTypeListGridView == 'Grid_View'){
                                    document.write(`<li class="active"><a href="#tab-1" onclick="localStorage.setItem('BusinessTypeListGridView', 'Grid_View')"><i class="icon-grid"></i></a></li>`);
                                }else if(BusinessTypeListGridView != 'Grid_View' && BusinessTypeListGridView != 'List_View'){
                                    document.write(`<li class="active"><a href="#tab-1" onclick="localStorage.setItem('BusinessTypeListGridView', 'Grid_View')"><i class="icon-grid"></i></a></li>`);
                                }else{
                                    document.write(`<li><a href="#tab-1" onclick="localStorage.setItem('BusinessTypeListGridView', 'Grid_View')"><i class="icon-grid"></i></a></li>`);
                                }
                                if(BusinessTypeListGridView == 'List_View'){
                                    document.write(`<li class="active"><a href="#tab-2" onclick="localStorage.setItem('BusinessTypeListGridView', 'List_View')"><i class="icon-list4"></i></a></li>`);
                                }else{
                                    document.write(`<li><a href="#tab-2" onclick="localStorage.setItem('BusinessTypeListGridView', 'List_View')"><i class="icon-list4"></i></a></li>`);
                                }
                            </script>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-tabs">
            <script>
                var BusinessTypeListGridView = localStorage.getItem('BusinessTypeListGridView');
                if(BusinessTypeListGridView == 'Grid_View'){
                    document.write(`<div class="ps-tab active" id="tab-1">`);
                }else if(BusinessTypeListGridView != 'Grid_View' && BusinessTypeListGridView != 'List_View'){
                    document.write(`<div class="ps-tab active" id="tab-1">`);
                }else{
                    document.write(`<div class="ps-tab" id="tab-1">`);
                }
            </script>
                <div class="ps-shopping-product">
                    <div class="row">
                        @foreach($data['list-products'] as $product)
                            {!! \App\Models\Product::productBlock($product, 'list-products') !!}
                        @endforeach
                    </div>
                </div>
                <div class="ps-pagination">
                    {!! $data['list-products']->links() !!}
                </div>
            </div>
            <script>
                var BusinessTypeListGridView = localStorage.getItem('BusinessTypeListGridView');
                if(BusinessTypeListGridView == 'List_View'){
                    document.write(`<div class="ps-tab active" id="tab-2">`);
                }else{
                    document.write(`<div class="ps-tab" id="tab-2">`);
                }
            </script>
                <div class="ps-shopping-product">
                    @foreach($data['list-products'] as $product)
                        {!! \App\Models\Product::productBlock($product, 'list', true) !!}
                    @endforeach
                </div>
                <div class="ps-pagination">
                    {!! $data['list-products']->links() !!}
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
        <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script defer src="{{ asset('assets/js/business-type.js') }}"></script>
@endpush