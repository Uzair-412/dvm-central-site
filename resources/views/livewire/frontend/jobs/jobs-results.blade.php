<div>
    @if(@$filter['multi_categories'])
        <div class="bg-white border border-solid border-gray-200 p-2 mt-2 card overflow-hidden items-center flex">
            @foreach($filter['multi_categories'] as $cat)
                <div class="hashtag relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-2 py-1 text-xs mr-2">{{ $cat }}</div>
            @endforeach
        </div>
    @endif
    @if (@$jobs->count() > 0)
        @foreach ($jobs as $job)
            <div
                class="job-card bg-white border border-solid border-gray-200 p-2 md:p-4 mt-2 card relative overflow-hidden">
                <span
                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                <span
                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                <span
                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                <span
                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                <div class="job-title-wrapper flex justify-between items-center">
                    <a class="underline-links relative overflow-hidden inline-block"
                        href="/jobs/detail/{{ $job->slug }}">
                        <h3 class="job-title font-semibold text-base md:text-xl">{{ $job->title }}</h3>
                    </a>
                    <button wire:click="add_to_wishlist({{ $job->id }})"
                        class="rounded-full p-1 transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer">
                        @php
                            $wishlist = $job->userWishlist();
                        @endphp
                        @if ($wishlist && $wishlist->count() > 0)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="#418ffe"
                                viewBox="0 0 24 24" stroke="#418ffe" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="#418ffe" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        @endif
                    </button>
                </div>
                <div class="job-info text-gray-500 flex flex-wrap text-xs">
                    <div class="mt-2 mr-2 md:mr-4">
                        <span>Company : </span>
                        <span
                            class="job-compnay font-semibold primary-black-color">{{ $job->vendor->name }}</span>
                    </div>
                    <div class="mt-2 mr-2 md:mr-4">
                        <span>Posted On : </span>
                        <span
                            class="job-post-date font-semibold primary-black-color">{{ date('m-d-Y', $job->created_time) }}</span>
                    </div>
                    <div class="mt-2 mr-2 md:mr-4">
                        <span>Salary : </span>
                        <span class=" font-semibold primary-black-color">
                            <span class="mr-0.25 salary-amount">${{ $job->salary }}</span>
                            <span class="salary-type">{{ $job->salary_type_->name }}</span>
                        </span>
                    </div>
                    <div class="mt-2 mr-2 md:mr-4">
                        <span>State : </span>
                        <span class="font-semibold primary-black-color state">
                            {{  $job->state->name }}
                        </span>
                    </div>
                    <div class="mt-2 mr-2 md:mr-4">
                        <span>Country : </span>
                        <span class="font-semibold primary-black-color state">
                            {{ $job->country->name }}
                        </span>
                    </div>
                    <div class="mt-2 mr-2 md:mr-4 job-card-job-type font-semibold lite-blue-color">
                        {{ $job->job_working_time->name }}
                    </div>
                </div>
                @if ($job->urgent_hiring)
                    <div>
                        <div class="mt-2 mr-2 md:mr-4 job-card-job-type font-semibold text-sm">
                            <span class="flex flex-wrap items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 mr-1 lite-blue-color rounded-full" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                urgent hiring
                            </span>
                        </div>
                    </div>
                @endif
                <p class="job-description text-xs md:text-sm text-gray-500 mt-2">
                <div class="text-sm text-gray-500">
                    {!! $job->description !!}
                </div>
                </p>

                <div class="job-hashtag-wrapper mt-2 flex flex-wrap">
                    @foreach ($job->job_categories as $key => $category)
                        @if(@$category->category->name)
                            <div class="hashtag btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-2 py-1 text-xs mr-2">
                                {{ $category->category->name }}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center w-full bg-gray-100 p-4 font-semibold mt-4">
            <p>Jobs not found!</p>
        </div>
    @endif
</div>
