@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/styles/category.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css') }}" />
@endpush
@php
$banner = null;
if (isset($data['category'])) {
    if (isset($data['category']->meta_title)) {
        $title = $data['category']->meta_title;
    } else {
        $title = $data['category']->name;
    }
    if ($data['category']->do_index == 'N' || $data['category']->status == 'N') {
        $no_index = 'NOINDEX';
    }
    if (isset($data['category']->is_canonical) && $data['category']->is_canonical == 'Y') {
        if ($data['category']->canonical_url != '') {
            $url = $data['category']->canonical_url;
        } else {
            $url = URL::to('/' . $data['category']->slug);
        }
    }
    if (isset($data['category']->banner_id) && $data['category']->banner_id > 0) {
        $banner = \App\Models\Banner::getBanner($data['category']->banner_id);
    }
} else {
    $title = '';
}
if (!isset($url)) {
    $url = URL::current();
}
@endphp
@if ($data['listing_type'] == 'products_search')
    @section('title', 'Search Results for ' . request()->input('s'))
@elseif(isset($data['category']))
    @php
        if (isset($data['category']->meta_title)) {
            $title = $data['category']->meta_title;
        } else {
            $title = $data['category']->name;
        }
    @endphp
    @section('title', $title)
    @if (isset($data['category']->meta_keywords) && trim($data['category']->meta_keywords) != null)
        @section('meta_keywords', $data['category']->meta_keywords)
    @endif
    @if (isset($data['category']->meta_description) && trim($data['category']->meta_description) != null)
        @section('meta_description', $data['category']->meta_description)
    @endif
@endif
@push('head-area')
    <link rel="canonical" href="{{ $url }}" />
    @if (isset($no_index))
        <META NAME="ROBOTS" CONTENT="{{ $no_index }}">
    @endif
@endpush
@section('content')
    <main id="category-page" class="relative">
        <div class="category-page-container">
            <div class="category-page-inner-container width mt-14 grid grid-cols-1 lg:grid-cols-4 gap-x-6 h-max">
                <div class="filter-categories-container lg:col-span-1 flex flex-col relative h-max">
                    <div class="font-semibold text-black text-xl">Categories</div>
                    <div class="filter-categories-wrapper flex flex-col md:flex-row md:justify-between lg:flex-col relative bg-white">
                        @php
                            $left_banner = \App\Models\Banner::where(['area_id' => 12, 'status' => 'Y'])
                                ->inRandomOrder()
                                ->first();
                        @endphp
                        @if ($left_banner)
                            @if ($left_banner->link != '')
                                <a href="{{ $left_banner->link }}">
                                    <img class="lazyload md:ml-4 lg:ml-0 mt-4 border border-solid border-gray-200 w-max lg:w-full absolute top-0 left-0 w-full h-full"
                                        data-src="/up_data/banners/{{ $left_banner->image }}"
                                        alt="{{ $left_banner->name }}" />
                                </a>
                            @else
                                <img class="lazyload md:ml-4 lg:ml-0 mt-4 border border-solid border-gray-200 w-max lg:w-full absolute top-0 left-0 w-full h-full"
                                    data-src="/up_data/banners/{{ $left_banner->image }}"
                                    alt="{{ $left_banner->name }}" />
                            @endif
                        @endif
                    </div>
                </div>
                <div class="category-detail-wrapper lg:col-start-2 lg:col-end-5 mt-6 lg:mt-0 h-max">
                    <div class="flex items-center justify-center w-full">
                        <h1 class="category-title text-2xl font-bold w-full">
                            @if ($data['listing_type'] == 'products_search')
                                Search Results for "{{ request()->input('s') }}"
                                <input type="hidden" name="Search" value="Search Page">
                            @elseif(isset($data['category']))
                                <input type="hidden" name="Category" value="{{ URL::current() }}">
                                {{ $data['category']->name }}
                            @endif
                        </h1>
                        <div class="flex justify-end items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer mr-2 col-active" fill="none" viewBox="0 0 24 24" stroke="#555" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer grid-active show-grid-col white-svg" fill="none" viewBox="0 0 24 24" stroke="#555" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                        </div>
                   </div>
                    @if (isset($data['category']))
                        <div
                            class="text-gray-500 leading-snug mt-4 text-sm md:text-base border-b border-solid border-gray-200 pb-6">
                            {!! $data['category']->short_description !!}
                        </div>
                    @endif
                    @if ($banner)
                        <div class="category-description text-gray-500 leading-snug mt-4 text-sm md:text-base">
                            {!! $banner !!}
                        </div>
                    @endif
                    @livewire('frontend.products.products-list', ['products_list' => $data['products']])
                    <div class="mt-2">{!! $data['products']->appends(request()->except('page'))->links('pagination::tailwind') !!}</div>
                    {{-- <livewire:frontend.products.products-list :products_list="$data['products']" /> --}}
                    {{-- @forelse ($data['products'] as $deals)
                    {!! \App\Models\Product::productBlock($deals, 'list', true) !!}
                @empty
                    <h3 class="text-gray-500 mt-4 text-center">Sreach Not Found</h3>
                @endforelse --}}
                    {{-- <div class="ps-pagination">
                    {!! $data['products']->appends( request()->except('page') )->links() !!}
                </div> --}}

                    @if (!empty($data['category']))
                        <div id="full_description"
                            class=" text-gray-500 dynamic-data leading-snug my-4 text-sm md:text-base border-b border-solid border-gray-200 pb-6">

                            @if (strlen($data['category']->description) > 1200)
                                {!! implode(' ', array_slice(explode(' ', $data['category']->description), 0, 170)) !!} {{ '. . . . .' }}
                            @else
                                {!! $data['category']->description !!}
                            @endif

                        </div>
                        @if (strlen($data['category']->description) > 1200)
                            <button type="button" id="load_more_description"
                                class="blue-btn btn h-auto lite-blue-bg-color mt-4 overflow-hidden px-6 py-3 relative sm:mt-0 text-center text-white z-10">Show
                                More</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@push('after-scripts')
    <script type="text/javascript">
        let more_info = <?php echo json_encode(@$data['category']->description); ?>;
        document.getElementById('load_more_description').addEventListener("click", function() {
            document.getElementById("full_description").innerHTML = more_info;
            document.getElementById('load_more_description').style.display = 'none';
        });
    </script>
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
        <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
    <script defer src="{{ asset('assets/js/category.js') }}"></script>
@endpush
