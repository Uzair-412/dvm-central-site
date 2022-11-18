<div>
    @if (auth()->user())
        @php
            $name = explode(' ', auth()->user()->name);
        @endphp
        @if (auth()->user()->type == 'admin')
            <div class="sign-up-btn-eight text-center float-right clearfix">
                    <a href="admin/dashboard">{{ auth()->user()->name }} </a>
            </div>
        @else
            <li class="sign-up-btn-eight relative user-dropdown-menu-link list-unstyled">
                <a href="/dashboard"
                    class="nav-login-icon-wrapper relative inline-flex items-center py-0.25 px-1 mt-1 transition duration-300 ease-in-out hover:bg-gray-200">

                    <div class="text-center text-xs text-gray-500 ml-1 mt-0.5 hidden sm:inline-block">
                        @if(auth()->user()->first_name == null) {{ $name[0] }} @else {{ auth()->user()->first_name }}  @endif</div>
                </a>

                <ul class="d-flex flex-column mt-2 p-3 user-dropdown-menu">
                    <li class="mt-1 relative overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                            fill="none" stroke="currentColor">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        <a href="/dashboard" class="text-gray-500 block px-4 py-1 text-sm" role="menuitem"
                            tabindex="-1" id="menu-item-0">Dashboard</a>
                    </li>
                    <li class="relative overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                            stroke="currentColor" fill="none">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                        <a href="/dashboard/orders" class="text-gray-500 block px-4 py-1 text-sm"
                            role="menuitem" tabindex="-1" id="menu-item-1">Orders</a>
                    </li>
                    <li class="relative overflow-hidden">
                        <form action="/logout" method="POST"
                            class="align-items-center d-flex">
                                        @csrf
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                                                <button type="submit"
                                class="text-gray-500 block px-3 py-1 text-sm border-0 font-weight-bold">
                                <span>Logout</span>
                                    </button>
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    @else
        <div class="sign-up-btn-eight text-center float-right clearfix">
            <a href="/login">Sign In</a>
        </div>
    @endif
</div>