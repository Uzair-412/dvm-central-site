<div>
    <div class="jobs-container">
        <div class="job-search-container sm-width mt-20">
            <div class="job-search-wrapper flex flex-col md:flex-row items-center w-full">
                <h2 class="text-2xl font-semibold md:mr-4 md:w-2/12">Find Jobs</h2>
                <div
                    class="j-search-wrapper flex justify-between items-center relative z-40 border border-solid border-gray-200 overflow-hidden w-full md:w-10/12 mt-4 md:mt-0">
                    <input type="search" placeholder="Search for jobs ..." wire:model="filter.search"
                        class="j-search p-2 md:p-3 focus:outline-none text-gray-500 w-full h-auto text-sm md:text-base" wire:ignore />
                    <button
                        class="btn blue-btn lite-blue-bg-color text-white relative overflow-hidden h-full z-10 p-2 md:p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="#fff" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="job-filter-posts flex flex-col lg:flex-row mt-8 width items-center lg:items-start">
            <div class="j-filter j-accordion-container lg:mr-4 w-full lg:w-4/12" wire:ignore>
                <h2 class="font-semibold text-lg md:text-xl mb-2">Filter By</h2>
                <ul
                    class="company-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Company</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="company-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($companies)
                            @foreach ($companies as $key => $company)
                                <li
                                    class="job-company py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="company_{{ $company->id }}">{{ $company->name }}</label>
                                    <input class="cursor-pointer" wire:model="filter.vendors.{{ $key }}"
                                        id="company_{{ $company->id }}" value="{{ $company->id }}" name="company[]"
                                        type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>

                <ul
                    class="job-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Country</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="job-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($countries)
                            @foreach ($countries as $key => $country)
                                <li
                                    class="job-country py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="country{{ $country->id }}">{{ $country->name }}</label>
                                    <input class="cursor-pointer" id="country{{ $country->id }}"
                                        wire:model="filter.countries.{{ $key }}" name="country[]"
                                        value="{{ $country->id }}" type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>

                <ul
                    class="state-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">State</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="state-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($states)
                            @foreach ($states as $key => $state)
                                <li
                                    class="job-state py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="state_{{ $state->id }}">{{ $state->name }}</label>
                                    <input class="cursor-pointer" id="state_{{ $state->id }}"
                                        wire:model="filter.states.{{ $key }}" name="state[]"
                                        value="{{ $state->id }}" type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>

                <ul
                    class="category-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Job Category</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="category-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($categories)
                            @foreach ($categories as $key => $category)
                                <li
                                    class="job-category py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="category{{ $category->id }}">{{ $category->name }}
                                    </label>
                                    <input class="cursor-pointer" id="category{{ $category->id }}" name="category[]"
                                        wire:model="filter.categories.{{ $key }}"
                                        value="{{ $category->id }}" type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>

                <ul class="type-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Job Type</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>
                    <ul class="type-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @foreach ($job_types as $key => $type)
                            <li class="job-type py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                <label class="w-full cursor-pointer mr-4"
                                    for="type{{ $type->id }}">{{ $type->name }} </label>
                                <input class="cursor-pointer" id="type{{ $type->id }}" name="type[]"
                                    wire:model="filter.types.{{ $key }}" value="{{ $type->id }}"
                                    type="checkbox" />
                            </li>
                        @endforeach
                    </ul>
                </ul>

                <ul
                    class="work-time-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Working Time</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="work-time-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($working_times)
                            @foreach ($working_times as $key => $working_time)
                                <li
                                    class="job-work-time py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="worktime{{ $working_time->id }}">{{ $working_time->name }}</label>
                                    <input class="cursor-pointer" id="worktime{{ $working_time->id }}"
                                        name="worktime[]" wire:model="filter.working_time.{{ $key }}"
                                        value="{{ $working_time->id }}" type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>

                <ul
                    class="education-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Education</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="education-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($educations)
                            @foreach ($educations as $key => $education)
                                <li
                                    class="job-education py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="education_{{ $education->id }}">{{ $education->name }}
                                    </label>
                                    <input class="cursor-pointer" id="education_{{ $education->id }}"
                                        name="education[]" wire:model="filter.educations.{{ $key }}"
                                        value="{{ $education->id }}" type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>

                <ul
                    class="working-filter-container j-accordion-wrapper filter-container relative border border-solid border-gray-200 bg-white mt-2">
                    <li
                        class="flex justify-between items-center cursor-pointer filter-open py-2 px-2 md:px-4 transition-all duration-300 ease-in-out hover:bg-gray-100">
                        <h3 class="text-sm md:text-base font-semibold">Salary Type</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 filter-open-icon" viewBox="0 0 20 20"
                            fill="#418ffe">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <ul class="working-filter-wrapper filter-hider filter-wrapper text-gray-500 text-sm ml-4">
                        @if ($salary_types)
                            @foreach ($salary_types as $key => $salary_type)
                                <li
                                    class="job-working py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-gray-100 px-4">
                                    <label class="w-full cursor-pointer mr-4"
                                        for="salary_type{{ $salary_type->id }}">
                                        {{ $salary_type->name }}</label>
                                    <input class="cursor-pointer" id="salary_type{{ $salary_type->id }}"
                                        name="salary_type[]" wire:model="filter.salary_types.{{ $key }}"
                                        value="{{ $salary_type->id }}" type="checkbox" />
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </ul>
                <h3 class="text-sm md:text-base font-semibold mt-2">Salary</h3>
                <div class="salary-range-wrapper">
                    <div class="flex justify-center items-center">
                        <div x-data="range()" x-init="mintrigger();
                        maxtrigger()" class="relative max-w-xl w-full mt-4">
                            <div>
                                <input type="range" step="100" x-bind:min="min" x-bind:max="max"
                                    x-on:input="mintrigger" x-model="minprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer" />

                                <input type="range" step="100" x-bind:min="min" x-bind:max="max"
                                    x-on:input="maxtrigger" x-model="maxprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer" />

                                <div class="relative z-10 h-1">
                                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 bg-white"></div>

                                    <div class="absolute z-20 top-0 bottom-0 bg-gray-200"
                                        x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>

                                    <div class="absolute z-30 range-balls top-0 left-0 lite-blue-bg-color rounded-full "
                                        x-bind:style="'left: ' + minthumb + '%'"></div>

                                    <div class="absolute z-30 range-balls top-0 right-0 lite-blue-bg-color rounded-full"
                                        x-bind:style="'right: ' + maxthumb + '%'"></div>
                                </div>
                            </div>
                            <input type="hidden" name="max_price" id="min_price" value="0">
                            <input type="hidden" name="max_price" id="max_price" value="{{ $maxPrice }}">
                            <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                                <div>
                                    <input type="text" maxlength="5" x-on:input.debounce="mintrigger" x-model="minprice" wire:model="filter.salary_range.0" 
                                        wire:model.debounce.300="minPrice"
                                        class="w-16 p-2 text-center border border-gray-200 bg-white" />
                                </div>
                                <div class="font-semibold lite-blue-color">USD</div>
                                <div>
                                    <input type="text" maxlength="5" x-on:input.debounce.300="maxtrigger" wire:model="filter.salary_range.1" 
                                        x-model="maxprice" wire:model.debounce="maxPrice"
                                        class="w-16 p-2 text-center border border-gray-200 bg-white" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <li
                    class="mt-2 py-1 flex w-full justify-between items-center transition-all duration-300 ease-in-out hover:bg-white text-sm md:text-base font-semibold">
                    <label class="w-full cursor-pointer mr-4" for="urgent_hiring">Urgent Hiring</label>
                    <input class="cursor-pointer" id="urgent_hiring" name="urgent_hiring" type="checkbox" value="1" wire:model="filter.urgent_hiring" />
                </li>
            </div>

            {{-- Jobs Result --}}
            <div class="job-results-wrapper lg:w-8/12 mt-10 lg:mt-0">
                <h2 class="font-semibold text-lg md:text-xl">Jobs</h2>
                @include('includes.partials.messages')
                @livewire('frontend.jobs.jobs-results')
            </div>
        </div>
    </div>
</div>
