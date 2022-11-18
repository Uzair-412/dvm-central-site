@extends('frontend.layouts.app')
@section('title', @$data['page']->heading)
@push('head-area')
    <link rel="canonical" href="{{ URL::to('/trade-shows') }}" />
@section('title', $data['meta_title'])
@section('meta_keywords', $data['meta_keywords'])
@section('meta_description', $data['meta_description'])
@push('after-styles')
    <style>
        #programs p {
            margin-bottom: 2px;
        }

        #programs .heading {
            color: #000000;
        }

        .main-heading,
        .filter-heading {
            font-weight: 500;
            color: #000000;
            text-transform: capitalize;
        }

        .main-heading {
            font-size: 24px;
        }

        .filter-heading {
            font-size: 18px;
        }

        .sub-heading {
            font-weight: 500;
            color: #686868;
            font-size: 14px;
            text-transform: capitalize;
        }

        .education-body {
            background: #f7f7f7;
            padding: 50px 20px;
        }

        .education-body .filter-wrapper {
            background: #fff;
            padding: 10px;
            height: 100%;
            box-shadow: 0 0.25rem 1rem #00000026;
        }

        .filter-wrapper .filter-section {
            border: 1px solid #eee;
            padding: 8px;
            border-radius: 10px;
        }

        #programs .card {
            background: #ffffff;
            box-shadow: 0 0.25rem 1rem #00000026;
        }
    </style>
@endpush
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/trade-shows.css" />
@endpush
@section('content')
<!-- page content -->
<main id="trade-shows-page" class="relative">
	<div class="trade-shows-container">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-6">
                <div class="text-2xl text-white mt-2 font-semibold px-2 py-6">Trade Shows</div>
            </div>
        </div>
        <div class="trade-shows-page-container width mt-20">
            <div class="trade-shows-wrapper flex flex-col xl:flex-row">
                <div class="trade-show-years-wrapper md:w-96 xl:w-3/12 h-max order-2 xl:order-1 mt-12 xl:mt-0 pb-5">
                @for($i = $data['start_year'] ; $i >= $data['end_year'] ; $i--)

                        <div class="year-wrapper mt-7 bg-white border border-solid border-gray-200 p-2 md:p-4 xl:mr-4" id="">
                            <div class="year font-semibold text-lg mb-2">{{$i}}</div>
                            <ul class="years-month-wrapper text-gray-500 ml-4 text-sm md:text-base">
                                @php
                                    $j=0
                                @endphp
                                @foreach($monthsArray as $month => $name)
                                    @php
                                        $count = \App\Models\Show::select(\DB::raw('COUNT(id) AS tot'))->whereYear('start_date', $i)->whereMonth('start_date', $month)->first();
                                    @endphp
                                    @if($count->tot > 0)
                                        <li>
                                            <a href="/trade-shows/?year={{ $i }}&month={{ $month }}" class="block py-3 @iF($j==0) border-t border-solid border-gray-200 @endif relative overflow-hidden underline-anchors">{{ ucfirst(strtolower($name)) }} ({{ $count->tot }})</a>
                                        </li>
                                    @endif
                                    @php
                                        $j++;
                                    @endphp
                                @endforeach
                            </ul>
                        </div>

                @endfor
                </div>
                <div class="events-container xl:w-9/12 order-1 xl:order-2">
                    <div class="filter-date text-xl font-semibold primary-blue-color mb-6">{{ $data['selected_date'] }}</div>
                    <p>{!! $data['page']->content !!}</p>
                    <div class="events-wrapper grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($data['shows'] as $show)
                            @php
                                $image = '/up_data/shows/'.$show->image_thumbnail;
                                $link = '';
                                if($show->link != '')
                                    $link = $show->link;
                            @endphp
                            <div class="event flex flex-col text-center items-center border border-solid border-gray-200 bg-white card relative overflow-hidden p-3">
                                <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                @if ($show->image_thumbnail != '')
                                    <a href="{{ $link }}" target="_blank" class="event-banner-wrapper relative overflow-hidden w-full border-b border-solid border-gray-200">
                                        <img class="event-banner lazyload absolute top-0 left-0 w-full h-full" src="{{ $image }}" alt="{{ $show->heading_content }}" />
                                    </a>
                                @else
                                    <div class="show-card-title mt-4 text-lg font-semibold">
                                        {{ $show->start_date . ' / ' . $show->end_date }}</div>
                                    <div class="show-card-title mt-4 text-lg font-semibold">
                                        {{ $show->name }}
                                    </div>
                                @endif
                                @if ($show->location != '')
                                    <header>
                                        <h4 class="blog-title mt-3">
                                            {{ $show->location }}</h4>
                                    </header>
                                @endif
                                @if ($show->details_link != '' || trim(strip_tags($show->details)) != null)
                                    @php
                                        if ($show->details_link != '') {
                                            $link_d = $show->details_link;
                                        } else {
                                            $link_d = 'trade-shows/' . $show->id . '-' . $show->name;
                                        }
                                    @endphp
                                    <a class="my-4 btn blue-btn lite-blue-bg-color text-white px-4 md:px-6 py-2 md:py-3 z-10 relative overflow-hidden"
                                        href="{{ $link_d }}"> Read
                                        More </a>
                                @endif
                                <a class="my-4 btn blue-btn lite-blue-bg-color text-white px-4 md:px-6 py-2 md:py-3 z-10 relative overflow-hidden" href="{{ $link }}"> Visit Now </a>
                            </div>
                        @endforeach
                    </div>
                    {{ $data['shows']->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
