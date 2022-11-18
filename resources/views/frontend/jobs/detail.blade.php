@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/job-details.css" />
@endpush
@section('content')
    <!-- page content -->
    @if($job_detail)
    <div id="popupcard" class="bg-black bg-opacity-40 fixed flex h-sce h-screen items-center justify-center left-0 top-0 w-full z-20 hidden">
        <div class="popupcard bg-white border rounded shadow-lg w-2/4">
            <form action="{{ route('frontend.job.apply') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-gray-200 md:text-base text-sm border-b p-2 px-4 h-24">
                    <p class="pb-2">Upload Resume @if(@$job_detail->application_prefrences->resume_submission == 'Yes') <span class="text-red-500">*</span> @else <span class="text-gray-500 text-xs">(Optional)</span> @endif</p>
                    <input type="file" value="" name="resume_file" @if(@$job_detail->application_prefrences->resume_submission == 'Yes') required @endif />
                </div>
                <div class="questions p-2 px-4">
                    <label for="">How much experience do you have in the revelant field?</label>
                    <input type="text" name="years_of_experience" id="years_of_experience"
                        class="desktop-search-bar p-3 focus:outline-none text-gray-500 w-full h-auto border-2">
                    <input type="hidden" name="vendor_job_id" value="{{ @$job_detail->id }}">
                    @if($job_detail)
                        @foreach ($job_detail->application_questions as $questions)
                        <div class="question my-2">
                            <label for="">{{ $questions->question }}</label>
                            <input type="hidden" name="quetion_id[]" value="{{ $questions->id }}">
                            <input type="text" name="answer[]" id="answer"
                                class="desktop-search-bar p-3 focus:outline-none text-gray-500 w-full h-auto border-2 ">
                        </div>
                        @endforeach
                    @endif
                    <div class="education_level my-2 flex flex-col">
                        <label for="education_level">Education Level:</label>
                        <select name="education_level" id="education_level" class="border-2 p-1" required>
                            <option value="">- Select Education Level -</option>
                            @foreach ($education_levels as $education_level)
                                <option value="{{ $education_level->id }}">{{ $education_level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="p-1 flex justify-end rounded-b">
                    <button type="submit" class="hashtag btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-4 py-2 md:px-6 text-sm md:text-base mr-2">OK</button>
                    <button id="close-popup" class="focus:outline-none py-1 px-2 md:py-2 md:px-3 w-24 bg-red-700 hover:bg-red-600 text-white ">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    
    <main id="job-detail-page" class="relative bg-gray-50">
        <div class="job-detail-container mt-20 width flex flex-col lg:flex-row">

            <div class="job-detail-wrapper w-full lg:w-8/12">
                <h2 class="font-semibold primary-black-color text-base md:text-xl">Job Details</h2>
                @include('includes.partials.messages')
                <div class="job-details bg-white border border-solid border-gray-200 lg:mr-4 p-2 md:p-4 mt-6">
                    <div class="flex justify-between items-center">
                        <h2 class="job-title font-semibold lite-blue-color text-lg md:text-2xl">{{ $job_detail->title }}
                        </h2>
                        @if (auth()->user() && $job_detail->getAppliedUser($job_detail->id))
                            <span
                                class="relative overflow-hidden inline-block z-10 bg-blue-100 border border-blue-500 bg-opacity-20 lite-blue-color px-4 py-2 md:px-6 text-sm md:text-base mr-2 cursor-not-allowed">
                                Applied
                            </span>
                        @elseif (auth()->user())
                            <button id="hashtag"
                                class="hashtag btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-4 py-2 md:px-6 text-sm md:text-base mr-2">
                                Apply
                            </button>
                        @else
                            <a href="/login"
                                class="hashtag btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-4 py-2 md:px-6 text-sm md:text-base mr-2">
                                Login to apply
                            </a>
                        @endif
                    </div>
                    <div class="job-info text-gray-500 flex flex-wrap items-center text-xs border-b border-solid border-gray-200 pb-4 mt-2">
                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Company : </span><span class="job-compnay font-semibold primary-black-color">{{ $job_detail->vendor->name }}</span>
                        </div>

                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Location : </span>
                            <span class="font-semibold primary-black-color">
                                <span class="city">{{ $job_detail->city }}</span>,
                                <span class="state">{{ $job_detail->state->iso2 }} </span>,
                                <span class="country">{{ $job_detail->country->name }}</span>
                        </div>

                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Posted On : </span><span
                                class="job-post-date font-semibold primary-black-color">{{ date('M-d-Y',$job_detail->created_time) }}</span>
                        </div>

                        <div
                            class="mt-2 mr-2 md:mr-4 job-card-job-type font-semibold lite-blue-color blue-border border-solid border px-2 py-1 bg-blue-50">
                            {{ $job_detail->job_working_time->name }}
                        </div>

                        <div class="mt-2 mr-2 md:mr-4 flex items-center">
                            <span class="mr-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="#418ffe" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <span
                                class="job-contact-no font-semibold primary-black-color">{{ $job_detail->vendor->phone }}</span>
                        </div>
                        @if(@$job_detail->application_prefrences->receive_application == 'Email')
                            <div class="mt-2 mr-2 md:mr-4 flex items-center">
                                <span class="mr-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="#418ffe" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <span class="job-email font-semibold primary-black-color">{!! \App\Models\Customer::getCustomerEmail($job_detail->vendor->user) !!}</span>
                            </div>
                        @endif
                        <div class="mt-2 mr-2 md:mr-4 font-semibold text-xs w-full text-black font-semibold">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4">
                                <span class="flex flex-wrap items-center">
                                @if($job_detail->urgent_hiring)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 lite-blue-color rounded-full" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    urgent hiring
                                @endif
                                </span>
                                @if($job_detail->application_end_time)
                                    <span class="sm:text-right font-semibold">
                                        Valid upto: <span class="lite-blue-color font-semibold">{{ date('M-d-Y',$job_detail->application_end_time) }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="job-description-wrapper mt-4">
                        <h3 class="font-semibold primary-black-color text-sm md:text-base">Job description</h3>
                        <p class="job-description text-xs md:text-sm text-gray-500 mt-2 leading-relaxed">
                            {!! $job_detail->description !!}
                        </p>

                        <h3 class="font-semibold primary-black-color text-sm md:text-base mt-4">Job Requirements</h3>
                        <ul class="job-requirments list-disc ml-5 text-xs md:text-sm text-gray-500">
                            <li class="mt-2">At least a {{ $job_detail->required_experience_num }} {{ $job_detail->required_experience_duration }} experience in {{ $job_detail->required_experience_title }}.
                            </li>
                            <li class="mt-2">Required minimum {{ $job_detail->minimum_education_level->name }} qualification.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div
                class="job-overview-container w-full sm:w-6/12 lg:w-4/12 mt-10 lg:mt-0 self-center lg:self-start sticky top-20">
                <h2 class="font-semibold primary-black-color text-base md:text-xl">Job Overview</h2>
                <div class=" flex flex-col bg-white border border-solid border-gray-200 p-2 md:p-4 mt-6">
                    <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="salary-range-wrapper">
                            <h4 class="font-semibold primary-black-color">Offered Salary</h4>
                            <div class="salary-range text-gray-500 text-xs md:text-sm mt-1">${{ $job_detail->salary }} {{ $job_detail->salary_type_->name }}
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <div class="gender-wrapper">
                            <h4 class="font-semibold primary-black-color">Gender</h4>
                            <div class="gender text-gray-500 text-xs md:text-sm mt-1">{{ $job_detail->gender }}</div>
                        </div>
                    </div> --}}

                    <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <div class="industry-wrapper">
                            <h4 class="font-semibold primary-black-color">Category</h4>
                            @foreach ($job_detail->job_categories as $key => $category)
                                <div class="industry text-gray-500 text-xs md:text-sm mt-1">
                                    {{ $category->category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <div class="industry-wrapper">
                            <h4 class="font-semibold primary-black-color">Job types</h4>
                            @foreach ($job_detail->job_types as $key => $job_type)
                                <div class="industry text-gray-500 text-xs md:text-sm mt-1">
                                    {{ $job_type->job_type->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                        </svg>
                        <div class="experience-wrapper">
                            <h4 class="font-semibold primary-black-color">Experience</h4>
                            <div class="experience text-gray-500 text-xs md:text-sm mt-1">
                                {{ $job_detail->required_experience_num }}
                                {{ $job_detail->required_experience_duration }}
                                {{ $job_detail->required_experience_title }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <div class="experience-wrapper">
                            <h4 class="font-semibold primary-black-color">Qualification</h4>
                            <div class="experience text-gray-500 text-xs md:text-sm mt-1">{!! \App\Models\EducationLevel::education_level($job_detail->minimum_education_level_id) !!}</div>
                        </div>
                    </div> --}}

                    <div class="mt-2 mr-2 md:mr-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                            stroke="#418ffe" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <div class="experience-wrapper">
                            <h4 class="font-semibold primary-black-color">Number Of Positions</h4>
                            <div class="experience text-gray-500 text-xs md:text-sm mt-1">
                                {{ $job_detail->num_of_position }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="related-jobs-container sm-width mt-20">
            @if (@$related_jobs->count() > 0)
                <h2 class="font-semibold primary-black-color text-base md:text-xl">Related Jobs</h2>
                @foreach ($related_jobs as $related_job)
                    <div class="related-jobs-wrapper">
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
                                    href="/jobs/detail/{{ $related_job->slug }}">
                                    <h3 class="job-title font-semibold text-base md:text-xl">{{ $related_job->title }}
                                    </h3>
                                </a>
                                <div
                                    class="rounded-full p-1 transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="#418ffe" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="job-info text-gray-500 flex flex-wrap text-xs">
                                <div class="mt-2 mr-2 md:mr-4">
                                    <span>Company : </span><span
                                        class="job-compnay font-semibold primary-black-color">{{ $related_job->vendor->name }}</span>
                                </div>
                                <div class="mt-2 mr-2 md:mr-4">
                                    <span>Posted On : </span><span
                                        class="job-post-date font-semibold primary-black-color">{{ $related_job->created_time }}</span>
                                </div>
                                <div class="mt-2 mr-2 md:mr-4">
                                    <span>Salary : </span>
                                    <span class=" font-semibold primary-black-color">
                                        <span class="mr-0.25 salary-amount">${{ $related_job->salary }}</span>
                                        <span class="salary-type">{{ $related_job->salary_type_->name }}</span>
                                    </span>
                                </div>
                                <div class="mt-2 mr-2 md:mr-4">
                                    <span>State : </span>
                                    <span class="font-semibold primary-black-color state">{{ $related_job->state->name }}</span>
                                </div>
                                <div class="mt-2 mr-2 md:mr-4">
                                    <span>Country : </span>
                                    <span class="font-semibold primary-black-color state">{{ $related_job->country->name }}</span>
                                </div>
                                <div
                                    class="mt-2 mr-2 md:mr-4 job-card-job-type font-semibold lite-blue-color blue-border border-solid border px-2 py-1 bg-blue-50">
                                    {{ $related_job->job_working_time->name }}
                                </div>

                            </div>
                            <p class="job-description text-xs md:text-sm text-gray-500 mt-2">
                                {!! $related_job->description !!}
                            </p>

                            <div class="job-hashtag-wrapper mt-2 flex flex-wrap">
                                <a href="#"
                                    class="hashtag btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-2 py-1 text-xs mr-2">
                                    Dental
                                </a>
                                <a href="#"
                                    class="hashtag btn blue-btn relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-2 py-1 text-xs mr-2">
                                    Sergeon
                                </a>
                            </div>


                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </main>
    @else
        <div class="flex items-center justify-center left-0 my-16 text-2xl top-0 w-full z-20">
            <h4 class="font-semibold primary-black-color">There is no detail for this job right now</h4>
        </div>
    @endif
    <script>
        var button_show = document.getElementById('hashtag');

        button_show.onclick = function() {
            var div = document.getElementById('popupcard');
            div.style.display = 'flex';
        };

        var button_cancel = document.getElementById('close-popup');
        button_cancel.onclick = function() {
            var div = document.getElementById('popupcard');
            div.style.display = 'none';
        };
    </script>
@endsection
{{-- @push('after-scripts')
    <script defer src="{{ asset('assets/js/jobs.js') }}"></script>
@endpush --}}
