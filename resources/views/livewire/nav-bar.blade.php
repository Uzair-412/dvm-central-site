<div>
    @php $base_link = '/events/' . $event->slug; @endphp
    <!-- navigation start-->
    <header class="w-full px-5 sm:px-10 fixed z-10">
        <div class="container h-20 flex justify-between items-center lg:items-stretch mx-auto">
            <div class="flex items-center">
                <div class="flex items-center">
                    <img id="logo" src="/static/img/vet-and-tech-logo.png" alt="DVM Central" />
                </div>
            </div>
            <!-- desktop navigation -->
            <nav class="h-full hidden lg:flex items-center justify-end text-white">
                <div class="h-full flex">
                    <div class="w-24 h-full flex items-center justify-center hover:text-gray-300">
                        <a href="/events/{{ $event->slug }}">Home</a>
                    </div>
                    <div x-data="{}" class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <a @if(session()->has('ses_exhibitor') && session()->get('ses_exhibitor')['vendor_event']->event_id == $event->id) href="{{ session()->get('ses_exhibitor')['link'] }}" @else href="javascript:;" @click="$dispatch('open-login', 'y')" @endif>
                            My Event
                        </a>
                    </div>
                    <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/exhibitors">Exhibitors</a>
                        </div>
                    </div>
                    <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/speakers">Speakers</a>
                        </div>
                    </div>
                    <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/webinars">Webinars</a>
                        </div>
                    </div>
                    <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/attendees">Attendees</a>
                        </div>
                    </div>
                    <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/job-listings">Job Listing</a>
                        </div>
                    </div>
                    {{-- <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/donate">Donate</a>
                        </div>
                    </div>
                    <div class="w-30 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                        <div class="relative">
                            <a href="{{ $base_link }}/support-faqs">Support / FAQs</a>
                        </div>
                    </div> --}}
                    @if(session()->has('ses_attendee'))
                        <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                            <div class="relative">
                                @if(session()->has('ses_attendee'))
                                <a href="/events/{{ $event->slug }}/attendees/{{ trim(session()->get('ses_attendee')['attendee_user']['id']) }}/edit">Profile</a>
                                @endif
                            </div>
                        </div>
                        <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                            <div class="relative">
                                <a href="javascript:;" wire:click="logout('@if(session()->has('ses_exhibitor')) exhibitor @elseif(session()->has('ses_attendee')) attendee @endif')">Logout</a>
                            </div>
                        </div>
                    @else
                        <div class="w-24 h-full flex items-center justify-center hover:text-gray-300 cursor-pointer">
                            <div x-data="{}" class="relative">
                                <a href="javascript:;" @click="$dispatch('open-login', 'y')">Login</a>
                            </div>
                        </div>
                    @endif
                </div>
            </nav>
            <!-- mobile navigation -->
            <nav class="xl:hidden cursor-pointer hover:text-gray-700 focus:outline-none">
                <ul class="top-0 z-40 p-2 absolute rounded left-0 right-0 mt-16 md:mt-20 hidden conainer mx-auto w-10/12 bg-black transition ease">
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="/events/{{ $event->slug }}">Home</a></span>
                        </div>
                    </li>
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a @if(session()->has('ses_exhibitor') && session()->get('ses_exhibitor')['vendor_event']->event_id == $event->id) href="{{ session()->get('ses_exhibitor')['link'] }}" @else href="javascript:;" @click="$dispatch('open-login', 'y')" @endif>My Event</a></span>
                        </div>
                    </li>
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="{{ $base_link }}/exhibitors">Exhibitors</a></span>
                        </div>
                    </li>
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="{{ $base_link }}/speakers">Speakers</a></span>
                        </div>
                    </li>
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="{{ $base_link }}/webinars">Webinars</a></span>
                        </div>
                    </li>
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="{{ $base_link }}/job-listings">Job Listing</a></span>
                        </div>
                    </li>
                    {{-- <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="{{ $base_link }}/donate">Donate</a></span>
                        </div>
                    </li>
                    <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                        <div class="flex items-center">
                            <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="{{ $base_link }}/support-faqs">Support / FAQs</a></span>
                        </div>
                    </li> --}}
                    @if(session()->has('ses_exhibitor') || session()->has('ses_attendee'))
                        <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                            <div class="flex items-center">
                                <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="javascript:;" wire:click="logout('@if(session()->has('ses_exhibitor')) exhibitor @elseif(session()->has('ses_attendee')) attendee @endif')">Logout</a></span>
                            </div>
                        </li>
                    @else
                        <li class="flex lg:hidden cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 text-white hover:text-grey-300 focus:text-indigo-700 focus:outline-none">
                            <div x-data="{}" class="flex items-center">
                                <span class="ml-2 text-white hover:text-grey-300 font-bold"><a href="javascript:;" @click="$dispatch('open-login', 'y')">Login</a></span>
                            </div>
                        </li>
                    @endif
                </ul>
                <div>
                    <div class="show-m-menu lg:hidden" onclick="MenuHandler(this,true)">
                        <svg
                            aria-haspopup="true"
                            aria-label="Main Menu"
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-menu"
                            width="32"
                            height="32"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="#ffffff"
                            fill="none"
                            stroke-linecap="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="4" y1="8" x2="20" y2="8" />
                            <line x1="4" y1="16" x2="20" y2="16" />
                        </svg>
                    </div>
                    <div onclick="MenuHandler(this,false)" class="hidden close-m-menu">
                        <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- navigation ends here-->
</div>
