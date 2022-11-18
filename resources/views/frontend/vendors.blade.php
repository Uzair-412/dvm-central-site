@extends('frontend.layouts.app')
@section('title', 'VetandTech | Vendors')
@section('meta_description', 'VetandTech International a reliable marketplace for buying and selling veterinary medical equipment and supplies for veterinarians worldwide. Get started!')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/vendors.css" />
    <style>
        .pagination-wrapper nav {
            transform: none;
        }
        .pagination-wrapper .pagination {
            display: flex;
        }
        .pagination-wrapper .pagination .page-item {
            background-color: #fff;
            margin: 0px 3px;
            border: 1px solid #ddd;
            width: 40px;
            height: 35px;
            transition: all 0.3s ease-in-out;
        }
        .pagination-wrapper .pagination .page-item.active {
            background-color: #418ffe;
            color: #ffffff;
            border: 1px solid #418ffe;
        }
        .pagination-wrapper .pagination .page-item .page-link {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .pagination-wrapper .pagination .page-item:hover {
            background-color: #418ffe;
            color: #fff;
            transition: all 0.3s ease-in-out;
        }

        
    </style>
@endpush

@section('content')
<main id="resources-page" class="relative">
    <div class="resources-container">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="absolute top-0 w-full h-full flex justify-center items-center flex-col text-center">
                <h3 class="text-white text-2xl mb-4">Find Vendors</h3>
                <div class="w-9/12 sm:w-8/12 2xl:w-6/12">
                    <form action="" class="flex flex-wrap items-stretch justify-center">
                        <input type="text" class="border border-solid border-gray-200 p-2 w-full sm:w-9/12" name="search" value="@if(@request()->search){{ request()->search }}@endif" placeholder="Search vendor ..." />
                        <button class="btn blue-btn lite-blue-bg-color text-white sm:w-3/12 px-6 py-3 overflow-hidden sm:mt-0 h-full"> Search </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="vendors-wrapper width relative z-20 mt-5 md:-mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($vendors as $key => $vendor)
                    <div class="card relative overflow-hidden vendor-card bg-white p-4 shadow">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="vendor-header flex justify-between items-center mb-2">
                            <div class="vendor-title-rate">
                                <a href="/{{$vendor->slug}}">{{$vendor->name}}</a>
                                <div class="flex">
                                    @php
                                        $j = 0;
                                        $reviews = $vendor->vendor_rating($vendor->id);
                                    @endphp
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < (int)$reviews)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @else
                                            @php
                                                $decimal = ($reviews - (int)$reviews) * 100;
                                            @endphp
                                            @if($decimal > 0 && $j==0)
                                                @php
                                                    $j=1;
                                                @endphp
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="none">
                                                    <defs>
                                                        <linearGradient id="grad1">
                                                            <stop offset="0%" stop-color="#418ffe" />
                                                            <stop offset="{{ $decimal }}%" stop-color="#418ffe" />
                                                            <stop offset="{{ $decimal }}%" stop-color="white" />
                                                            <stop offset="100%" stop-color="white" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        fill="url(#grad1)"
                                                        stroke="#418ffe"
                                                        stroke-width="1"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                                    />
                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#ffffff" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            @endif
                                        @endif
                                    @endfor

                                    <span class="text-gray-500 text-xs">{{round($reviews,2)}} Reviews</span>
                                </div>
                            </div>
                            <div class="vendor-logo border rounded-full overflow-hidden">
                                @php
                                    $logo = '';
                                    if ($vendor->logo != '') {
                                        $logo = 'vendors/logo/' . $vendor->logo;
                                    }
                                @endphp
                                <a href="/{{$vendor->slug}}">
                                    <img
                                    src="{{ Storage::disk('ds3')->exists($logo)? Storage::disk('ds3')->url($logo): 'https://ui-avatars.com/api/?name=' . $vendor->name . '&background=418ffe&color=fff' }}"
                                    alt="{{ $vendor->name }}" style="width: 75px;"/>
                                </a>
                            </div>
                        </div>
                        @php
                            $follow = false;
                            if(auth()->user())
                            {
                                $follow = $vendor->is_follow;
                            }
                        @endphp
                        <div class="action-container flex justify-between mt-2">
                            <div class="action-follow">
                                <button class="follow-btn btn blue-btn overflow-hidden inline-block lite-blue-bg-color text-white px-3 border-solid border blue-border" vendor="{{$vendor->slug}}">@if($follow){{'Unfollow'}}@else{{'Follow'}}@endif</button>
                            </div>
                            <div class="action-view">
                                <a href="/{{$vendor->slug}}" class="lite-blue-color capitalize">view details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="vendors-listing-container w-full h-max mt-12">
                @if ($vendors->hasPages())
                    <div role="navigation" aria-label="Pagination Navigation" class="pagination-wrapper">
                        <div class="pagination">
                            {{ $vendors->links() }}
                        </div>
                    </div>
                @endif
            </div>
            {{-- <div class="vendors-title-wrapper flex justify-between items-end gap-4">
                <h1 class="text-2xl font-semibold inline tracking-wide primary-black-color">Vendors</h1>
            </div> --}}

            {{-- <div class="vendors-wrapper grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-12 w-full pt-6">
                
            </div> --}}
        </div>
    </div>
    <form action="/follow/" id="follow-form">
    </form>
</main>
@endsection
@push('after-scripts')
    <script>
        document.querySelectorAll('.follow-btn').forEach(follow_btn => {
            follow_btn.addEventListener('click', (e) => {
                e.preventDefault();
                let vendor_slug = e.target.getAttribute('vendor');
                console.log("vendor slug", vendor_slug);
                $.ajax({
                    url: '/follow/'+vendor_slug,
                    method: 'POST',
                    data: {},
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    success: function (response) {
                        if (response.success_message) {
                            showAlert(response.success_message, {
                                text: '',
                                link: '',
                                type: 'success'
                            });
                            e.target.innerText = 'Unfollow';
                        } else if (response.error_message) {
                            showAlert(response.error_message, {
                                text: 'Login',
                                link: '/login',
                                type: 'error'
                            });
                        } else if (response.warning_message) {
                            showAlert(response.warning_message, {
                                text: '',
                                link: '',
                                type: 'error'
                            });
                            e.target.innerText = 'Follow';
                        }
                    }
                });
            });
        })
    </script>
@endpush