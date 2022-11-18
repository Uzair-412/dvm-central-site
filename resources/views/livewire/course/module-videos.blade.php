<div>
    <main id="course-videos-page" class="relative bg-gray-50">
        <div class="course-videos-container">
            <div class="course-videos-detail-container relative overflow-hidden">
                <div class="course-videos-detail-wrapper relative sm:absolute top-0 left-0 w-full h-full">
                    <div
                        class="width h-full relative my-20 sm:my-0 flex flex-col justify-center items-center sm:items-start text-white">
                        <h1
                            class="course-videos-title text-2xl md:text-5xl font-semibold sm:w-9/12 lg:w-6/12 text-center sm:text-left">
                            <span></span>
                            <span class="course-videos-title">{{ $module->title }}</span>
                        </h1>
                        @if(!empty($instructor))
                             <h2 class="course-instructor text-xl mt-2 md:mt-4">By {{ $instructor->name }}</h2>
                        @endif
                        
                        <div class="flex items-center">
                            <svg class="w-8 h-8" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60"
                                style="enable-background: new 0 0 60 60" xml:space="preserve">
                                <style type="text/css">
                                    .st0 {
                                        stroke: #ffffff;
                                        stroke-width: 0.75;
                                        stroke-miterlimit: 10;
                                        fill: #ffffff;
                                    }

                                    .st1 {
                                        stroke: #ffffff;
                                        stroke-width: 0.5;
                                        stroke-miterlimit: 10;
                                        fill: #ffffff;
                                    }

                                </style>
                                <g>
                                    <path class="st0"
                                        d="M1.5,40.7c0.1-0.6,0.2-1.2,0.4-1.8c1.9-7,9.9-10.3,16.3-6.9c0.2,0.1,0.4,0.2,0.6,0.3c6-6.2,16-6.2,22-0.4
                                        c1.6-1,3.3-1.7,5.2-1.9c5.9-0.8,11.9,3.7,12.5,9.7c0.2,1.5,0.1,3.1,0.1,4.6c0,1.1-0.9,2-2,2.2c-0.3,0-0.5,0-0.8,0
                                        c-3.2,0-6.3,0-9.5,0c-0.2,0-0.4,0-0.7,0c0,0.2,0,0.4,0,0.5c0,2-1.3,3.2-3.2,3.2c-2.5,0-5,0-7.5,0c-5.6,0-11.2,0-16.8,0
                                        c-2.1,0-3.2-0.9-3.6-3c-0.2,0-0.4,0-0.6,0c-3.1,0-6.2,0-9.4,0c-1.5,0-2.5-0.5-3-1.9C1.5,43.8,1.5,42.3,1.5,40.7z M30,48.4
                                        c4.1,0,8.2,0,12.3,0c0.9,0,1.4-0.4,1.4-1.4c0-0.6,0-1.1,0-1.7c0-1.9,0.1-3.9-0.5-5.7c-2.1-7.5-10-11.8-17.4-9.4
                                        c-5.3,1.7-9,6.4-9.4,12c-0.1,1.6,0,3.1-0.1,4.7c0,1.1,0.4,1.5,1.5,1.5C21.9,48.4,25.9,48.4,30,48.4z M42.1,33.4
                                        c2.7,3.3,3.7,7.1,3.4,11.2c0.1,0,0.2,0.1,0.2,0.1c3.5,0,6.9,0,10.4,0c0.5,0,0.7-0.3,0.7-0.7c0-1.1,0-2.2,0-3.3
                                        c-0.2-3.3-1.7-5.8-4.5-7.5C49.1,31.3,44.8,31.4,42.1,33.4z M17.6,33.9c-0.2-0.1-0.3-0.2-0.3-0.2C12,30.7,5,33.7,3.6,39.6
                                        c-0.4,1.6-0.2,3.3-0.3,4.9c0,0.7,0.1,0.9,0.9,0.9c3.2,0,6.5,0,9.7,0c0.2,0,0.4,0,0.6,0C14.2,41.2,15,37.3,17.6,33.9z" />
                                    <path class="st0" d="M29.7,26.6c-4.7,0-8.5-3.8-8.5-8.4c0-4.6,3.8-8.4,8.5-8.4c4.7,0,8.5,3.8,8.5,8.4
                                        C38.2,22.8,34.4,26.6,29.7,26.6z M29.7,24.8c3.7,0,6.7-2.9,6.7-6.6c0-3.6-3-6.6-6.6-6.6c-3.7,0-6.7,2.9-6.7,6.5
                                        C23,21.8,26,24.8,29.7,24.8z" />
                                    <path class="st0"
                                        d="M53.8,22.1c0,3.6-3,6.6-6.6,6.5c-3.6,0-6.6-3-6.6-6.6c0-3.6,3-6.5,6.7-6.5C50.9,15.5,53.9,18.5,53.8,22.1z
                                        M47.2,26.8c2.6,0,4.8-2.1,4.8-4.7c0-2.6-2.1-4.7-4.8-4.7c-2.6,0-4.8,2.1-4.8,4.7C42.5,24.7,44.6,26.8,47.2,26.8z" />
                                    <path class="st0"
                                        d="M12.8,16c3.6,0,6.6,3,6.6,6.6c0,3.6-3,6.6-6.6,6.5c-3.6,0-6.6-3-6.6-6.6C6.2,18.9,9.1,16,12.8,16z M12.7,27.2
                                        c2.6,0,4.8-2.1,4.8-4.7c0-2.6-2.1-4.7-4.8-4.7c-2.6,0-4.8,2.1-4.8,4.7C8,25.1,10.1,27.2,12.7,27.2z" />
                                </g>
                            </svg>
                            <div class="ml-2 text-sm md:text-base"><span>Enrollments:</span>
                                <span>{{ $module->course->enrollments->count() }} Students</span>
                            </div>
                        </div>
                        <div class="">
                            @if(!$course->enrolled($course->id))
                                @if (auth()->user())
                                    <form method="POST" action="@if(@$course->price == 0){{ '/courses/enroll' }}@else{{ '/courses/cart' }}@endif" class="text-center w-full">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ @$course->id }}" />
                                        <button type="submit" class="btn black-btn bg-black px-4 md:px-6 py-2 md:py-3 relative overflow-hidden mt-4 z-10 text-white text-center">@if ($course->price == 0) Enroll Now @else Buy Now @endif</button>
                                    </form>
                                @else
                                    <a href="/login" class="cursor-pointer text-white lite-blue-bg-color btn blue-btn relative overflow-hidden inline-block z-10 px-4 md:px-6 py-2 md:py-3">Login</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="course-videos-container mt-20">
                <div class="course-videos-wrapper sm-width">
                    @include('includes.partials.messages')
                    <h2 class="text-2xl font-semibold">{{ $module->title }} Videos</h2>
                    @php
                        $i = 1;
                    @endphp
                    <div class="flex flex-col mt-4">
                        @forelse($videos as $video)
                            @if ($video->is_free == 1 || $course->enrolled($course->id)==1)
                                <a href="{{ '/courses/categories/' .$video->module->course->category->slug .'/' .$video->module->course->slug .'/' .$video->module->slug .'/' .$video->slug }}"
                                    class="course-video mt-2 flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100 relative">
                                    <div class="flex items-center">
                                        <div
                                            class="module-no inline-flex items-center justify-center rounded-full mr-2 md:mr-4 lite-blue-bg-color text-white text-xs md:text-sm">
                                            {{ $i++ }}</div>
                                        <div class="module-detail text-sm md:text-base">{{ $video->title }}</div>
                                    </div>
                                    <div class="play-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                            viewBox="0 0 20 20" fill="#418ffe">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            @else
                                <a wire:click="buyNow({{ $course->id }})"
                                    class="course-video locked cursor-pointer popup-open-btn mt-2 flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100 relative">
                                    <div class="absolute top-0 left-0 bg-black bg-opacity-60 w-full h-full z-10">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 sm:h-6 w-5 sm:w-6 absolute top-2/4 left-2/4 transform -translate-y-2/4 -translate-x-2/4"
                                            fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <div class="flex items-center blured">
                                        <div
                                            class="module-no inline-flex items-center justify-center rounded-full mr-2 md:mr-4 lite-blue-bg-color text-white text-xs md:text-sm">
                                            {{ $i++ }}</div>
                                        <div class="module-detail text-sm md:text-base">{{ $video->title }}</div>
                                    </div>
                                    <div class="play-wrapper blured">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                            viewBox="0 0 20 20" fill="#418ffe">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            @endif   
                        @empty
                            <div class="text-center w-full bg-gray-100 p-4 font-semibold">
                                <p>Videos not found!</p>
                            </div>
                        @endforelse

                        @if(@auth()->user()->id && $course->enrolled($course->id)==1 && (int)$data['savedAnswersCount'] < $data['module']->quizzes->count() && $data['module']->quizzes->count() > 0 && $data['module']->allow_quiz == 1)
                            <a href="{{ '/courses/categories/'.$module->course->category->slug.'/'.$module->course->slug.'/'.$module->slug.'/'.'quiz'}}"
                                class="course-video mt-2 flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100 relative">
                                <div class="flex items-center">
                                    <div class="module-detail text-sm md:text-base">Take Quiz</div>
                                </div>
                            </a>
                        @elseif ((int)$data['savedAnswersCount'] == $data['module']->quizzes->count() && $data['savedAnswersCount'] > 0)
                            <div
                                class="course-video mt-2 flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100 relative">
                                <div class="flex items-center justify-between w-full">
                                    <div class="module-detail text-sm md:text-base"> Quiz Submitted</div>
                                    <div class ="text-right">
                                        <span>Score</span>
                                        @php
                                            $correctAnswerPercent = $data['module']->quizzes->count() > 0 ? $correctAnswers / $data['module']->quizzes->count() * 100 : 0;
                                        @endphp
                                        <span class="@if($correctAnswerPercent > 50){{ 'text-green-600' }}@else{{ 'text-red-500' }}@endif">{{ number_format($correctAnswerPercent, 0) }}%</span>
                                    </div>
                                </div>
                            </div>
                        @elseif($data['module']->allow_quiz == 1)
                            <a class="course-video locked cursor-pointer mt-2 flex justify-between items-center text-gray-500 border border-solid border-gray-200 py-2 px-2 md:px-4 bg-white transition-all duration-300 ease-in-out hover:bg-gray-100 relative">
                                <div class="absolute top-0 left-0 bg-black bg-opacity-60 w-full h-full z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 sm:h-6 w-5 sm:w-6 absolute top-2/4 left-2/4 transform -translate-y-2/4 -translate-x-2/4"
                                        fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <div class="flex items-center blured">
                                    <div class="module-detail text-sm md:text-base">Take Quiz</div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
