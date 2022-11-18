<section class="top-categories-of-month">
    <div class="top-categories-of-month-wrapper">
        {{-- <div class="top-categories-of-month-title-wrapper">
            <h1 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color w-max sm:pb-1">Top
                Categories Of The Month</h1>
        </div> --}}
        <div class="top-categories-imgs-wrapper pb-12 grid @if($gridClass) {{ $gridClass }} @else {{ 'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5' }} @endif gap-4">
            @foreach($categories as $category)
            @php
                $path = 'categories/thumbnails/' . $category->image;
                if ($category->image != '') {
                    $path = Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/170x170.png?text=Image+Not+Available+In+The+Bucket';
                } else {
                    $path = 'https://via.placeholder.com/170x170.png';
                }
            @endphp
            <a href="{{ $category->slug }}"
                class="top-category flex flex-col items-center bg-white relative text-center card border border-solid border-gray-200 overflow-hidden relative">
                <span
                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                <span
                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                <span
                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                <span
                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                <div class="top-category-title z-10 p-3 w-full text-left leading-snug">{{ $category->name }}
                </div>
                <div class="top-categories-img-wrapper overflow-hidden inline-block mb-8 relative">
                    <img class="lazyload top-categories-img absolute top-0 left-0 w-full h-full" data-src="{{ $path }}" alt="{{ $category->name }}" />
                </div>
                <div
                    class="text-red-600 p-3 cursor-pointer text-right absolute bottom-0 right-0 overflow-hidden text-sm">
                    See More</div>
            </a>
            @endforeach
        </div>
    </div>
</section>