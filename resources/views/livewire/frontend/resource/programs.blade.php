<div>
    <style>
        .pagination-wrapper nav {
            transform: none;
        }
        .pagination-wrapper .pagination {
            display: flex;
        }
        .pagination-wrapper .pagination .page-item {
            background: #fff;
            margin: 0px 3px;
            border: 1px solid #ddd;
            width: 40px;
            height: 35px;
            transition: all 0.3s ease-in-out;
        }
        .pagination-wrapper .pagination .page-item.active {
            background: #418ffe;
            color: #ffffff;
            border: 1px solid #418ffe;
        }
        .pagination-wrapper .pagination .page-item .page-link {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .pagination-wrapper .pagination .page-item:hover {
            background-color: #418ffe;
            color: #fff;
            transition: all 0.3s ease-in-out;
        }
    </style>
    <!-- page content -->
    <main id="programs-page" class="relative">
        <div class="programs-container">
            <div class="header-img w-full h-full relative overflow-hidden">
                <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-6">
                    <div class="text-xl font-semibold text-white px-2" style="background-color: #003067">Resources</div>
                    <div class="text-2xl text-white mt-2 font-semibold">Educational Programs</div>
                    <p class="text-gray-200 mt-2 text-sm">Free research papers, books, videos, and more.</p>
                </div>
            </div>

            <div class="programs-wrapper width mt-20 flex flex-col lg:flex-row">
                <div class="edu-programs-type-container lg:w-3/12 lg:mr-4">
                    <div class="text-xl font-semibold">Education Types</div>

                    <div
                        class="edu-programs-type-wrapper mt-5 bg-white border border-solid border-gray-200 text-gray-500 p-4 text-sm md:text-base">
                        @foreach ($types as $key => $type)
                            @php
                                $checked = false;
                                if (isset($_GET['types'])) {
                                    $filteredArray = Arr::where($_GET['types'], function ($value, $key) use ($type) {
                                        return $value == $type->id;
                                    });
                                    if (count($filteredArray) > 0) {
                                        $checked = true;
                                    }
                                }
                            @endphp

                            <label class="flex items-center my-2"> <input wire:model="filter.types.{{ $type->id }}"
                                    type="checkbox" name="types[]" id="type{{ $key }}"
                                    value="{{ $type->id }}"
                                    @if ($checked == true) checked @endif />&nbsp; {{ $type->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="text-xl font-semibold my-4">States</div>
                    <div
                        class="edu-programs-type-wrapper bg-white border border-solid border-gray-200 text-gray-500 p-4 text-sm md:text-base">
                        @foreach ($states as $key => $state)
                            @php
                                $checked = false;
                                if (isset($_GET['states'])) {
                                    $filteredArray = Arr::where($_GET['states'], function ($value, $key) use ($state) {
                                        return $value == $state->id;
                                    });
                                    if (count($filteredArray) > 0) {
                                        $checked = true;
                                    }
                                }
                            @endphp

                            <label class="flex items-center my-2"> <input type="checkbox" name="states[]"
                                    wire:model="filter.states.{{ $state->id }}" id="state{{ $key }}"
                                    value="{{ $state->id }}"
                                    @if ($checked == true) checked @endif />&nbsp; {{ $state->name }}
                            </label>
                        @endforeach
                    </div>
                    <div class="text-xl font-semibold my-4">Cities</div>
                    <div
                        class="edu-programs-type-wrapper mt-4 bg-white border border-solid border-gray-200 text-gray-500 p-4 text-sm md:text-base">
                        @foreach ($cities as $key => $city)
                            @php
                                $checked = false;
                                if (isset($_GET['cities'])) {
                                    $filteredArray = Arr::where($_GET['cities'], function ($value, $key) use ($city) {
                                        return $value == $city->city;
                                    });
                                    if (count($filteredArray) > 0) {
                                        $checked = true;
                                    }
                                }
                            @endphp 

                            <label class="flex items-center my-2"> <input type="checkbox" name="cities[]"
                                    wire:model="filter.cities.{{ $city->city }}" id="city{{ $city->id }}"
                                    value="{{ $city->city }}"
                                    @if ($checked == true) checked @endif />&nbsp; {{ $city->city }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="edu-programs-container lg:w-9/12">
                    <div class="text-2xl font-semibold">Education</div>
                    <div class="edu-progams-wrapper grid lg:grid-cols-2 gap-4 mt-4">
                        @foreach ($Programs as $key => $program)
                            <div
                                class="edu-program flex flex-col text-gray-500 relative overflow-hidden p-4 bg-white card border border-solid border-gray-200 transform duration-300 ease-in-out">
                                <span
                                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span
                                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span
                                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span
                                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                <div class="edu-program-title font-semibold primary-black-color">
                                    {{ $program->type->name }} - {{ $program->institute->name }}</div>
                                <div class="edu-program-state mt-2">{{ $program->institute->state->name }}</div>
                                <address class="edu-program-location mt-2">{{ $program->institute->address_line_1 }}
                                    {{ $program->institute->address_line_2 }}
                                    {{ $program->institute->city }},
                                    {{ $program->institute->zip }}</address>

                                <div class="mt-2">
                                    <span class="inline font-semibold primary-black-color"> Program Director : </span>
                                    <span class="inline edu-program-director"> {{ $program->director->name }}</span>
                                </div>

                                <div class="mt-2">
                                    <span class="inline font-semibold primary-black-color"> Discipline Code : </span>
                                    <span class="inline edu-program-dis-code"> {{ $program->discipline_code }}
                                    </span>
                                </div>

                                <div class="mt-2">
                                    <span class="inline font-semibold primary-black-color"> Accreditation Status :
                                    </span>
                                    <span class="inline edu-program-acc-status">
                                        {{ $program->accreditation_status->name }}</span>
                                </div>

                                <div class="mt-2">
                                    <span class="inline font-semibold primary-black-color"> Last Accreditation Visit :
                                    </span>
                                    <span class="inline edu-program-last-acc-status">
                                        {{ $program->last_accreditation_visit }} </span>
                                </div>

                                <div class="mt-2">
                                    <span class="inline font-semibold primary-black-color"> Next Accreditation Visit :
                                    </span>
                                    <span class="inline edu-program-next-acc-status">
                                        {{ $program->next_accreditation_visit }} </span>
                                </div>
                                @if ($program->institute->url != '')
                                    <a href="{{ $program->institute->url }}" target="_blank"
                                        class="edu-program-src flex items-center relative overflow-hidden lite-blue-color mt-2 inline-block w-max underline-anchors">
                                        Learn More at &nbsp; {{ $program->institute->url }}
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 transform-all duration-300 ease-in-out" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                        {{-- @php
                            $pagination = $Programs->appends(request()->except('page'))->links();
                        @endphp
                        @if (!empty(trim($pagination)))
                            <div class="pagination-wrapper">
                                <div class="ps-pagination">
                                    {!! $pagination !!}
                                </div>
                            </div>
                        @endif --}}
                    </div>
                    <div class="edu-progams-wrapper grid lg:grid-cols-2 gap-4 mt-4">
                        @if ($Programs->hasPages())
                            <div role="navigation" aria-label="Pagination Navigation" class="pagination-wrapper">
                                <div class="pagination">
                                    {{ $Programs->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
