@extends('frontend.layouts.app')
@section('meta_keywords', $data['heading'])
@section('meta_description', $data['short_description'])
@section('title', $data['heading'] )
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('static/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
@endpush
@section('content')
<main id="category-page" class="relative">
    <input type="hidden" name="pageTitle" id="pageTitle" value="Order You Like Page" />
    @if($data['banner_header'] != '')
        @php
            $path = 'banners/vendor/' . $data['banner_header']->image;
        @endphp
        <img class="w-full lazyload" data-src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/1519x304.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{ $data['banner_header']->name }}">
    @else
        <img class="w-full lazyload" data-src="https://via.placeholder.com/1519x304.png?text=Banner+Top" alt="Today Deals Page Top Banner">
    @endif
    <div class="category-page-container">
        <div class="category-page-inner-container width mt-14 grid grid-cols-1 lg:grid-cols-4 gap-x-6 h-max">
            <div class="filter-categories-container lg:col-span-1 flex flex-col relative h-max">
                <div class="font-semibold text-black text-xl">{{ $data['heading'] }}</div>
                <div class="filter-categories-wrapper flex flex-col md:flex-row md:justify-between lg:flex-col">
                    @php
                    $left_banner = \App\Models\Banner::where(['area_id' => 12, 'status' => 'Y'])->inRandomOrder()->first();
                    @endphp
                    @if($left_banner)
                        @if($left_banner->link != '')
                            <a href="{{ $left_banner->link }}">
                                <img class="lazyload md:ml-4 lg:ml-0 mt-4 border border-solid border-gray-200 w-max lg:w-full"
                                    data-src="/up_data/banners/{{ $left_banner->image }}" alt="{{ $left_banner->name }}" />
                            </a>
                        @else
                            <img class="lazyload md:ml-4 lg:ml-0 mt-4 border border-solid border-gray-200 w-max lg:w-full"
                                data-src="/up_data/banners/{{ $left_banner->image }}" alt="{{ $left_banner->name }}" />
                        @endif
                    @endif
                </div>
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
            </div>
        </div>
    </div>
</main>
    {{-- <div>
        @if($data['banner_header'] != '')
        @php
            $path = 'banners/vendor/' . $data['banner_header']->image;
        @endphp
        <img class="w-100 lazyload" data-src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/1519x304.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{ $data['banner_header']->name }}">
        @else
            <img class="w-100 lazyload" data-src="https://via.placeholder.com/1519x304.png?text=Banner+Top" alt="Today Deals Page Top Banner">
        @endif
    </div> --}}
    {{-- <div class="ps-container">
        <input type="hidden" id="productSection" name="{{$data['heading']}}" value="{{$data['heading']}} Page">
        <div class="ps-page--shop" id="shop-sidebar">
            <div class="ps-layout--shop">
                @include('frontend.includes.partials.left-bar-for-shop')
                <div class="ps-layout__right" data-select2-id="8">
                    <div class="ps-page__header">
                        <h1>{{$data['heading']}}</h1>
                        <p>{{$data['short_description']}}</p>
                    </div>
                    <div class="ps-shopping-product" id="viewed_products_list">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @push('head-area')
        <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/tooltipster/dist/css/tooltipster.bundle.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-shadow.min.css') }}"/>
    @endpush
    @push('after-scripts')
        <script type="text/javascript" src="{{ asset('static/plugins/tooltipster/dist/js/tooltipster.bundle.min.js') }}"></script>
        <script src="{{ asset('static/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    @endpush
@endsection
