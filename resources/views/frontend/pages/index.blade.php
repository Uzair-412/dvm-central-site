@extends('frontend.layouts.app')
@section('title', $data['page']->meta_title)
@section('meta_keywords', $data['page']->meta_keywords)
@section('meta_description', $data['page']->meta_description)
@push('head-area')
    {{-- <link rel="canonical" href="{{ URL::to('/pages/'.$data['page']->slug) }}" /> --}}
@endpush
@section('content')
    <main id="privacy-policy-page" class="relative">
        
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
            <h1 class="text-3xl md:text-5xl absolute top-2/4 left-2/4 text-white z-20 text-center w-full md:w-auto px-2">{{ $data['page']->heading }}</h1>
            <img
                class="absolute top-0 left-0 w-full h-full object-cover"
                src="assets/imgs/privacy-policy/privacy-policyx1440.jpg"
                srcset="
                    assets/imgs/privacy-policy/privacy-policyx1920.jpg 1920w,
                    assets/imgs/privacy-policy/privacy-policyx1440.jpg 1440w,
                    assets/imgs/privacy-policy/privacy-policyx1024.jpg 1024w,
                    assets/imgs/privacy-policy/privacy-policyx768.jpg   768w,
                    assets/imgs/privacy-policy/privacy-policyx576.jpg   576w
                "
                sizes="100%"
                alt="Privacy Policy"
            />
        </div>
        <div class="privacy-policy-container dynamic-data mt-20 sm-width">{!! $data['page']->content !!}</div>
    </main>
@endsection