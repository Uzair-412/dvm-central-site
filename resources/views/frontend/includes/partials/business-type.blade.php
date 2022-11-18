<section class="relative z-20 categories-kind">
    <div class="business-type-container width">
        <div class="categories-kind-wrapper grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 pt-6">
            @foreach($data['main-categories'] as $main_category)
                <div class="relative business-type border border-solid border-gray-200 p-4 flex flex-col card overflow-hidden bg-white">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <span class="business-type-title font-semibold leading-none inline-block w-max">{{ $main_category->name }}</span>
                    <div class="business-type-imgs-wrapper grid grid-cols-2 gap-4 mt-4">
                        @php
                            $i=1;
                        @endphp
                        @foreach($main_category->blockCategories as $blockCategory)
                            <a href="{{ $blockCategory->category->slug }}" class="business-type-category-img-wrapper relative overflow-hidden rounded-full w-full h-auto">
                                <div class="business-type-category-title p-1 text-xs w-full w-3/4 lg:w-4/4 h-full h-3/4 lg:h-4/4 rounded-full lite-blue-bg-color text-white absolute z-20 flex text-center justify-center items-center text-ellipsis">{{ $blockCategory->category->name }}</div>
                                <img class="absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-3/4 h-3/4 lazyload" data-src="{{ asset('up_data/categories/thumbnails/'.$blockCategory->category->image) }}" alt="{{ $blockCategory->category->name }}" />
                            </a>
                            @php
                                if($i==4)
                                {
                                    break;
                                }
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                    {{-- <a href="{{ $main_category->slug }}" class="text-red-600 p-3 cursor-pointer text-right absolute bottom-0 right-0 overflow-hidden text-sm">See More</a> --}}
                </div>
            @endforeach
        </div>
    </div>
</section>