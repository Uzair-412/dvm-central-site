<div class="left-col-wrapper border border border-solid border-gray-200 bg-gray-100 w-full sm:w-6/12 lg:w-3/12 lg:sticky top-20">
    <ul class="dashboard-links">
        <li>
            <a href="/dashboard"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'home' ? 'active-db' : 'db-links' }}" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/orders" class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'orders' || @$view == 'order_detail' ? 'active-db' : 'db-links' }}" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                <span>Orders</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/payment-history"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'payment_history' || @$view == 'payment_history_detail' ? 'active-db' : 'db-links' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                        clip-rule="evenodd" />
                </svg>
                <span>Payment History</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/addresses"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'address' ? 'active-db' : 'db-links' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd" />
                </svg>
                <span>My Address</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/courses"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'my_courses' ? 'active-db' : 'db-links' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                </svg>
                <span>My Courses</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/profile"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'profile' ? 'active-db' : 'db-links' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd" />
                </svg>
                <span>Profile</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/wishlist"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'wishlist' ? 'active-db' : 'db-links' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" />
                </svg>
                <span>Wishlist</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/chat-box"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'chat-box' ? 'active-db' : 'db-links' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                    <path
                        d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                </svg>
                <span>Chat</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/user-level"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'user-level' ? 'active-db' : 'db-links' }}">
                
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="h-6 w-6 mr-1" viewBox="0 0 256 256" xml:space="preserve">

                <defs>
                </defs>
                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                    <path d="M 19.286 60.828 H 0 V 29.172 h 19.286 V 60.828 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 42.857 60.828 H 23.571 V 29.172 h 19.286 V 60.828 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 66.429 60.828 H 47.143 V 29.172 h 19.286 V 60.828 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 90 60.828 H 70.714 V 29.172 H 90 V 60.828 z M 72.714 58.828 H 88 V 31.172 H 72.714 V 58.828 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
                </svg>
                <span>User Level</span>
            </a>
        </li>

        <li>
            <a href="/dashboard/notifications"
                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ @$view == 'notifications' ? 'active-db' : 'db-links' }}">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" class="h-5 w-5 mr-1 relative">
                <g>
                    <g>
                        <g>
                            <path d="M429.224,363.395l-45.434-64.286V173.516c0-64.102-47.444-117.325-109.06-126.415V18.732
                                C274.73,8.387,266.343,0,255.999,0c-10.345,0-18.732,8.387-18.732,18.732V47.1c-61.616,9.09-109.061,62.313-109.061,126.415
                                v125.594l-45.433,64.286c-8.746,12.373,0.111,29.542,15.296,29.542h315.86C429.081,392.938,437.99,375.794,429.224,363.395z"/>
                            <path d="M255.999,406.313c-29.138,0-52.843,23.704-52.843,52.842c0,29.138,23.706,52.845,52.843,52.845
                                c29.138,0,52.842-23.706,52.842-52.843C308.841,430.019,285.136,406.313,255.999,406.313z"/>
                        </g>
                    </g>
                </g>
                </svg>
                @php
                    $user_notification =  \App\Models\PushNotificationByUser::where([['user_id', auth()->user()->id],['seen', 0]])->get();
                @endphp
                @if(count($user_notification) > 0)
                    <div class="absolute bg-white border border-blue-400 font-bold h-3 h-4 mb-6 ml-3 pb-5 rounded-full text-center text-gray-800 w-5">
                        {{count($user_notification)}}    
                    </div>
                @endif

                <span>Notifications</span>
            </a>
        </li>

        <li>
            <form action="{{ route('frontend.auth.logout') }}" method="POST"
                class="flex items-center p-4 db-links">
                @csrf
                <button type="submit" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>