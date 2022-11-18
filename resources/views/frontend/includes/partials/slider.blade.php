@if(isset($data['breadcrumb']))
    @if(isset($data['special_header']))
    @else
        {{-- <div class="ps-breadcrumb">
            <div class="ps-container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    @foreach($data['breadcrumbs'] as $breadcrumb)
                        <li @if($loop->last) class="breadcrumb-item active" aria-current="page" @else class="breadcrumb-item" @endif>{!! $breadcrumb !!}</li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
        @if(@$data['breadcrumbs'])
            <div class="breadcrumb py-2 bg-gray-100 text-sm">
                <div class="breadcrub-wrapper width">
                    <a class="text-gray-400" href="/">Home</a>
                    @foreach($data['breadcrumbs'] as $breadcrumb)
                    <a @if($loop->last) class="breadcrumb-item active" aria-current="page" @else class="breadcrumb-item" @endif> / {!!
                        $breadcrumb !!}</a>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@else
    @if(!isset($data['hide_slider']) && @$data['banners'] )
        <section class="home-hero w-full relative">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach (@$data['banners'] as $banner)
                    @php
                        $image = 'banners/'.$banner->image;
                        $path = Storage::disk('ds3')->url($image);
                    @endphp
                        <a href="@if(!empty($banner->link)){{ $banner->link }}@else{{'javascript:void(0);'}}@endif" class="relative overflow-hidden block swiper-slide object-cover bg-gray-50 w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full object-cover" src="{{ $path }}" srcset="{{ $path }}, {{ $path }} 1440w,{{ $path }} 1024w,{{ $path }} 768w,{{ $path }} 576w" sizes="100%" alt="{{ $banner->name }}" />
                        </a>
                    @endforeach
                </div>
                <div class="hm-swiper-button-prev-wrapper flex items-center absolute top-0 left-0 z-10 sm:left-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 sm:h-8 sm:w-8 hm-swiper-button-prev relative sm:border border-solid blue-border rounded-full sm:bg-white"
                        fill="none" viewBox="0 0 24 24" stroke="#418ffe">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
        
                <div class="hm-swiper-button-next-wrapper flex items-center absolute top-0 right-0 z-10 sm:right-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 sm:h-8 sm:w-8 hm-swiper-button-next relative sm:border border-solid blue-border rounded-full sm:bg-white"
                        fill="none" viewBox="0 0 24 24" stroke="#418ffe">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
        </section>
    @endif
@endif