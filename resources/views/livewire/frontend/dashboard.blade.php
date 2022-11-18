<div>
    @push('after-styles')
        <link rel="stylesheet" href="/assets/styles/dashboard.css" />
    @endpush
    <main id="orders-page" class="relative">
        @php  
            if(auth()->user()->type == 'admin'){
                Auth::logout();
                return redirect('/login');
            }
         @endphp
        <div class="orders-container">
            <div
                class="dashboard-page-container width mt-20 mb-20 flex flex-col items-center lg:items-start lg:flex-row">
                <div
                    class="left-col-wrapper border border border-solid border-gray-200 bg-gray-100 w-full sm:w-6/12 lg:w-3/12 lg:sticky top-20">

                    <ul class="dashboard-links">
                        <li>
                            <a href="/dashboard"
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'home' ? 'active-db' : 'db-links' }}"
                                wire:click="ChangeView('home')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/dashboard/orders"
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'orders' || $view == 'order_detail' ? 'active-db' : 'db-links' }}"
                                wire:click="ChangeView('orders')">
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
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'payment_history' || $view == 'payment_history_detail' ? 'active-db' : 'db-links' }}">
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
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'address' ? 'active-db' : 'db-links' }}">
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
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'my_courses' ? 'active-db' : 'db-links' }}">
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
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'profile' ? 'active-db' : 'db-links' }}">
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
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'wishlist' ? 'active-db' : 'db-links' }}">
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
                                class="cursor-pointer flex items-center p-4 border-b border-solid border-gray-200 {{ $view == 'chat-box' ? 'active-db' : 'db-links' }}">
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
                                <svg version="1.1" id="Layer_1" fill="currentColor" class="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 460.002 460.002" style="enable-background:new 0 0 460.002 460.002;" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M114.501,132.833V73.945c0-8.284-6.716-15-15-15s-15,6.716-15,15v59.017c-21.825,6.559-37.774,26.828-37.774,50.762
                                                c0,23.933,15.949,44.202,37.774,50.761v151.572c0,8.284,6.716,15,15,15s15-6.716,15-15V234.614
                                                c22.056-6.414,38.228-26.793,38.228-50.89C152.73,159.625,136.558,139.247,114.501,132.833z M99.729,206.724
                                                c-12.683,0-23.001-10.318-23.001-23.001c0-12.683,10.318-23.001,23.001-23.001c12.683,0,23.001,10.318,23.001,23.001
                                                C122.73,196.406,112.411,206.724,99.729,206.724z"/>
                                            <path d="M245.002,243.101V73.945c0-8.284-6.716-15-15-15s-15,6.716-15,15v169.156c-21.94,6.487-38.001,26.81-38.001,50.826
                                                s16.061,44.339,38.001,50.826v41.304c0,8.284,6.716,15,15,15s15-6.716,15-15v-41.304c21.94-6.487,38.001-26.811,38.001-50.826
                                                C283.003,269.912,266.942,249.588,245.002,243.101z M230.002,316.927c-12.683,0-23.001-10.318-23.001-23.001
                                                c0-12.683,10.318-23.001,23.001-23.001c12.683,0,23.001,10.318,23.001,23.001C253.003,306.609,242.685,316.927,230.002,316.927z"
                                                />
                                            <path d="M375.502,77.048v-3.103c0-8.284-6.716-15-15-15s-15,6.716-15,15v3.103c-21.94,6.487-38.001,26.811-38.001,50.826
                                                c0,24.016,16.061,44.339,38.001,50.826v207.357c0,8.284,6.716,15,15,15s15-6.716,15-15V178.699
                                                c21.94-6.487,38.001-26.811,38.001-50.826S397.442,83.535,375.502,77.048z M360.502,150.875
                                                c-12.683,0-23.001-10.318-23.001-23.001c0-12.683,10.318-23.001,23.001-23.001c12.683,0,23.001,10.318,23.001,23.001
                                                C383.503,140.556,373.185,150.875,360.502,150.875z"/>
                                            <path d="M427.138,0H32.865C14.743,0,0.001,14.743,0.001,32.865v394.272c0,18.122,14.743,32.865,32.865,32.865h394.271
                                                c18.122,0,32.865-14.743,32.865-32.865V32.865C460.003,14.743,445.26,0,427.138,0z M427.138,430.002H32.865
                                                c-1.58,0-2.865-1.285-2.865-2.865V32.865c0-1.58,1.285-2.865,2.865-2.865h394.271c1.58,0,2.865,1.285,2.865,2.865v394.272h0.001
                                                C430.003,428.717,428.718,430.002,427.138,430.002z"/>
                                        </g>
                                    </g>
                                </g>
                                </svg>
                                <span>User Level</span>
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

                <div
                    class="right-col-wrapper border border-solid border-gray-200 mt-10 lg:mt-0 lg:w-9/12 lg:ml-8 bg-white p-2 sm:p-4 md:p-6 w-full">
                    @if ($view == 'home')
                        @livewire('frontend.dashboard.index')
                    {{-- @elseif($view == 'orders')
                        @livewire('frontend.dashboard.orders') --}}
                    {{-- @elseif($view == 'order_detail')
                        @livewire('frontend.dashboard.order-detail', ['orderId' => $orderId]) --}}
                    {{-- @elseif($view == 'payment_history')
                        @livewire('frontend.dashboard.payment-history') --}}
                    {{-- @elseif($view == 'payment_history_detail')
                        @livewire('frontend.dashboard.payment-history-detail', ['payment' => $payment]) --}}
                    {{-- @elseif($view == 'profile')
                        @livewire('frontend.dashboard.profile') --}}
                    {{-- @elseif($view == 'wishlist')
                        @livewire('frontend.dashboard.wish-list') --}}
                    {{-- @elseif($view == 'address')
                        @livewire('frontend.dashboard.address') --}}
                    {{-- @elseif($view == 'chat-box')
                        @livewire('frontend.dashboard.chat-box') --}}
                    {{-- @elseif($view == 'my_courses')
                        @livewire('frontend.dashboard.my-courses') --}}
                        {{-- @elseif($view == 'user-level')
                        @livewire('frontend.dashboard.user-level') --}}
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>
