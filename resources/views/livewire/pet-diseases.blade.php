<div>
    <!-- page content -->
    <main id="cmn-deseases-page" class="relative">
        <div class="cmn-deseases-container">
            <div class="cmn-deseases-wrapper width mt-20 flex flex-col lg:flex-row">
                <div class="cmn-deseases-type-container lg:w-3/12 lg:mr-4">
                    <h2 class="text-xl font-semibold">{{ $animal->name }} Diseases</h2>
                    @if( !empty ($disease['id']))
                        <ul class="cmn-deseases-type-wrapper mt-5 bg-white border border-solid border-gray-200 text-gray-500 p-4 pt-2 text-sm md:text-base" style="max-width:350px;">
                            @foreach ($animal->diseases as $diseases)
                                <li>
                                    <a href="{{ route('frontend.resources.common-diseases.pet',[$animal['slug'],$diseases['slug']]) }}"
                                        class="cursor-pointer -backdrop-hue-rotate-60 block py-3 border-b border-solid border-gray-200 relative overflow-hidden underline-anchors @if($disease['id'] == $diseases['id']) active-link @endif">
                                        {{ $diseases['name'] }} </a>
                                </li>
                            @endforeach 
                        </ul>
                    
                    @else
                    <div class="text-red-500">No desease found.</div>    
                    @endif 
                </div>
                @if ($disease)
                    <div class="cmn-deseases-container lg:w-9/12 mt-10 lg:mt-0">
                        <div class="flex items-center">
                            <h2 class="desease-title text-2xl font-semibold">{{ $disease['name'] }}</h2>
                        </div>
                        <div class="deseases-tab-wrapper grid gap-4 w-full bg-white mt-4 border border-solid border-gray-200">
                            <div class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:flex justify-between items-center lg:justify-start text-sm sm:text-base">
                                @if ($disease['overview_content'])
                                <button class="overview-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 sm:tracking-wide font-semibold z-10 border-b md:border-b-0 border-r border-solid border-gray-200">
                                    <span class="in-active active"></span>{{ $disease['overview_heading'] }}
                                </button>
                                @endif
                                @if ($disease['prevention_content'])
                                <button class="deseases-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 border-b md:border-b-0 sm:border-r border-solid border-gray-200">
                                    <span class="in-active"></span>
                                    <span>{{ $disease['prevention_heading'] }}</span>
                                </button>
                                @endif
                                @if ($disease['treatment_content'])
                                <button class=" healthy-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-b md:border-b-0 border-r sm:border-r-0 md:border-r border-solid border-gray-200">
                                    <span class="in-active"></span>
                                    {{ $disease['treatment_heading'] }}
                                </button>
                                @endif
                                @if ($disease['more_info_content'])
                                <button class="resources-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-r md:border-r-0 lg:border-r border-solid border-gray-200">
                                    <span class="in-active"></span>
                                    <span>{{ $disease['more_info_heading'] }}</span>
                                </button>
                                @endif
                            </div>
                        </div>
                        <div class="w-full p-2 md:p-4 border border-solid border-gray-200 bg-white mt-4 dynamic-data text-gray-500 leading-relaxed text-sm md:text-base">
                            <div class="overview-container w-full">
                                <div class="overview flex flex-col w-full">
                                    {!! $disease['overview_content'] !!}
                                </div>
                            </div>

                            <div class="deseases-container flex flex-col hidden dynamic-data">
                                {!! $disease['prevention_content'] !!}
                            </div>

                            <div class="healthy-container flex flex-col hidden w-full dynamic-data">
                                {!! $disease['treatment_content'] !!}
                            </div>

                            <div class="resouces-container flex flex-col hidden dynamic-data">
                                {!! $disease['more_info_content'] !!}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </main>
</div>
