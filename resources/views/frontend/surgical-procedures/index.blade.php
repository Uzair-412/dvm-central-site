@extends('frontend.layouts.app')
@section('title', $data['meta_title'])
@section('meta_keywords', $data['meta_keywords'])
@section('meta_description', $data['meta_description'])
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/programs.css') }}" />
<style>
    .years-month-wrapper .underline-anchors::before {
        background-color: rgba(229, 231, 235, var(--tw-border-opacity));
    }

    .years-month-wrapper .underline-anchors::before,
    .years-month-wrapper .underline-anchors::after {
        transition: all 0.5s cubic-bezier(0.87, 0, 0.13, 1);
        -webkit-transition: all 0.5s cubic-bezier(0.87, 0, 0.13, 1);
        -moz-transition: all 0.5s cubic-bezier(0.87, 0, 0.13, 1);
        -ms-transition: all 0.5s cubic-bezier(0.87, 0, 0.13, 1);
        -o-transition: all 0.5s cubic-bezier(0.87, 0, 0.13, 1);
    }
</style>
@endpush
@section('content')
<main id="" class="relative">
    <div class="programs-container">
        <div class="w-full h-full relative overflow-hidden">
            <div class="header-img w-full h-full relative overflow-hidden">
                <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-6">
                    <div class="text-xl font-semibold text-white px-2" style="background-color: #003067">Resources</div>
                    <div class="text-2xl text-white mt-2 font-semibold">Educational Programs</div>
                    <p class="text-gray-200 mt-2 text-sm">Free research papers, books, videos, and more.</p>
                </div>
            </div>
        </div>
        <div class="width mt-20">
            <div class="trade-shows-wrapper flex flex-col xl:flex-row">
                <div class="md:w-96 xl:w-3/12 h-max order-2 xl:order-1 mt-12 xl:mt-0">
                    @foreach($data['categories'] as $category)
                    <div class="year-wrapper bg-white border border-solid border-gray-200 mb-4 p-2 md:p-4 xl:mr-4"
                        id="">
                        <div class="year font-semibold text-lg mb-2">{{ $category->name }}</div>
                        <ul class="years-month-wrapper text-gray-500 ml-4 text-sm md:text-base">
                            @php
                            $j=0;
                            @endphp
                            @foreach($category->articles as $article)
                            <li>
                                <a href="/resources/surgical-procedures/{{ $category->slug }}/{{ $article->slug }}"
                                    class="block py-3 @iF($j==0) border-t border-solid border-gray-200 @endif relative overflow-hidden underline-anchors">{{
                                    $article->name }}</a>
                            </li>
                            @php
                            $j++;
                            @endphp
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
                @if($data['section'] == 'page')
                <div class="events-container dynamic-data xl:w-9/12 order-1 xl:order-2 bg-white border-solid border border-gray-200 p-2 sm:p-4 md:p-6 h-max">
                    <div class="filter-date text-xl font-semibold">{{ $data['page']->heading }}</div>
                    <div class="events-wrapper text-gray-500 leading-relaxed text-sm md:text-base pb-5">
                        {!! $data['page']->content !!}
                    </div>
                </div>
                @elseif($data['section'] == 'categories')
                    <div class="events-container dynamic-data xl:w-9/12 order-1 xl:order-2 bg-white border-solid border border-gray-200 p-2 sm:p-4 md:p-6 h-max">
                        <div class="filter-date text-xl font-semibold">{{ $data['category']->name }}</div>
                        <div class="events-wrapper text-gray-500 leading-relaxed text-sm md:text-base pb-5">
                            <p>{{ $data['category']->description }}</p>
                        </div>

                        @foreach($data['articles'] as $article)
                            @php
                                $link = '/resources/surgical-procedures/'.$data['category']->slug.'/'.$article->slug;
                            @endphp
                            <hr size="1">
                            <div class="pt-5 font-semibold">{{ $article->name }}</div>
                            <div class="events-wrapper text-gray-500 leading-relaxed text-sm md:text-base pb-5">
                                <p>{{ $article->short_content }}</p>
                                <div class="pt-2">
                                    <a href="{{ $link }}" class="text-blue-400">Read More ...</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="events-container dynamic-data xl:w-9/12 order-1 xl:order-2 bg-white border-solid border border-gray-200 p-2 sm:p-4 md:p-6 h-max">
                        <div class="filter-date text-xl font-semibold">{{ $data['article']->heading_content }}</div>
                        <div class="events-wrapper text-gray-500 leading-relaxed text-sm md:text-base">
                            {!! $data['article']->full_content !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection