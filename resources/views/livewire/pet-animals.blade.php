<div>
    <!-- page content -->
    <div class="cmn-deseases-container">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div
                class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-6">
                <div class="text-xl font-semibold text-white px-2" style="background-color: #003067">Resources</div>
                <div class="text-2xl text-white mt-2 font-semibold">Common Deseases</div>
            </div>
        </div>

        <div class="cmn-deseases-wrapper width mt-20 flex flex-col lg:flex-row">
            <div class="cmn-deseases-type-container lg:w-3/12 lg:mr-4">
                <h2 class="text-xl font-semibold">Common Diseases</h2>
                <ul id="item_id"
                    class="cmn-deseases-type-wrapper mt-5 bg-white border border-solid border-gray-200 text-gray-500 p-4 pt-2 text-sm md:text-base"
                    style="max-width:350px;">
                    @foreach ($data['animals'] as $animals)
                        <li>
                            <a href="{{ route('frontend.resources.common-diseases', $animals['slug']) }}"
                                class="cursor-pointer block py-3 border-b border-solid border-gray-200 relative overflow-hidden underline-anchors @if ($animals['id'] == $animal['id']) active-link @endif">
                                {{ $animals['name'] }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="cmn-deseases-container lg:w-9/12 mt-10 lg:mt-0">
                <div class="text-2xl font-semibold">{{ $animal['name'] }}</div>
                <div class="deseases-tab-wrapper grid gap-4 w-full bg-white mt-4 border border-solid border-gray-200">
                    <div class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:flex justify-between items-center lg:justify-start text-sm sm:text-base">
                        @if ($animal['overview_content'])
                            <button class="overview-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 sm:tracking-wide font-semibold z-10 border-b md:border-b-0 border-r border-solid border-gray-200">
                                <span class="in-active active"></span>{{ $animal['overview_heading'] }}
                            </button>
                        @endif
                        @if(count($animal->diseases) > 0)
                            <button class="deseases-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 border-b md:border-b-0 sm:border-r border-solid border-gray-200">
                                <span class="in-active"></span>
                                Diseases
                            </button>
                        @endif
                        @if($animal['healthy_people_content'])
                            <button class=" healthy-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-b md:border-b-0 border-r sm:border-r-0 md:border-r border-solid border-gray-200">
                                <span class="in-active"></span>
                                {{ $animal['healthy_people_heading'] }}
                            </button>
                        @endif
                        
                        @if($animal['healthy_pet_content'])
                            <button class="healthyPet-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-b md:border-b-0 border-r sm:border-r-0 md:border-r border-solid border-gray-200">
                                <span class="in-active"></span>
                                {{ $animal['healthy_pet_heading'] }}
                            </button>
                        @endif

                        @if($animal['resources_content'])
                            <button class="resources-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-r md:border-r-0 lg:border-r border-solid border-gray-200">
                                <span class="in-active"></span>
                                <span>{{ $animal['resources_heading'] }}</span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="w-full p-2 md:p-4 border border-solid border-gray-200 bg-white mt-4 text-gray-500 leading-relaxed text-sm md:text-base">
                    <div class="overview-container w-full">
                        <div class="overview flex flex-col w-full dynamic-data">
                            {!! $animal['overview_content'] !!}
                        </div>
                    </div>

                    <div class="deseases-container flex flex-col hidden">
                        @foreach ($animal->diseases as $key => $disease)
                            @php
                                $length = 600;
                                $overview_content = substr($disease['overview_content'], 0, $length);
                                $next_string = substr($disease['overview_content'], $length);
                                $closeing_tag_start_position = strpos($next_string, '</');
                                $closeing_tag_close_position = strpos($next_string, '>', $closeing_tag_start_position);
                                $string_upto_closing_tag = substr($next_string,0,$closeing_tag_close_position+1);
                            @endphp
                            <div class="deasese-wrapper bg-gray-50 p-2 md:p-4 @if($key>0) mt-4 @endif border border-solid border-gray-200 dynamic-data">
                                <h2>{{ @$disease['name'] }}</h2>
                                <div>
                                    {!! @$overview_content !!} {!! $string_upto_closing_tag !!}
                                </div>
                                <div class="text-right">
                                    <a href="{{ url('/resources/common-diseases/' . $animal['slug'] . '/' . $disease['slug']) }}">More Information</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="healthy-container flex flex-col hidden w-full dynamic-data">
                        {!! $animal['healthy_people_content'] !!}
                    </div>
                    <div class="healthyPet-container flex flex-col hidden w-full dynamic-data">
                        {!! $animal['healthy_pet_content'] !!}
                    </div>
                    <div class="resouces-container flex flex-col hidden dynamic-data">
                        {!! $animal['resources_content'] !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
