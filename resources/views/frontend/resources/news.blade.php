@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/resources.css" />
@endpush
@section('content')
<main id="resources-page" class="relative">
    <div class="resources-container">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div
                class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Vet Resources</div>
                <div class="text-xl text-white mt-2 font-semibold" style="color: #003067;">Free Vet Resources for
                    Everyone</div>
                <p class="text-gray-200 mt-2 text-sm">Get news, research papers, product launches, videos,
                    animations,
                    medical guides and everything related to veterinary.</p>
            </div>
        </div>

        <div class="news-feed-wrapper width mt-20">
            <div class="news-feed-title-wrapper flex justify-between items-end gap-4">
                <h1 class="text-2xl font-semibold inline tracking-wide primary-black-color">News Feed</h1>
            </div>

            <div class="news-feed-wrapper grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 pt-6 gap-4 xl:gap-6">
                @foreach ($data['News'] as $key => $news)
                    <a href="{{ route('frontend.resources.news.list', $news->slug) }}" class="news p-2 text-center flex flex-col items-center card relative overflow-hidden bg-white border border-solid border-gray-200">
                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    <div class="img border-b border-solid border-gray-200 pb-2">
                        <img class=lazyload data-src="{{ asset('up_data/news/'.$news['image_thumbnail']) }}" alt="{{ $news['name']  }}" />
                    </div>
                    <h3 class="font-semibold lite-blue-color text-center text-base md:text-lg mt-4">{{ $news['name']  }}</h3>
                    @php
                        $string = strip_tags($news->short_content);
                        $length = 120;
                        if (strlen($string) > $length) {

                            // truncate string
                            $stringCut = substr($string, 0, $length);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        }
                    @endphp
                    <p class="mt-2 text-gray-500 leading-normal text-sm md:text-base">{{ $string }}</p>
                    <div class="post-date mt-2 text-gray-500">{{ date('d-m-Y',strtotime($news->publish_date)) }}</div>

                </a>
                @endforeach
            </div>
        </div>
    </div>
</main>
{{-- <div><img src="static/img/vet-resources.jpg" style="width: 100vw;" /></div>
<div class="ps-page--simple">
    <div class="ps-section--shopping ps-shopping-cart resources-listing">
        <div class="ps-container">
            <div class="newsfeed-wrapper">
                <div class="header d-flex justify-content-between">
                    <h1 class="">News Feed</h1>
                </div>
                <div class="row">
                    @foreach($data['News'] as $key => $news)
                        <div class="col-md-3 mb-4">
                            <a href="{{ route('frontend.resources.news.list', $news->slug) }}">
                                <div class="card">
                                    <img style="object-fit: cover;height: 225px;" class="card-img-top"
                                        src="{{ asset('up_data/news/'.$news['image']) }}"
                                        alt="{{ $news['name'] }}" />
                                    <div class="card-body">
                                        <p class="card-text text-center text-white">{{ $news['name'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @php
                        $pagination = $data['News']->appends( request()->except('page') )->links();
                    @endphp
                    @if(!empty(trim($pagination)))
                        <div class="ps-pagination w-100">
                            {!! $pagination !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection