@extends('frontend.layouts.virtual')
@section('content')
    @php
        $path = '/static/img/events_placeholder_logo.jpg';
        if($data['speaker_data']->profile != '')
            $path = 'up_data/speakers/'.$data['speaker_data']->profile;
    @endphp
    <main class="profile-page">
        <section class="block h-500-px overflow-hidden">
            <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative pt-72 m-36 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <img alt="..." src="{{ $path }}" class="w-40 h-40 shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" />
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <button class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                        Connect
                                    </button>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                {{-- <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Friends</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Photos</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                {{ $data['speaker_data']->first_name.' '.$data['speaker_data']->last_name }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                {{ $data['speaker_data']->address.', '.$data['speaker_data']->city.', '.$data['speaker_data']->state.', '.$data['speaker_data']->zip.', '.App\Models\Country::get_country_name($data['speaker_data']->country) }}
                            </div>
                            <div class="mb-2 text-blueGray-600 mt-4">
                                <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                {{ $data['speaker_data']->job_title }}
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                                {{ $data['speaker_data']->institute }}
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <h3 class="text-3xl font-semibold leading-normal text-blueGray-700 mb-4">
                                About Me
                            </h3>
                            @if($data['speaker_data']->about != '')
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-9/12 px-4">
                                        <p x-data="{ isCollapsed: false, maxLength: 150, originalContent: '', content: '' }" x-init="originalContent = $el.firstElementChild.textContent.trim(); content = originalContent.slice(0, maxLength)" class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                            <span x-text="isCollapsed ? originalContent : content">{{ $data['speaker_data']->about }}</span><br>
                                            <button @click="isCollapsed = !isCollapsed" x-show="originalContent.length > maxLength"  x-text="isCollapsed ? 'Read less' : 'Read more'" class="font-normal text-pink-500">Read more</button>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="w-full @if($data['speaker_data']->about != '') py-10 border-t border-blueGray-200 @else pb-10 @endif">
                            <x-frontend.div-grid :data="$data['speaker_data']->profession" name="Profession" />
                            <x-frontend.div-grid :data="$data['speaker_data']->classification" name="Classification" />
                            <x-frontend.div-grid :data="$data['speaker_data']->specialty" name="Veterinary Specialty" />
                            <x-frontend.div-grid :data="$data['speaker_data']->employer_type" name="Employer Type" />
                            <x-frontend.div-grid :data="$data['speaker_data']->practice_role" name="Practice Role" />
                            <x-frontend.div-grid :data="$data['speaker_data']->vets_in_practice" name="Veterinarians In Practice" />
                            <x-frontend.div-grid :data="$data['speaker_data']->techs_in_practice" name="Technicians In Practice" />
                            <x-frontend.div-grid :data="$data['speaker_data']->practice_revenue" name="Gross Annual Practice Revenue" />
                            <x-frontend.div-grid :data="$data['speaker_data']->practices_in_group" name="Practices In Group" />
                            @if(count($data['credentials']) > 0)
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600">
                                        Credentials
                                    </p>
                                    <p>
                                        @foreach($data['credentials'] as $credential)
                                            <a href="#"><span class="inline-flex bg-purple-200 text-purple-600 rounded-full h-6 px-3 justify-center items-center text- hover:text-white hover:bg-purple-600">{{ $credential }}</span></a>
                                        @endforeach
                                    </p>
                                </div>
                            @endif
                            <x-frontend.div-grid :data="$data['speaker_data']->website" name="Website" />
                        </div>
                        @if($data['speaker_data']->sm_facebook != '' || $data['speaker_data']->sm_instagram != '' || $data['speaker_data']->sm_twitter != '' || $data['speaker_data']->sm_linkedin != '' || $data['speaker_data']->sm_pinterest != '' || $data['speaker_data']->sm_youtube != '' || $data['speaker_data']->sm_vimeo != '')
                            <div class="w-full pb-6">
                                <h3 class="text-3xl font-semibold leading-normal mb-2 text-blueGray-700 mb-4">
                                    Social Media
                                </h3>
                                <p>
                                    @if($data['speaker_data']->sm_facebook != '')<a href="{{ $data['speaker_data']->sm_facebook }}"><i class="text-4xl fab fa-facebook"></i></a>@endif
                                    @if($data['speaker_data']->sm_instagram != '')<a href="{{ $data['speaker_data']->sm_instagram }}"><i class="text-4xl ml-4 fab fa-instagram-square"></i></a>@endif
                                    @if($data['speaker_data']->sm_twitter != '')<a href="{{ $data['speaker_data']->sm_twitter }}"><i class="text-4xl ml-4 fab fa-twitter"></i></a>@endif
                                    @if($data['speaker_data']->sm_linkedin != '')<a href="{{ $data['speaker_data']->sm_linkedin }}"><i class="text-4xl ml-4 fab fa-linkedin-in"></i></a>@endif
                                    @if($data['speaker_data']->sm_pinterest != '')<a href="{{ $data['speaker_data']->sm_pinterest }}"><i class="text-4xl ml-4 fab fa-pinterest"></i></a>@endif
                                    @if($data['speaker_data']->sm_youtube != '')<a href="{{ $data['speaker_data']->sm_youtube }}"><i class="text-4xl ml-4 fab fa-youtube"></i></a>@endif
                                    @if($data['speaker_data']->sm_vimeo != '')<a href="{{ $data['speaker_data']->sm_vimeo }}"><i class="text-4xl ml-4 fab fa-vimeo-v"></i></a>@endif
                                </p>
                            </div>
                        @endif
                        <hr> 
                        {{-- @dd(sizeof($data['speaker_data']->speakerfile)) --}}
                        @if(sizeof($data['speaker_data']->speakerfile) > 0 )
                            <div class="w-full pb-10 pt-2">
                                <h3 class="text-3xl font-semibold leading-normal mb-2 text-blueGray-700 mb-4">
                                    Documents & Links
                                </h3>
                                @foreach ($data['speaker_data']->speakerfile as $speakerfile)
                                    <div class="py-2 hover:bg-blue-100">
                                        <a href="/speakers/documents/download/{{$speakerfile->id}}" class="flex w-full">
                                            <div class="mx-11 my-auto">
                                                <img src="/up_data/speakers/images/{{$speakerfile->image}}" width="100px" alt="">
                                            </div>
                                            <div class="">
                                                <p class="text-blue-600 text-lg">
                                                    {{$speakerfile->title}}
                                                </p>
                                                <p>
                                                    {{$speakerfile->description}}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection