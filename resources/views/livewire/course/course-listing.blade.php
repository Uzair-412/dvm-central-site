<div>
    <!-- page content -->
    <main id="courses-listing-page" class="relative bg-gray-50">
        <div class="courses-listing-container width flex flex-col">
            @include('includes.partials.messages')
            <div class="mt-20 inline-flex flex-col sm:flex-row justify-between items-center relaitve z-10">
                <h1 class="text-2xl font-semibold">{{ $category->name }}</h1>
                <div
                    class="courses-filter-wrapper flex items-center justify-end text-xs md:text-sm text-gray-500 mt-2 sm:mt-0">
                    <div class="filter-type-wrapper relative">
                        <div class="flex items-center cursor-pointer">
                            <span>Course Type</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="#777">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <ul
                            class="dropdown-menu invisible opacity-0 absolute top-8 left-0 transform bg-white text-gray-500 z-10 p-4 border border-solid border-gray-200 w-max transition-all duration-300 ease-in-out">
                            <li class="mt-2 relative overflow-hidden underline-links block w-max cursor-pointer">
                                    <a wire:click="$emit('filter_types')">All</a>
                                </li>
                            @foreach ($course_types as $type)
                                <li class="mt-2 relative overflow-hidden underline-links block w-max cursor-pointer">
                                    <a wire:click="$emit('filter_types', '{{ $type->id }}')">{{$type->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="filter-type-wrapper relative ml-4">
                        <div class="flex items-center cursor-pointer">
                            <span>Sort By</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="#777">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <ul
                            class="dropdown-menu invisible opacity-0 absolute top-8 right-0 transform bg-white text-gray-500 z-10 p-4 border border-solid border-gray-200 w-max transition-all duration-300 ease-in-out">
                            <li class="mt-2 relative overflow-hidden underline-links block w-max cursor-pointer">
                                <a wire:click="$emit('sortBy','name')">Name</a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max cursor-pointer">
                                <a wire:click="$emit('sortBy','price_desc')">Price Highest to Lowest</a>
                            </li>
                            <li class="mt-2 relative overflow-hidden underline-links block w-max cursor-pointer">
                                <a wire:click="$emit('sortBy','price_asc')">Price Lowest to Highest</a>
                            </li>
                        </ul>
                    </div>
                    <a href="/courses/cart" class="relative btn blue-btn text-white inline-block px-2 py-1 lite-blue-bg-color font-semibold w-max ml-4">View cart</a>
                </div>
            </div>
            @if($course_list->count() > 0)
                <div class="courses-listing-wrapper grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 relative z-0">
                    @foreach($course_list as $course)
                        <div class="course-listing-card text-center items-center border border-solid border-gray-200 bg-white card relative overflow-hidden p-4 z-10">
                            <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                            <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                            <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                            <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                            <a href="{{ '/courses/categories/' . $category->slug . '/' . $course->slug }}">
                                <div class="img-wrapper relative overflow-hidden w-full h-auto flex flex-col justify-center items-center" style="height: 200px; width:100%;">
                                    <img class="transition-all duration-300 ease-in-out w-full"
                                        src="up_data/courses/thumbnails/{{ $course['thumbnail'] }}"
                                        alt="Course Title" style="width: max-content;" />
                                </div>
                            </a>

                            <a href="{{ '/courses/categories/' . $category->slug . '/' . $course->slug }}"
                                class="course-listing-title font-semibold text-sm md:text-base mt-4 pt-2 border-t border-solid border-gray-200 block">{{ $course['title'] }}</a>
                            <div class="flex justify-between text-xs items-center mt-1">
                                <div class="course-listing-price lite-blue-color text-xs md:text-sm font-semibold">
                                    @if(!$course->enrolled($course->id))
                                        @if ($course['price'] == 0)
                                            <div class="course-listing-mode text-red-500 text-xs">Free</div>
                                        @else
                                            <p class="text-left">${{ number_format($course['price'],2) }}</p>
                                        @endif
                                        @if($course->price_original && $course->price)
                                            <p class="text-red-500">({{ number_format($course->discount($course->id),2).'% Off' }})</p>
                                        @endif
                                    @endif
                                </div>
                                <div class="course-listing-mode text-red-500">{{ $course->getCourseType->name }}</div>
                                @if($course->enrolled($course->id))
                                    <a href="{{ '/courses/categories/' . $category->slug . '/' . $course->slug }}" class="cursor-pointer text-xs text-white lite-blue-bg-color btn blue-btn relative overflow-hidden inline-block z-10 px-1 py-0.5">View</a>
                                @else
                                    <button wire:click="buyNow({{ $course->id }})" class="popup-open-btn cursor-pointer text-xs text-white lite-blue-bg-color btn blue-btn relative overflow-hidden inline-block z-10 px-1 py-0.5">@if ($course['price'] == 0) Enroll Now @else Buy Now @endif</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center w-full bg-gray-100 p-4 font-semibold mt-4">
                    <p>Courses not found!</p>
                </div>
            @endif
        </div>
    </main>
    <script defer src="/assets/js/course-listing.js"></script>
</div>
