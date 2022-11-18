@extends('frontend.layouts.app')
@section('title', 'Blog')
@push('head-area')
    <link rel="canonical" href="{{ URL::to('/blog') }}" />
@endpush
@section('content')
<section class="relative z-20 categories-kind">
    <div class="blogs-container width mt-14 grid grid-cols-1 lg:grid-cols-1 gap-x-6 h-max">
        {{-- <div class="blogs-left-container lg:col-span-1 flex flex-col relative h-max">
            <div class="blogs-left-wrapper flex flex-col md:flex-row md:justify-between lg:flex-col">
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
        </div> --}}
        <div class="blogs-list-wrapper lg:col-start-2 lg:col-end-5 mt-6 lg:mt-0 h-max">
            <h1 class="category-title text-2xl font-bold">Articles</h1>
            <div class="blogs-imgs-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 pt-6 gap-4 xl:gap-6">
                @foreach ($data['posts'] as $article)
                    <a href="{{url('blog').'/'.$article->slug }}" class="blog p-2 text-center flex flex-col items-center card relative overflow-hidden bg-white border border-solid border-gray-200">
                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    <div class="img border-b border-solid border-gray-200 pb-2">
                        <img class=lazyload data-src="{{ asset('up_data/blog/'.$article->image_thumbnail) }}" data-srcset="{{ asset('up_data/blog/'.$article->image_thumbnail) }}"
                            sizes="(max-width:576px) 100%, (max-width: 1024px) 350px, (max-width: 1440px) 276px, 315px" alt="How to treat your dog" />
                    </div>
                    <h3 class="font-semibold lite-blue-color text-center text-base md:text-lg mt-4">{{ $article->name }}</h3>
                    @php
                        $string = strip_tags($article->short_content);
                        $length = 100;
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
                    <div class="post-date mt-2 text-gray-500">{{ date('d-m-Y',strtotime($article->publish_date)) }}</div>

                </a>
                @endforeach
            </div>
            <div class="ps-pagination">
                {!! $data['posts']->appends( request()->except('page') )->links() !!}
            </div>
        </div>
    </div>
</section>
    <!-- Cart Page Start -->
    {{-- <div class="ps-page--blog">
        <div class="ps-container">
            <div class="ps-page__header">
                <h1>Blog</h1>
            </div>
            <div class="ps-blog">
                <div class="ps-blog__header">
                    <ul class="ps-list--blog-links">
                        <li class="active"><a href="blog-list.html">All</a></li>
                        <li><a href="blog-list.html">Life Style</a></li>
                        <li><a href="blog-list.html">Technology</a></li>
                        <li><a href="blog-list.html">Entertaiment</a></li>
                        <li><a href="blog-list.html">Business</a></li>
                        <li><a href="blog-list.html">Others</a></li>
                        <li><a href="blog-list.html">Fashion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
@endsection