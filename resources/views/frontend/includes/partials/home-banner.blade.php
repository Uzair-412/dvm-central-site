<!-- features of DVM Central -->
{{-- <section class="features pt-20">
    <div class="features-container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 width">
        <a href="/seller"
            class="z-10 card relative overflow-hidden bg-white border border-solid border-gray-200 p-4 sm:p-2 md:p-4 flex items-center justify-center text-center">
            <span
                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
            <span
                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
            <span
                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
            <span
                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
            <span
                class="inline-block w-max h-max font-semibold text-base md:text-lg underline-links relative overflow-hidden">Become
                Seller On Vet & Tech</span>
        </a>

        <div
            class="z-10 card relative overflow-hidden bg-white border border-solid border-gray-200 p-4 sm:p-2 md:p-4 flex items-center justify-center text-center">
            <span
                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
            <span
                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
            <span
                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
            <span
                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-base md:text-lg">24/7 Customer service</span>
                <span class="text-gray-500 text-sm md:text-base">(516) 593-7100</span>
                <span class="text-gray-500 text-sm md:text-base">sales@gervetusa.com</span>
            </div>
        </div>

        <div
            class="z-10 card relative overflow-hidden bg-white border border-solid border-gray-200 p-4 sm:p-2 md:p-4 flex items-center justify-center text-center">
            <span
                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
            <span
                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
            <span
                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
            <span
                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-base md:text-lg">Best Industry Guarntee</span>
                <span class="text-gray-500 text-sm md:text-base">Quality Lifetime Guarntee</span>
            </div>
        </div>

        <div
            class="z-10 card relative overflow-hidden bg-white border border-solid border-gray-200 p-4 sm:p-2 md:p-4 flex items-center justify-center text-center">
            <span
                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
            <span
                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
            <span
                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
            <span
                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
            <div class="flex flex-col items-center">
                <span class="font-semibold text-base md:text-lg">Our Commitments</span>
                <span class="text-gray-500 text-sm md:text-base">Actively working to help our fellow veterinarian</span>
            </div>
        </div>
    </div>
</section> --}}
<section class="deal-of-the-day pt-20">
    <div class="deal-of-day-wrapper width">
        <div class="deal-of-the-day-title-wrapper flex justify-between items-end gap-4">
            <h3 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color">Deals Of The Day</h3>
            <a href="{{ url('products/today-deals') }}"
                class="bubble-anchors relative text-xs sm:text-base text-white text-center">View All</a>
        </div>
        <div class="deal-of-the-day-imgs-wrapper grid sm:grid-cols-2 lg:grid-cols-3 gap-4 pt-6 pb-12">
            @php
                $banner = \App\Models\Banner::where(['area_id' => 4, 'status' => 'Y'])
                    ->inRandomOrder()
                    ->first();
                $image = 'banners/' . $banner->image;
                if ($banner->image != '' && Storage::disk('ds3')->exists($image)) {
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/530x285';
                }
            @endphp
            @if ($banner)
                <div class="deal-of-the-day-img-wrapper border border-solid border-gray-200 overflow-hidden relative">
                    @if(@$banner->link)
                        <a href="{{url($banner->link)}}">
                    @endif
                        <img class="lazyload deal-of-the-day-img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full" data-src="{{ $path }}"
                        alt="{{ $banner->name }}" />
                    @if(@$banner->link)
                        </a>
                    @endif
                </div>
            @endif
            @php
                $banner = \App\Models\Banner::where(['area_id' => 5, 'status' => 'Y'])
                    ->inRandomOrder()
                    ->first();
                $image = 'banners/' . $banner->image;
                if ($banner->image != '' && Storage::disk('ds3')->exists($image)) {
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/530x285';
                }
            @endphp
            @if ($banner)
                <div class="deal-of-the-day-img-wrapper border border-solid border-gray-200 overflow-hidden relative">
                    @if(@$banner->link)
                        <a href="{{url($banner->link)}}">
                    @endif
                    <img class="lazyload deal-of-the-day-img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full" data-src="{{ $path }}"
                        alt="{{ $banner->name }}" />
                    @if(@$banner->link)
                        </a>
                    @endif
                </div>
            @endif
            @php
                $banner = \App\Models\Banner::where(['area_id' => 6, 'status' => 'Y'])
                    ->inRandomOrder()
                    ->first();
                $image = 'banners/' . $banner->image;
                if ($banner->image != '' && Storage::disk('ds3')->exists($image)) {
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/530x285';
                }
            @endphp
            @if ($banner)
                <div class="deal-of-the-day-img-wrapper border border-solid border-gray-200 overflow-hidden relative transform sm:translate-x-2/4 lg:translate-x-0 sm:-mr-4 lg:mr-0">
                    @if(@$banner->link)
                        <a href="{{url($banner->link)}}">
                    @endif
                    <img class="lazyload deal-of-the-day-img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full" data-src="{{ $path }}"
                        alt="{{ $banner->name }}" />
                    @if(@$banner->link)
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
