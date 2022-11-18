<div>
    <!-- page content -->
    <main id="course-page" class="relative bg-gray-50">
        <div class="course-container">
            <div class="course-detail-container relative overflow-hidden sm:py-20 xl:py-0">
                <div class="course-detail-wrapper relative sm:absolute top-0 left-0 w-full h-full py-10 sm:py-0">
                    <div class="width h-full relative flex flex-col justify-center items-center sm:items-start text-white">
                        <div class="flex flex-col relative">
                            <div class="sm:border border-solid border-white sm:px-8 sm:py-4 relative z-10 sm:bg-white transform sm:translate-y-1/4">
                                <h1 class="course title text-2xl md:text-4xl font-semibold primary-black-color" style="max-width: 400px">{{ $course->title }}</h1>
                                @if(!empty($instructor))
                                    <h2 class="course-instructor text-xl mt-2 md:mt-4 lite-blue-color">By {{ $instructor->name }}</h2>
                                @endif    
                                <div class="flex items-center">
                                    <svg class="w-8 h-8" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background: new 0 0 60 60" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                stroke: #777;
                                                stroke-width: 0.75;
                                                stroke-miterlimit: 10;
                                                fill: #777;
                                            }
                                            .st1 {
                                                stroke: #777;
                                                stroke-width: 0.5;
                                                stroke-miterlimit: 10;
                                                fill: #777;
                                            }
                                            @media all and (max-width: 639px) {
                                                .st0 {
                                                    stroke: #fff;
                                                    fill: #fff;
                                                }
                                                .st1 {
                                                    stroke: #fff;
                                                    fill: #fff;
                                                }
                                            }
                                        </style>
                                        <g> <path class="st0" d="M1.5,40.7c0.1-0.6,0.2-1.2,0.4-1.8c1.9-7,9.9-10.3,16.3-6.9c0.2,0.1,0.4,0.2,0.6,0.3c6-6.2,16-6.2,22-0.4 c1.6-1,3.3-1.7,5.2-1.9c5.9-0.8,11.9,3.7,12.5,9.7c0.2,1.5,0.1,3.1,0.1,4.6c0,1.1-0.9,2-2,2.2c-0.3,0-0.5,0-0.8,0 c-3.2,0-6.3,0-9.5,0c-0.2,0-0.4,0-0.7,0c0,0.2,0,0.4,0,0.5c0,2-1.3,3.2-3.2,3.2c-2.5,0-5,0-7.5,0c-5.6,0-11.2,0-16.8,0 c-2.1,0-3.2-0.9-3.6-3c-0.2,0-0.4,0-0.6,0c-3.1,0-6.2,0-9.4,0c-1.5,0-2.5-0.5-3-1.9C1.5,43.8,1.5,42.3,1.5,40.7z M30,48.4 c4.1,0,8.2,0,12.3,0c0.9,0,1.4-0.4,1.4-1.4c0-0.6,0-1.1,0-1.7c0-1.9,0.1-3.9-0.5-5.7c-2.1-7.5-10-11.8-17.4-9.4 c-5.3,1.7-9,6.4-9.4,12c-0.1,1.6,0,3.1-0.1,4.7c0,1.1,0.4,1.5,1.5,1.5C21.9,48.4,25.9,48.4,30,48.4z M42.1,33.4 c2.7,3.3,3.7,7.1,3.4,11.2c0.1,0,0.2,0.1,0.2,0.1c3.5,0,6.9,0,10.4,0c0.5,0,0.7-0.3,0.7-0.7c0-1.1,0-2.2,0-3.3 c-0.2-3.3-1.7-5.8-4.5-7.5C49.1,31.3,44.8,31.4,42.1,33.4z M17.6,33.9c-0.2-0.1-0.3-0.2-0.3-0.2C12,30.7,5,33.7,3.6,39.6 c-0.4,1.6-0.2,3.3-0.3,4.9c0,0.7,0.1,0.9,0.9,0.9c3.2,0,6.5,0,9.7,0c0.2,0,0.4,0,0.6,0C14.2,41.2,15,37.3,17.6,33.9z" /> <path class="st0" d="M29.7,26.6c-4.7,0-8.5-3.8-8.5-8.4c0-4.6,3.8-8.4,8.5-8.4c4.7,0,8.5,3.8,8.5,8.4 C38.2,22.8,34.4,26.6,29.7,26.6z M29.7,24.8c3.7,0,6.7-2.9,6.7-6.6c0-3.6-3-6.6-6.6-6.6c-3.7,0-6.7,2.9-6.7,6.5 C23,21.8,26,24.8,29.7,24.8z" /> <path class="st0" d="M53.8,22.1c0,3.6-3,6.6-6.6,6.5c-3.6,0-6.6-3-6.6-6.6c0-3.6,3-6.5,6.7-6.5C50.9,15.5,53.9,18.5,53.8,22.1z M47.2,26.8c2.6,0,4.8-2.1,4.8-4.7c0-2.6-2.1-4.7-4.8-4.7c-2.6,0-4.8,2.1-4.8,4.7C42.5,24.7,44.6,26.8,47.2,26.8z" /> <path class="st0" d="M12.8,16c3.6,0,6.6,3,6.6,6.6c0,3.6-3,6.6-6.6,6.5c-3.6,0-6.6-3-6.6-6.6C6.2,18.9,9.1,16,12.8,16z M12.7,27.2 c2.6,0,4.8-2.1,4.8-4.7c0-2.6-2.1-4.7-4.8-4.7c-2.6,0-4.8,2.1-4.8,4.7C8,25.1,10.1,27.2,12.7,27.2z" /> </g>
                                    </svg>
                                    <div class="ml-2 text-sm md:text-base primary-black-color"><span>Enrollments:</span> <span>{{ $course->enrollments->count() }} Students</span></div>
                                </div>
                                @if(!$course->enrolled($course->id))
                                    @if (auth()->user())
                                    <form method="POST" action="@if(@$course->price == 0){{ '/courses/enroll' }}@else{{ '/courses/cart' }}@endif" class="w-full">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ @$course->id }}" />   
                                    <button class="btn black-btn relative overflow-hidden inline-block bg-black px-4 py-2 md:px-6 md:py-3 mt-4 z-10">@if ($course->price == 0) Enroll Now @else Buy Now @endif</button>
                                    </form>
                                    @else
                                        <a href="/login" class="cursor-pointer btn black-btn relative overflow-hidden inline-block bg-black px-4 py-2 md:px-6 md:py-3 mt-4 z-10">Login</a>
                                    @endif
                                @endif
                            </div>
                            <div class="course-banner-wrapper transform sm:-translate-y-1/4 border border-solid border-white p-2 mt-4 hidden sm:inline-block" style="transform: translate(70%, -25%);justify-self: flex-end;align-self: flex-end;">
                                <img class="course-banner" src="/up_data/courses/thumbnails/{{ $course->thumbnail }}" alt="Course Banner" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="course-modules-container mt-20">
                <div class="course-modules-wrapper width">
                    {{-- @if(trim($course->description)!='')
                        <div class="course-description flex flex-col bg-white border border-solid border border-gray-200 p-4 text-sm md:text-base mb-1">
                            {{ $course->description }}
                        </div>
                    @endif --}}
                    <h2 class="text-2xl font-semibold">Modules</h2>
                    <div class="flex flex-col md:flex-row w-full mt-4">
                        <div class="flex flex-col lg:mr-4 md:w-5/12 lg:w-3/12 h-max text-gray-500">
                            <div class="flex flex-col bg-white border border-solid border border-gray-200 p-4">
                                <h3 class="primary-black-color font-semibold">Course Info:</h3>
                                <div class="course-description text-sm md:text-base mt-1">
                                    {{ $course->short_description }}
                                </div>
                            </div>
                            <div class="flex flex-col bg-white border border-solid border border-gray-200 p-3 mt-4">
                                @if($course->general_guidance)
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    <span>General Guidance</span>
                                </div>
                                @endif
                                @if($course->is_24_7_support_service)
                                    <div class="flex items-center mt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                        <span>24/7 support service</span>
                                    </div>
                                @endif
                                @if($course->is_practice_questions)
                                <div class="flex items-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                    <span>Practice Questions</span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col md:w-7/12 lg:w-9/12">
                        @php
                            $i = 1;
                        @endphp
                        @forelse($modules_list as $key => $module)
                            @if ($module->is_free == 1 || $course->enrolled($course->id)==1)
                                <a href="/courses/categories/{{$module->course->category->slug}}/{{$module->course->slug}}/{{$module->slug}}"
                                    class="course-module @if($key > 0) mt-2 @endif flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <div class="module-no inline-flex items-center justify-center rounded-full mr-2 md:mr-4 lite-blue-bg-color text-white text-xs md:text-sm">
                                            {{ $i++ }}</div>
                                        <div class="module-detail text-sm md:text-base">{{ $module->title }}</div>
                                    </div>
                                    @if($course->enrolled($course->id)==0)
                                        <div class="mode lite-blue-color text-xs md:text-sm bg-gray-100 px-1 py-1 md:px-2">Free</div>
                                    @endif
                                </a>
                            @else
                                <a wire:click="buyNow({{$course->id}})" class="course-module locked cursor-pointer popup-open-btn @if($key > 0) mt-2 @endif flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100">
                                    <div class="flex items-center">
                                        <div
                                            class="module-no inline-flex items-center justify-center rounded-full mr-2 md:mr-4 lite-blue-bg-color text-white text-xs md:text-sm">
                                            {{ $i++ }}</div>
                                        <div class="module-detail text-sm md:text-base">{{ $module->title }}</div>
                                    </div>
                                    <div class="mode lite-blue-color text-xs md:text-sm bg-gray-100 p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 sm:h-6 w-5 sm:w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                </a>
                            @endif
                        @empty
                            <div class="text-center w-full bg-gray-100 p-4 font-semibold">
                                <p>Modules not found!</p>
                            </div>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
