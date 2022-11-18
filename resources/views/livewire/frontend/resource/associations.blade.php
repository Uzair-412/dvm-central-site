<div>
    <style>
        .pagination-wrapper nav {
            transform: none;
        }
        .pagination-wrapper .pagination {
            display: flex;
        }
        .pagination-wrapper .pagination .page-item {
            background-color: #fff;
            margin: 0px 3px;
            border: 1px solid #ddd;
            width: 40px;
            height: 35px;
            transition: all 0.3s ease-in-out;
        }
        .pagination-wrapper .pagination .page-item.active {
            background-color: #418ffe;
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
    <main id="associations-page" class="relative">
        <div class="associations-container">
            <div class="header-img w-full h-full relative overflow-hidden">
                <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-6">
                    <div class="text-xl font-semibold text-white px-2" style="background-color: #003067">Resources</div>
                    <div class="text-2xl text-white mt-2 font-semibold">Educational Programs</div>
                    <p class="text-gray-200 mt-2 text-sm">Free research papers, books, videos, and more.</p>
                </div>
            </div>
        </div>

        <div class="associations-wrapper width h-max mt-20 flex flex-col lg:flex-row">
            <div class="filter-container lg:w-3/12 lg:mr-4 h-max">
                <h1 class="text-lg sm:text-xl font-semibold">Filter Your Search</h1>
                <div class="assoc-accordion-container w-full bg-gray-100 border border-gray-200 border-solid mt-4">
                    <ul wire:ignore class="assoc-accordion-wrapper cursor-pointer">
                        <li>
                            <div
                                class="flex justify-between w-full leading-normal font-semibold tracking-wide text-sm sm:text-base p-2 sm:p-4 items-center border-b border-solid border-gray-200 relative overflow-hidden transition-all duration-300 ease-in-out hover:bg-white">
                                <span class="mr-4"> Filter By States </span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 assoc-open-icon absolute"
                                    fill="none" viewBox="0 0 24 24" stroke="#418ffe" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </li>
                        <li class="assoc-text-hider">
                            <div class="leading-normal bg-white border-b border-solid border-gray-200">
                                <div class="filter-section py-2" id="education_states">
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

                                        <label
                                            class="sub-heading block hover:bg-gray-100 transition-all duration-300 ease-in-out cursor-pointer px-2 sm:px-4 py-2 text-sm md:text-base">
                                            <input type="checkbox" name="states[]"
                                                wire:model="filter.states.{{ $state->id }}"
                                                id="state{{ $key }}" value="{{ $state->id }}"
                                                @if ($checked == true) checked @endif />&nbsp;
                                            {{ $state->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul wire:ignore class="assoc-accordion-wrapper cursor-pointer">
                        <li>
                            <div
                                class="flex justify-between w-full leading-normal font-semibold tracking-wide text-sm sm:text-base p-2 sm:p-4 items-center relative overflow-hidden transition-all duration-300 ease-in-out hover:bg-white">
                                <span class="mr-4"> Filter By Cities </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 assoc-open-icon absolute"
                                    fill="none" viewBox="0 0 24 24" stroke="#418ffe" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </li>
                        <li class="assoc-text-hider">
                            <div class="leading-normal bg-white border-b border-solid border-gray-200">
                                <div class="filter-section py-2" id="education_city">
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

                                        <label
                                            class="sub-heading block hover:bg-gray-100 transition-all duration-300 ease-in-out cursor-pointer px-2 sm:px-4 py-2 text-sm md:text-base">
                                            <input type="checkbox" name="cities[]"
                                                wire:model="filter.cities.{{ $city->city }}"
                                                id="city{{ $city->id }}" value="{{ $city->city }}"
                                                @if ($checked == true) checked @endif />&nbsp;
                                            {{ $city->city }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                    @if (count($countries) > 1)
                        <ul wire:ignore class="assoc-accordion-wrapper cursor-pointer">
                            <li>
                                <div
                                    class="flex justify-between w-full leading-normal font-semibold tracking-wide text-sm sm:text-base p-2 sm:p-4 items-center border-b border-solid border-gray-200 relative overflow-hidden">
                                    <span class="mr-4"> Filter By Countries </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 assoc-open-icon absolute"
                                        fill="none" viewBox="0 0 24 24" stroke="#418ffe" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </li>


                            <li class="assoc-text-hider">
                                <div class="leading-normal bg-white border-b border-solid border-gray-200">
                                    <div class="filter-section py-2" id="education_country">
                                        @foreach ($countries as $key => $country)
                                            @php
                                                $checked = false;
                                                if (isset($_GET['countries'])) {
                                                    $filteredArray = Arr::where($_GET['countries'], function ($value, $key) use ($country) {
                                                        return $value == $country->id;
                                                    });
                                                    if (count($filteredArray) > 0) {
                                                        $checked = true;
                                                    }
                                                }
                                            @endphp

                                            <label
                                                class="sub-heading block hover:bg-gray-100 transition-all duration-300 ease-in-out cursor-pointer px-2 sm:px-4 py-2 text-sm md:text-base">
                                                <input type="checkbox" name="countries[]"
                                                    wire:model="filter.countries.{{ $country->id }}"
                                                    id="country{{ $country->id }}" value="{{ $country->id }}"
                                                    @if ($checked == true) checked @endif />&nbsp;
                                                {{ $country->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </li>


                        </ul>
                    @endif
                </div>
            </div>

            <div class="associations-listing-container lg:w-9/12 h-max mt-12 lg:mt-0">
                <h1 class="text-lg sm:text-xl font-semibold">Associations</h1>
                @foreach ($Associations as $key => $Association)
                    <div
                        class="association-listing flex flex-col md:flex-row w-full h-max relative overflow-hidden card mt-4">
                        <div
                            class="association-listing-img-wrapper relative bg-white border border-solid border-gray-200 w-full md:w-4/12 overflow-hidden">
                            <img class="lazyload association-listing-img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full object-contain p-2"
                                data-src="{{ asset('up_data/associations/' . $Association->image) }}"
                                alt="association-Listing-Banner" />
                        </div>
                        <div
                            class="association-listing-detail flex flex-col w-full md:w-9/12 justify-center mt-4 md:mt-0 md:ml-4 bg-white border border-solid border-gray-200 p-2 md:p-4 relative overflow-hidden">
                            <span
                                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                            <span
                                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                            <span
                                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                            <span
                                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                            <div class="association-listing-title text-lg sm:text-xl leading-none font-semibold">
                                {{ $Association->name }}</div>
                            <div class="association-listing-state mt-2 text-gray-500 text-sm md:text-base">
                                {{ $Association->state->name }}</div>
                            <address class="association-listing-address mt-2 text-gray-500 text-sm md:text-base">
                                {{ $Association->address_line_1 }}
                                {{ $Association->address_line_2 }}
                                {{ $Association->city }},
                                {{ $Association->zip }}</address>
                            <div
                                class="association-listing-description-wrapper mt-2 leading-snug w-full text-sm md:text-base">
                                <span class="inline-block font-semibold mr-1">Description :</span>
                                <span
                                    class="association-listing-description text-gray-500">{{ $Association->description }}</span>
                            </div>

                            <div class="flex flex-wrap flex-col sm:flex-row">
                                <div
                                    class="association-listing-contact-1-wrapper mt-2 leading-snug w-max text-sm md:text-base">
                                    <span class="inline-block font-semibold mr-1">Phone Number :</span>
                                    <span
                                        class="association-listing-contact-1 text-gray-500">{{ $Association->phone_number }}</span>
                                </div>

                                <div
                                    class="association-listing-contact-2-wrapper mt-2 leading-snug w-max text-sm md:text-base sm:mx-4">
                                    <span class="inline-block font-semibold mr-1">UAN :</span>
                                    <span
                                        class="association-listing-contact-2 text-gray-500">{{ $Association->uan }}</span>
                                </div>

                                <div
                                    class="association-listing-fax-wrapper mt-2 leading-snug w-max text-sm md:text-base">
                                    <span class="inline-block font-semibold mr-1">FAX :</span>
                                    <span
                                        class="association-listing-fax text-gray-500">{{ $Association->fax_number }}</span>
                                </div>
                            </div>
                            @if ($Association->url != '')
                                <a href="{{ $Association->url }}" target="_blank"
                                    class="association-listing-link mt-2 flex items-center relative overflow-hidden lite-blue-color mt-2 inline-block w-max underline-anchors">
                                    Learn More At {{ $Association->url }}
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 transform-all duration-300 ease-in-out" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                
                <div class="associations-listing-container w-full h-max mt-12 lg:mt-4">
                    @if ($Associations->hasPages())
                        <div role="navigation" aria-label="Pagination Navigation" class="pagination-wrapper">
                            <div class="pagination">
                                {{ $Associations->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>
