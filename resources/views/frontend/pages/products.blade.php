@extends('frontend.layouts.app')
@section('meta_keywords', $data['heading'])
@section('meta_description', $data['short_description'])
@section('title', $data['heading'])
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/category.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.css" integrity="sha512-wbWvHguVvzF+YVRdi8jOHFkXFpg7Pabs9NxwNJjEEOjiaEgjoLn6j5+rPzEqIwIroYUMxQTQahy+te87XQStuA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.min.css" integrity="sha512-pJrGHWDVOeiy4UkMtHu0fpD8oLLssFcaW0fsVXUkA1/jDLopa554Z1AZo5SKtekHnnmyat0ipiP0snKDrt0GNg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
@section('content')
<main id="category-page" class="relative">
    @if($data['banner_header'] != '')
    @php
        $path = 'banners/' . $data['banner_header']->image;
    @endphp
    <div class="relative hero-banner-wrapper w-full h-auto bg-white">
        <img class="w-full absolute top-0 left-0 h-full" src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://www.dvmcentral.com/up_data/banners/today-deals-1657884928.jpg'}}" alt="{{ $data['banner_header']->name }}">
        @else
            <img class="w-full absolute top-0 left-0 h-full" src="https://via.placeholder.com/1519x304.png?text=Banner+Top" alt="Today Deals Page Top Banner">
        @endif
    </div>
    <div class="category-page-container">
        <div class="category-page-inner-container width mt-14 grid grid-cols-1 lg:grid-cols-4 gap-x-6 h-max">
            <div class="filter-categories-container lg:col-span-1 flex flex-col relative h-max">
                <div class="font-semibold text-black text-xl">{{ $data['heading'] }}</div>
             
                    @php
                    $left_banner = \App\Models\Banner::where(['area_id' => 12, 'status' => 'Y'])->inRandomOrder()->first();
                    @endphp
                    @if($left_banner)
                        @if($left_banner->link != '')
                            <a href="{{ $left_banner->link }}" class="relative left-img-wrapper bg-white mt-4 border border-solid border-gray-200 hidden lg:inline-block">
                                <img class="lazyload absolute top-0 left-0 w-full h-full"
                                    data-src="/up_data/banners/{{ $left_banner->image }}" alt="{{ $left_banner->name }}" />
                            </a>
                        @else
                        <div class="bg-white relative left-img-wrapper mt-4 border border-solid border-gray-200 hidden lg:inline-block">
                            <img class="lazyload absolute top-0 left-0 w-full h-full"
                                data-src="/up_data/banners/{{ $left_banner->image }}" alt="{{ $left_banner->name }}" />
                        </div>
                        @endif
                    @endif
            </div>

            <div class="category-detail-wrapper lg:col-start-2 lg:col-end-5 mt-6 lg:mt-0 h-max">
                <h2 class="category-title text-2xl font-bold">
                    @if(@$data['listing_type'] == 'products_search')
                        Search Results for "{{ request()->input('s') }}"
                        <input type="hidden" name="Search" value="Search Page">
                    @elseif(isset($data['category']))
                        <input type="hidden" name="Category" value="{{ URL::current() }}">
                        {{ $data['category']->name }}
                    @endif
                </h2>
                @livewire('frontend.products.products-list', ['products_list'=>$data['products']])
            </div>
        </div>
    </div>
</main>
{{-- <div class="ps-container" style="display: none;">
    <input type="hidden" id="productSection" name="{{$data['heading']}}" value="{{$data['heading']}} Page">
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="ps-layout--shop">
            @include('frontend.includes.partials.left-bar-for-shop')
        </div>
    </div>
</div> --}}
@endsection
