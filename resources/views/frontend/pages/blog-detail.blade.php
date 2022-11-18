@extends('frontend.layouts.app')
@if($data['post']->meta_title != '')
    @section('title', $data['post']->meta_title)
@else
    @section('title', $data['post']->heading_content . ' - Blog')
@endif
@section('meta_keywords', $data['post']->meta_keywords)
@section('meta_description', $data['post']->meta_description)
@push('head-area')
    <link rel="canonical" href="{{ URL::to('/blog/'.$data['post']->slug) }}" />
@endpush
@section('content')
    <section class="blog-page-section with-sidebar mb-5">
        <div class="ps-container dynamic-data mt-20 width">
            <div class="flex flex-col xl:flex-row">
                <div class="left-col xl:w-9/12 xl:mr-10">
                    <div class="blog-post post-details single-block">
                        <div class="blog-content">
                            <header>
                                <div class="heading-content">
                                    <h2 class="blog-title text-lg">{{ $data['post']->heading_content }}</h2>
                                    <div class="post-meta  my-2">
                                        {{-- <span class="post-author">
                                            <i class="fas fa-user"></i>
                                            <span class="text-gray">Posted by : </span>
                                            admin
                                        </span>
                                        <span class="post-separator">|</span> --}}
                                        <span class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="text-gray">On : </span>
                                            {{ date('M d, Y', strtotime($data['post']->publish_date)) }}
                                        </span>
                                    </div>
                                </div>
                            </header>
                            @if($data['post']->image != '')
                                <div class="mb-4">
                                    <img src="/up_data/blog/{{ $data['post']->image }}" class="img-fluid w-screen" alt="{{ $data['post']->heading_content }}">
                                </div>
                            @endif
                            <article>
                                @php
                                    $img = Str::replace("src=","data-src=",$data['post']->full_content);
                                    $size = Str::replace("<img","<img width='600' height='600'",$img);
                                    $iframe = Str::replace('<iframe frameborder="0" data-src=','<iframe frameborder="0" src=',$size);
                                    echo $iframe;   
                                @endphp
                                {{-- {!! $data['post']->full_content !!} --}}
                            </article>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                            {!! \App\Models\Banner::showBanner(7, 'ps-collection promo-image w-full overflow-image ls-is-cached lazyloaded') !!}
                        </div>   
                    </div>
                </div>

                <div class="right-col related-blog mt-12 lg:mt-0 xl:w-3/12 lg:grid">
                    @if($data['recent_posts'])
                        <div class="related-blog-wrapper">
                            <h2 class="leading-snug font-semibold text-xl sm:text-3xl">RECENT POSTS</h2>
                            <div class="mt-8 related-news-wrapper grid sm:grid-cols-2 sm:gap-2 md:grid-cols-3 gap-3 lg:gap-6 xl:grid-cols-1">
                                @foreach($data['recent_posts'] as $rp)
                                    <div>
                                        <a aria-label="{{ $rp->name }}" href="/blog/{{ $rp->slug }}"><img src="/up_data/blog/{{ $rp->image_thumbnail }}" title="{{ $rp->name }}" alt="{{ $rp->name }}" class="img-fluid img-thumbnail" /></a>
                                        <a aria-label="{{ $rp->name }}" href="/blog/{{ $rp->slug }}">{{ $rp->name }}</a>
                                    </div>
                                @endforeach
                             </div>
                            {{--<ul class="sidebar-list">
                                @foreach($data['recent_posts'] as $rp)
                                <li><a href="/blog/{{ $rp->slug }}">{{ $rp->name }}</a></li>
                                @endforeach
                            </ul>--}}
                        </div>
                    @endif 
                </div>
            </div>
        </div>
    </section>
@endsection