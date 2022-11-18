{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found dear')) --}}

@extends('frontend.layouts.app')
@section('title', 'Not Found')
@push('after-styles')
   <link rel="stylesheet" href="{{ asset('assets/styles/error.css') }}" />
@endpush
@section('content')
   <!-- main content for error page -->
   <main id="error-page" class="relative pt-20">
      <div class="error-wrapper sm-width flex flex-col relative">
         <div class="relative w-full flex flex-col">
            <div class="wave-loader">
               <div class="wave wave--0 animate inline-block"></div>
               {{-- <div class="wave wave--1 animate inline-block"></div>
               <div class="wave wave--2 animate inline-block"></div> --}}
            </div>
            <div class="wave-loader">
               {{-- <div class="wave wave--0 animate inline-block"></div> --}}
               <div class="wave wave--1 animate inline-block"></div>
               {{-- <div class="wave wave--2 animate inline-block"></div> --}}
            </div>
            <div class="wave-loader">
               {{-- <div class="wave wave--0 animate inline-block"></div> --}}
               {{-- <div class="wave wave--1 animate inline-block"></div> --}}
               <div class="wave wave--2 animate inline-block"></div>
            </div>
            <h1 class="font-semibold relative">
               <span>E</span><span>r</span><span>r</span>
               <span>o</span>
               <span>r</span>
            </h1>
            <h1 class="font-semibold relative text-right"><span>4</span><span>0</span><span>4</span></h1>
         </div>

         <h2 class="text-xl sm:text-3xl text-center mt-4 md:mt-6 font-semibold">OOPS! The requested page Cannot be found.</h2>
         <p class="text-gray-500 text-center leading-normal text-sm md:text-base mt-4 relative">
            We can't seem to find the page you are looking for, seems like you may have mis-typed the URL. Or the page has been removed, had its name changed, or is temporarily unavailable.
         </p>
         <p class="mt-4 text-center leading-normal text-sm md:text-base font-semibold">Please go back to home page or contact us</p>
         <div class="error-btn-wrapper flex justify-center mt-6 text-white relative z-40">
            <a href="/" class="mr-4">
               <button class="btn blue-btn lite-blue-bg-color px-4 md:px-6 py-2 md:py-3 relative overflow-hidden z-10">Home Page</button>
            </a>
            <a href="/contact">
               <button class="btn black-btn primary-black-bg px-4 md:px-6 py-2 md:py-3 relative overflow-hidden z-10">Contact Us</button>
            </a>
         </div>
      </div>
   </main>
@endsection
@push('after-scripts')
   <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script defer src="{{ asset('assets/js/error.js') }}"></script>
@endpush