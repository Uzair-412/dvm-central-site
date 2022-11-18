<div>
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200">Courses</div>

        <div
            class="courses-listing-wrapper grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 mt-6 relative z-0">
            @forelse ($courses as $key => $enrollment)
                <div
                    class="course-listing-card text-center items-center border border-solid border-gray-200 bg-white card relative overflow-hidden p-4 z-10">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    <a
                        href="{{ '/courses/categories/' . @$enrollment->course->category->slug . '/' . @$enrollment->course->slug }}">
                        <div class="img-wrapper relative overflow-hidden w-full h-auto flex flex-col justify-center items-center"
                            style="height: 200px; width:100%;">
                            <img class="transition-all duration-300 ease-in-out w-full"
                                src="/up_data/courses/thumbnails/{{ @$enrollment->course->thumbnail }}"
                                alt="Course Title" />
                        </div>
                    </a>

                    <a href="{{ '/courses/categories/' . @$enrollment->course->category->slug . '/' . @$enrollment->course->slug }}"
                        class="course-listing-title font-semibold text-sm md:text-base mt-4 pt-2 border-t border-solid border-gray-200 block">{{ @$enrollment->course->title }}</a>
                    <div class="flex justify-between text-xs items-center mt-1">
                        <div class="course-listing-mode text-red-500">
                            {{ @$enrollment->course->getCourseType->name }}</div>
                        <a href="{{ '/courses/categories/' . @$enrollment->course->category->slug . '/' . @$enrollment->course->slug }}"
                            class="cursor-pointer text-xs texts-white lite-blue-bg-color btn blue-btn relative overflow-hidden inline-block z-10 px-1 py-0.5">View</a>
                    </div>
                </div>
            @empty
                <div class="flex mt-2 text-blue-500 text-center w-max">
                    <strong class="text-blue-500">Sorry!</strong>, You don’t have any courses in your bucket.
                </div>
            @endforelse
        </div>

</div>
