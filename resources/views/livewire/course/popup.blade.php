<div>
   <div
        class="course-popup-container bg-black bg-opacity-70 fixed top-0 left-0 w-screen h-screen flex items-center justify-center z-50 overflow-y-auto @if (!$showModel) hidden opacity-0 @endif transition-all duration-300 ease-in-out">
        <div
            class="course-popup-wrapper bg-white p-2 md:p-4 flex flex-col relative @if ($showModel) popup-scale-1 @endif">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 popup-close-btn cursor-pointer absolute -top-5 -right-5" viewBox="0 0 20 20"
                fill="#ffffff">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            @if ($course)
                <div class="img-wrapper relative overflow-hidden w-full h-auto">
                    <img class="transition-all duration-300 ease-in-out"
                        src="up_data/courses/thumbnails/{{ @$course['thumbnail'] }}" alt="Course Title" />
                </div>
                <div class="flex items-center justify-between text-xs md:text-sm mt-1">
                    <h3 class="course-title text-xl font-semibold">{{ @$course->title }}</h3>
                    <div class="course-price ml-1 lite-blue-color text-sm md:text-base">
                        <p>{{ '$'.number_format(@$course->price,2) }}</p>
                        @if($course->price_original && $course->price)
                            <p class="text-red-500">({{ number_format($course->discount($course->id),2).'% Off' }})</p>
                        @endif
                    </div>
                </div>
                <p class="course-short-description mt-1 text-gray-500 text-xs">{{ @$course->short_description }}</p>

                <div class="flex items-center text-xs mt-1">
                    <div class="text-gray-500">Instructor :</div>
                    <div class="course-instructor ml-1 font-semibold text-sm md:text-base">
                        {{ @$course->instructor->name }}</div>
                </div>

                <p class="instructtor-short-bio mt-1 text-gray-500 text-xs">Lorem ipsum dolor sit amet consectetur
                    adipisicing
                    elit. Suscipit, ab.</p>

                <div class="flex items-center text-xs mt-1">
                    <div class="text-gray-500">Total Modules :</div>
                    <div class="modules-num ml-1 font-semibold text-sm md:text-base">{{ @$course->modules->count() }}
                    </div>
                </div>

                <div class="flex items-center text-xs mt-1">
                    <div class="text-gray-500">Total Videos :</div>
                    <div class="videos-num ml-1 font-semibold text-sm md:text-base">{{ @$course->video_counts($course->id) }}</div>
                </div>

                <div class="flex items-center text-xs mt-1">
                    <div class="text-gray-500">Total Watch Hours :</div>
                    <div class="hours-num ml-1 font-semibold text-sm md:text-base">{{ @$course->modules->sum('watch_hours') }}</div>
                </div>
            @endif
            <div class="why-wrapper mt-1">
                <div class="text-xs md:text-sm font-semibold">What You Will Learn</div>
                <ul class="text-gray-500 list-disc">
                    <li class="mt-1 text-xs ml-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li class="mt-1 text-xs ml-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li class="mt-1 text-xs ml-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
            </div>
            @if (!auth()->user())
                <a href="/login" class="btn blue-btn lite-blue-bg-color px-4 md:px-6 py-2 md:py-3 relative overflow-hidden mt-4 z-10 text-white text-center">Login</a>
            @elseif($course)
                <form method="POST" action="@if(@$course->price == 0){{ '/courses/enroll' }}@else{{ '/courses/cart' }}@endif" class="text-center w-full">
                    @csrf
                    <input type="hidden" name="id" value="{{ @$course->id }}" />
                    <button class="btn blue-btn lite-blue-bg-color px-4 md:px-6 py-2 md:py-3 relative overflow-hidden mt-4 z-10 text-white text-center w-full">@if(@$course->price == 0) Enroll Now @else Buy Now @endif</button>
                </form>
            @endif
        </div>
    </div>
</div>