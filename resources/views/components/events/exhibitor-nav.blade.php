 <!-- left side column-->
 <div class="left-side xl:w-1/4 md:w-1/3 w-full pb-6 md:pb-0 md:pr-6">
    <div class="rounded">
        <ul class="bg-white shadow">
            <li class="primary-bg border-b border-gray-200 cursor-pointer text-white text-sm leading-3 tracking-normal py-4 px-5 font-normal">
                <a href="#" class="flex items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    Home
                </a>
            </li>
            <li class="border-b border-gray-200 text-gray-600 text-sm leading-3 tracking-normal py-4 px-5 font-normal has-mega-menu">
                <h3 class="flex justify-between menu-opener font-semibold">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Company Profile
                    </span>
                    {{-- <span class="menu-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 cursor-pointer" viewBox="0 0 20 20" fill="#ccc">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span> --}}
                </h3>
                <div class="mega-menu-container">
                    <div class="mega-menu-col flex flex-col">
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-overview');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#overview" @endif class="ml-10 mt-4">Overview</a>
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-social');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#social" @endif class="ml-10 mt-4">Social Links</a>
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-contact');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#contact" @endif class="ml-10 mt-4">Contact Information</a>
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-products');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#products" @endif class="ml-10 mt-4">Products</a>
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-jobs');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#jobs" @endif class="ml-10 mt-4">Job Listings</a>
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-giveaways');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#giveaways" @endif class="ml-10 mt-4">Giveaways</a>
                        <a @if (isset($data['edit_mode'])) href="javascript:;" onclick="scrollToEl('div-docs-links');" @else href="{{ session()->get('ses_exhibitor')['link'] }}#docs-links" @endif class="ml-10 mt-4">Documents & Links</a>
                    </div>
                </div>
            </li>
            <li class="border-b border-gray-200 cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-4 px-5 font-normal">
                <a href="{{ route('frontend.events.exhibitors.messages', [$event->slug, $data['exhibitor_data']->id, \Str::slug($data['exhibitor_data']->display_name)]) }}" class="flex items-center">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    Messages
                </a>
            </li>
            {{-- <li class="border-b border-gray-200 cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-4 px-5 font-normal">
                <a href="#" class="flex items-center">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    Meetings
                </a>
            </li>
            <li class="border-b border-gray-200 cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-4 px-5 font-normal">
                <a href="#" class="flex items-center">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    Team's Contacts
                </a>
            </li>
            <li class="border-b border-gray-200 cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-4 px-5 font-normal">
                <a href="#" class="flex items-center">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                        </svg>
                    </span>
                    Leads Board
                </a>
            </li> --}}
            {{-- <li class="border-b border-gray-200 cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-4 px-5 font-normal">
                <a href="#" class="flex items-center">
                    <span class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    Your Team
                </a>
            </li> --}}
        </ul>
    </div>
    <!-- right side column this will be used between 768px and 1280px, otherwise hidden-->
    <div class="hidden md:block xl:hidden w-full mt-5">
        <img class="w-full rounded" src="https://images.unsplash.com/photo-1632341607255-f9f648ac7d25?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
    </div>
</div>
<!-- left column ends here-->
