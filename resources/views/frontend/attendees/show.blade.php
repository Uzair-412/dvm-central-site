@extends('frontend.layouts.virtual')
@section('content')
    @php
        $path = '/static/img/events_placeholder_logo.jpg';
        if($data['attendee']->image != '')
            $path = 'up_data/attendees/images/'.$data['attendee']->image;
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
                                    {{-- <button class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                        Connect
                                    </button> --}}
                                    @if (session()->has('ses_attendee'))
                                        @if (session()->get('ses_attendee')['attendee_user']['id'] == $data['attendee']->id)
                                            <a href="{{route('frontend.events.attendees.update', [$event->slug, $data['attendee']->id])}}" class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                                Edit
                                            </a>
                                        @endif
                                    @endif
                                   
                                   
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    {{-- <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Friends</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Photos</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-16">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                {{ $data['attendee']->first_name.' '.$data['attendee']->last_name }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                @php
                                    $type = is_numeric($data['attendee']->state);
                                    if (is_numeric($data['attendee']->state)) {
                                        $state = DB::table('states')->where('id', $data['attendee']->state)->value('name');
                                    }else{
                                        $state = $data['attendee']->state;
                                    }
                                @endphp 
                                {{ $data['attendee']->address.', '.$data['attendee']->city.', '.$state.', '.$data['attendee']->zip.', '.( @$data['attendee']->country ? App\Models\Country::get_country_name($data['attendee']->country) : NULL) }}
                            </div>
                            <div class="mb-2 text-blueGray-600 mt-4">
                                <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                {{ $data['attendee']->job_title }}
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                                {{ $data['attendee']->institute }}
                            </div>
                        </div>
                        {{-- <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <h3 class="text-3xl font-semibold leading-normal text-blueGray-700 mb-4">
                                About Me
                            </h3>
                            @if($data['attendee']->about != '')
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-9/12 px-4">
                                        <p x-data="{ isCollapsed: false, maxLength: 150, originalContent: '', content: '' }" x-init="originalContent = $el.firstElementChild.textContent.trim(); content = originalContent.slice(0, maxLength)" class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                            <span x-text="isCollapsed ? originalContent : content">{{ $data['attendee']->about }}</span><br>
                                            <button @click="isCollapsed = !isCollapsed" x-show="originalContent.length > maxLength"  x-text="isCollapsed ? 'Read less' : 'Read more'" class="font-normal text-pink-500">Read more</button>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div> --}}
                        <div class="w-full @if($data['attendee']->about != '') py-10 border-t border-blueGray-200 @else pb-10 @endif">
                            <x-frontend.div-grid :data="$data['attendee']->profession" name="Profession" />
                            <x-frontend.div-grid :data="$data['attendee']->classification" name="Classification" />
                            <x-frontend.div-grid :data="$data['attendee']->specialty" name="Veterinary Specialty" />
                            <x-frontend.div-grid :data="$data['attendee']->employer_type" name="Employer Type" />
                            <x-frontend.div-grid :data="$data['attendee']->practice_role" name="Practice Role" />
                            <x-frontend.div-grid :data="$data['attendee']->vets_in_practice" name="Veterinarians In Practice" />
                            <x-frontend.div-grid :data="$data['attendee']->techs_in_practice" name="Technicians In Practice" />
                            <x-frontend.div-grid :data="$data['attendee']->practice_revenue" name="Gross Annual Practice Revenue" />
                            <x-frontend.div-grid :data="$data['attendee']->practices_in_group" name="Practices In Group" />
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
                            <x-frontend.div-grid :data="$data['attendee']->website" name="Website" />
                        </div>
                        @if($data['attendee']->sm_facebook != '' || $data['attendee']->sm_instagram != '' || $data['attendee']->sm_twitter != '' || $data['attendee']->sm_linkedin != '' || $data['attendee']->sm_pinterest != '' || $data['attendee']->sm_youtube != '' || $data['attendee']->sm_vimeo != '')
                            <div class="w-full pb-10">
                                <h3 class="text-3xl font-semibold leading-normal mb-2 text-blueGray-700 mb-4">
                                    Social Media
                                </h3>
                                <p>
                                    @if($data['attendee']->sm_facebook != '')<a href="{{ $data['attendee']->sm_facebook }}"><i class="text-4xl fab fa-facebook"></i></a>@endif
                                    @if($data['attendee']->sm_instagram != '')<a href="{{ $data['attendee']->sm_instagram }}"><i class="text-4xl ml-4 fab fa-instagram-square"></i></a>@endif
                                    @if($data['attendee']->sm_twitter != '')<a href="{{ $data['attendee']->sm_twitter }}"><i class="text-4xl ml-4 fab fa-twitter"></i></a>@endif
                                    @if($data['attendee']->sm_linkedin != '')<a href="{{ $data['attendee']->sm_linkedin }}"><i class="text-4xl ml-4 fab fa-linkedin-in"></i></a>@endif
                                    @if($data['attendee']->sm_pinterest != '')<a href="{{ $data['attendee']->sm_pinterest }}"><i class="text-4xl ml-4 fab fa-pinterest"></i></a>@endif
                                    @if($data['attendee']->sm_youtube != '')<a href="{{ $data['attendee']->sm_youtube }}"><i class="text-4xl ml-4 fab fa-youtube"></i></a>@endif
                                    @if($data['attendee']->sm_vimeo != '')<a href="{{ $data['attendee']->sm_vimeo }}"><i class="text-4xl ml-4 fab fa-vimeo-v"></i></a>@endif
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
