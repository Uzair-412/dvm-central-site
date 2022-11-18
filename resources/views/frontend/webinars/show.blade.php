@extends('frontend.layouts.virtual')

@section('content')
@push('after-styles')
    <style>
        #showparagraph{
            transition: height 1s ease-in-out;
            max-height: 10vw; 
            overflow: hidden;
            
        }
        .h-full{
            transition: height 1s ease-in-out;
            max-height: 100% !important; 
            
        }
    </style>
@endpush
<div class="container content-container py-6 mx-auto xl:px-10">
    <div class="flex flex-wrap">
        <div class="left-side hidden md:block xl:w-1/4 md:w-1/3 w-full pb-6 md:pb-0 md:pr-6">
            <div class="bg-white shadow p-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:pr-8 mb-4">
                        <p class="text-xl font-bold">More Webinars</p>
                        <p class="text-sm mt-2">You may also like other webinars</p>
                    </div>
                    <div class="related-companies-container flex-col w-full">
                        @foreach ($data['webinars'] as $webinar)
                            <a href="/events/{{$event->slug}}/webinars/{{$webinar->id}}" class="related-company-wrapper w-full flex justify-between items-center pb-2">
                                <div class="related-company-detail-wrapper flex">
                                    <div class="related-company-logo flex items-center w-full">
                                        <img class="mr-4" src="{{asset('up_data/webiners/images/'.$webinar->image)}}" alt="">
                                        <div class="related-company-detail flex-col">
                                            <p class="related-company-name text-sm primary-color font-semibold">{{$webinar->name}}</p>											
                                        </div>
                                    </div>
                                </div>						
                            </a>
                        @endforeach
                    </div>							
                </div>
            </div>
        </div>

        <div class="xl:w-2/4 md:w-2/3 w-full">
            <div class="bg-white shadow rounded">
                <div class="relative">
                    <img class="hero-img shadow rounded-t w-full object-cover object-center" src="{{ asset('up_data/webiners/images/'.$data['webinar']->image) }}" alt="{{$data['webinar']->name}}">
                </div>
                <div class="px-5 xl:px-10 pb-10">
                    <div class="pt-3 xl:pt-5 flex flex-col sm:flex-row items-start xl:items-center justify-between pb-6 border-b">
                        <div class="mt-4 text-center w-full sm:w-auto sm:text-left xl:text-left sm:mb-3 xl:mb-0 items-center justify-between xl:justify-start">
                            <h2 class="font-bold mt-10 text-gray-800 tracking-normal uppercase">{{$data['webinar']->name}}</h2>
                        </div>
                        {{-- @dd(session()->get('ses_attendee')['attendee_user']['id']) --}}
                        <form action="/addtocalender" method="post">
                            @csrf
                            <input type="hidden" value="{{$data['webinar']->id}}" name="webinar_id">
                            <input type="hidden" value="{{@$data['attendee_email']}}" name="attendee_email">
                            <button type="submit" class="primary-bg flex self-center sm:self-end mt-8 transition focus:outline-none duration-150 ease-in-out rounded text-white px-8 py-2 text-sm uppercase">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </span>
                                Add to Calender
                            </button>
                        </form>
                    </div>

                    
                    {{-- <div class="lg:text-left text-center mt-6 sm:flex border-b">
                    </div> --}}
                    <div class="mt-10">
                        <div class="flex flex-wrap">
                            <div class="w-full mb-4">
                                <p class="text-xl font-bold">Information</p>
                                <div>
                                    <p class="text-sm text-gray-800 font-semibold pt-3 pb-2">Overview</p>
                                    <div class="leading-6 text-gray-800 text-sm">
                                       <div id="showparagraph" style="">
                                            {!! $data['webinar']->full_detail !!}
                                       </div>
                                       <button id="overflowshow" class="btn underline cursor-pointer" style="color: #25a5da;">see more</button>
                                    </div>
                                    
                                    
                                    <div class="keywords mt-5 pt-5 border-t">
                                        <p class="text-xl font-bold">Speakers</p>
                                        <div class="categories">
                                            <p class="text-sm text-gray-800 font-semibold pt-3 pb-2 mr-6">Name</p>
                                                <ul class="flex">
                                                    @foreach ($data['webinar']->speaker as $speaker)
                                                        <li class="primary-bg p-1 text-xs focus:outline-none rounded text-white mr-4">{{$speaker->first_name}} {{$speaker->last_name}}</li>
                                                    @endforeach
                                                </ul>
                                        </div>
                                    </div>

                                    <div class="social-links mt-5 pt-5 border-t">
                                        <p class="text-xl font-bold">Social Media</p>

                                        <div class="flex flex-col py-2">
                                                <div class="flex space-x-3">
                                                    <a href="{{$data['webinar']->zoom_link}}">
                                                        <img src="/img/zoom_meeting_logo.svg" alt="" style="width: 50px;">
                                                    </a>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="contact mt-5 pt-5 border-t">
                                        <p class="text-xl font-bold">Location Details</p>
                                        <div class="contact-detail-wrapper">
                                            <div class="location flex mt-2">														
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="#333">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <p class="text-sm">{{$data['webinar']->location}}</p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="contact mt-5 pt-5 border-t">
                                        <p class="text-xl font-bold">Timing Details</p>
                                        <div class="contact-detail-wrapper">
                                            <div class="start_date flex mt-2">													
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="18" height="18" viewBox="0 0 256 256" xml:space="preserve">
                                                    <desc>Created with Fabric.js 1.7.22</desc>
                                                    <defs>
                                                    </defs>
                                                    <g transform="translate(128 128) scale(0.72 0.72)" style="">
                                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
                                                        <path d="M 60.269 30.771 L 47.201 41.304 c -0.624 -0.367 -1.341 -0.593 -2.116 -0.593 c -2.318 0 -4.204 1.886 -4.204 4.204 c 0 1.794 1.135 3.318 2.721 3.921 v 23.038 c 0 0.819 0.664 1.484 1.484 1.484 s 1.483 -0.664 1.483 -1.484 V 48.836 c 1.585 -0.602 2.721 -2.126 2.721 -3.921 c 0 -0.457 -0.092 -0.889 -0.227 -1.301 l 13.07 -10.534 c 0.637 -0.514 0.738 -1.448 0.224 -2.086 C 61.84 30.357 60.907 30.256 60.269 30.771 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                        <path d="M 45.084 -0.085 c -24.813 0 -45 20.187 -45 45 c 0 24.814 20.187 45.001 45 45.001 c 24.813 0 45 -20.187 45 -45.001 C 90.084 20.102 69.897 -0.085 45.084 -0.085 z M 45.084 86.949 c -23.177 0 -42.033 -18.856 -42.033 -42.034 c 0 -23.177 18.856 -42.033 42.033 -42.033 c 23.177 0 42.033 18.856 42.033 42.033 C 87.117 68.093 68.261 86.949 45.084 86.949 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    </g>
                                                    </g>
                                                    </svg>
                                                <p class="text-sm pt-0.5">{{ Carbon\Carbon::parse($data['webinar']->start_date)->translatedFormat('l j F Y,  H:m') }}</p>
                                            </div>
                                            <div class="end_date flex mt-2">														
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="18" height="18" viewBox="0 0 256 256" xml:space="preserve">
                                                    <desc>Created with Fabric.js 1.7.22</desc>
                                                    <defs>
                                                    </defs>
                                                    <g transform="translate(128 128) scale(0.72 0.72)" style="">
                                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
                                                        <path d="M 60.269 30.771 L 47.201 41.304 c -0.624 -0.367 -1.341 -0.593 -2.116 -0.593 c -2.318 0 -4.204 1.886 -4.204 4.204 c 0 1.794 1.135 3.318 2.721 3.921 v 23.038 c 0 0.819 0.664 1.484 1.484 1.484 s 1.483 -0.664 1.483 -1.484 V 48.836 c 1.585 -0.602 2.721 -2.126 2.721 -3.921 c 0 -0.457 -0.092 -0.889 -0.227 -1.301 l 13.07 -10.534 c 0.637 -0.514 0.738 -1.448 0.224 -2.086 C 61.84 30.357 60.907 30.256 60.269 30.771 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                        <path d="M 45.084 -0.085 c -24.813 0 -45 20.187 -45 45 c 0 24.814 20.187 45.001 45 45.001 c 24.813 0 45 -20.187 45 -45.001 C 90.084 20.102 69.897 -0.085 45.084 -0.085 z M 45.084 86.949 c -23.177 0 -42.033 -18.856 -42.033 -42.034 c 0 -23.177 18.856 -42.033 42.033 -42.033 c 23.177 0 42.033 18.856 42.033 42.033 C 87.117 68.093 68.261 86.949 45.084 86.949 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    </g>
                                                    </g>
                                                    </svg>
                                                <p class="text-sm pt-0.5">{{ Carbon\Carbon::parse($data['webinar']->end_date)->translatedFormat('l j F Y,  H:m') }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="left-side block md:hidden mt-5 xl:w-1/4 md:w-1/3 w-full pb-6 md:pb-0 md:pr-6">

        </div> --}}

        {{-- <div class="hidden xl:block md:w-1/4 w-full">
           
        </div> --}}
    </div>
</div>

@push('after-scripts')
    <script>
        const heading = document.getElementById('showparagraph');
        const btn = document.getElementById('overflowshow');
        btn.addEventListener("click", ()=> heading.classList.toggle('h-full'));
    </script>  
@endpush
@endsection