@extends('frontend.layouts.app')
@php
    $title = trim($data['category']->meta_title);
    if($title != null && $title != 'NULL')
            $title = $data['category']->meta_title;
    else
        $title = $data['category']->name;
    if($data['category']->do_index == 'N' || $data['category']->status == 'N')
        $no_index = 'NOINDEX';
@endphp
@section('title', $title)
@if(trim($data['category']->meta_keywords) != null)
    @section('meta_keywords', $data['category']->meta_keywords)
@endif
@if(trim($data['category']->meta_description) != null)
    @section('meta_description', $data['category']->meta_description)
@endif
@if($data['category']->is_canonical == 'Y')
    @php
        if($data['category']->canonical_url != '')
            $url = $data['category']->canonical_url;
        else
            $url = URL::to( '/' . $data['category']->slug);
    @endphp
@else
    @php
        $url = URL::current();
    @endphp
@endif
@push('head-area')
    <link rel="canonical" href="{{ $url }}" />
    @if(isset($no_index))
        <META NAME="ROBOTS" CONTENT="{{ $no_index }}">
    @endif
@endpush
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/category.css') }}" />
@endpush
@section('content')
    <main id="category-page" class="relative">
        <div class="category-page-container">
            <div class="category-page-inner-container width mt-14 grid grid-cols-1 lg:grid-cols-4 gap-x-6 h-max">
                <div class="filter-categories-container lg:col-span-1 flex flex-col relative h-max">
                    <div class="font-semibold text-black text-xl">Categories</div>
                    <div class="filter-categories-wrapper relative bg-white mt-4 border border-solid border-gray-200">
                        <img class="lazyload absolute top-0 left-0 w-full h-full"
                            data-src="assets/imgs/product-listing-left-banner-1630336563.jpg"
                            alt="Product Listing-banner" />
                    </div>
                </div>
                <div class="category-detail-wrapper lg:col-start-2 lg:col-end-5 mt-6 lg:mt-0 h-max">
                    <h1 class="category-title text-2xl font-bold">{{ $data['category']->name }}</h1>
                    <div class="category-description text-gray-500 leading-snug mt-4 text-sm md:text-base">
                        {!! $data['category']->short_description !!}
                    </div>
                    @livewire('frontend.categories.categories-list', ['categories'=>$data['categories'], 'gridClass'=>'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4'])
                    @if (!empty($data['category']))
                    <div id="full_description"
                        class=" text-gray-500 dynamic-data leading-snug my-4 text-sm md:text-base border-b border-solid border-gray-200 pb-6">

                        @if (strlen($data['category']->description) > 1200)
                            {!! implode(' ', array_slice(explode(' ', $data['category']->description), 0, 165)) !!} {{ '. . . . .' }}
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
 @endpush   