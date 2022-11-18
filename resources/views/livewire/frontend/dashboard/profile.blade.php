<div>
    @push('after-styles')
        <link rel="stylesheet" href="/assets/styles/my-address.css" />
    @endpush
    <div class="user-title text-xl md:text-2xl pb-4 border-b border-dashed border-gray-200 font-semibold">My Account</div>
    @include('includes.partials.messages')
    <div class="mt-5 bg-gray-50 border border-solid border-gray-200 w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:flex justify-between items-center lg:justify-start text-sm sm:text-base">
        <button class="user-profile db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 sm:tracking-wide font-semibold z-10 border-b md:border-b-0 border-r border-solid border-gray-200"><span class="in-active @if(!@request('section')){{ 'active' }}@endif"></span>Profile</button>
        {{-- <button class="user-information db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 border-b md:border-b-0 sm:border-r border-solid border-gray-200">
            <span class="in-active"></span>
            <span class="hidden sm:block">Information</span>
            <span class="block sm:hidden">Info</span>
        </button> --}}
        <button class="user-pw db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-b md:border-b-0 border-r sm:border-r-0 md:border-r border-solid border-gray-200">
            <span class="in-active @if(@request('section') == 'password'){{ 'active' }}@endif"></span> Change Password
        </button>
        <button class="two-factor-btn db-tab underline-links w-full lg:w-max relative overflow-hidden cursor-pointer sm:px-6 p-2 sm:py-3 font-semibold sm:tracking-wide z-10 sm:border-r md:border-r-0 lg:border-r border-solid border-gray-200">
            <span class="in-active"></span>
                <span class="hidden lg:block">Two Factor Authentication (2FA)</span>
                <span class="block lg:hidden">Authentication</span>
        </button>
    </div>

    <div class="mt-5 w-full">
        <div class="profile-container w-full @if(@request('section')){{ 'hidden' }}@endif">
            <div class="profile-left-col flex flex-col border border-solid border-gray-200 w-full">
                <div class="w-full flex flex-col sm:flex-row justify-center items-center text-center sm:text-left border-b border-solid border-gray-200 p-2 sm:p-3 text-sm sm:text-base">
                    <div class="sm:w-3/12 font-semibold">@lang('Avatar'):</div>
                    <div class="user-img-wrapper sm:w-9/12 flex justify-center sm:justify-start mt-2 sm:mt-0">
                        <img class="user-img border p-2 border-solid border-gray-200 rounded-full" src="{{ asset($logged_in_user->avatar_location != null ? 'storage/'.$logged_in_user->avatar_location : '/assets/imgs/avatar.jpg' ) }}" alt="{{ $logged_in_user->name }}" />
                    </div>
                </div>

                <div class="w-full flex flex-col sm:flex-row justify-center items-center text-center sm:text-left border-b border-solid border-gray-200 p-2 sm:p-3 text-sm sm:text-base bg-gray-50">
                    <div class="sm:w-3/12 font-semibold">@lang('Name'):</div>
                    <div class="user-name sm:w-9/12 text-gray-500">{{ $logged_in_user->name }}</div>
                </div>

                <div class="w-full flex flex-col sm:flex-row justify-center items-center text-center sm:text-left border-b border-solid border-gray-200 p-2 sm:p-3 text-sm sm:text-base">
                    <div class="sm:w-3/12 font-semibold">@lang('E-mail Address'):</div>
                    <div class="user-email sm:w-9/12 text-gray-500">{{ $logged_in_user->email }}</div>
                </div>

                <div class="w-full flex flex-col sm:flex-row justify-center items-center text-center sm:text-left border-b border-solid border-gray-200 p-2 sm:p-3 text-sm sm:text-base bg-gray-50">
                    <div class="sm:w-3/12 font-semibold">@lang('Timezone'):</div>
                    <div class="user-time sm:w-9/12 text-gray-500">{{ $logged_in_user->timezone ? Str::replace('_', ' ', $logged_in_user->timezone) : __('N/A') }}</div>
                </div>

                <div class="w-full flex flex-col sm:flex-row justify-center items-center text-center sm:text-left border-b border-solid border-gray-200 p-2 sm:p-3 text-sm sm:text-base">
                    <div class="sm:w-3/12 font-semibold">@lang('Account Created'):</div>
                    <div class="user-acc-created sm:w-9/12 text-gray-500">@displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})</div>
                </div>

                <div class="w-full flex flex-col sm:flex-row justify-center items-center text-center sm:text-left p-2 sm:p-3 text-sm sm:text-base bg-gray-50">
                    <div class="sm:w-3/12 font-semibold">@lang('Last Updated'):</div>
                    <div class="user-acc-lst-updated sm:w-9/12 text-gray-500">@displayDate($logged_in_user->updated_at) ({{ $logged_in_user->updated_at->diffForHumans() }})</div>
                </div>
            </div>
            <button type="button" class="edit-profile btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">Edit Profile</button>
        </div>

        <form action="{{ route('frontend.user.profile.update') }}" method="post" class="update-info-container flex flex-col text-gray-500 hidden border border-solid border-gray-200 w-full p-2 sm:p-4 text-sm sm:text-base" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <label for="avatar_location">Upload Profile Picture</label>
            <input type="hidden" name="avatar_type" value="storage" />
            <input id="avatar_location" name="avatar_location" type="file" value="{{ old('avatar_location') ?? $logged_in_user->avatar_location }}" placeholder="No File Choosen..." class="p-3 border border-solid border-gray-200 mt-4" />

            <label for="name" class="mt-4"> @lang('Name') </label>
            <input id="name" type="text" name="name" value="{{ old('name') ?? $logged_in_user->name }}" class="w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" placeholder="{{ __('Name') }}" required autofocus autocomplete="name" />

            {{-- @if ($logged_in_user->canChangeEmail())
                <label for="email" class="mt-4"> @lang('E-mail Address') </label> --}}
                {{-- <div class="email-notify bg-green-100 mt-2 p-2 sm:px-2 w-full lg:w-max text-xs sm:text-sm">@lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')</div> --}}
                
                {{-- <input id="email" type="email" name="email" value="{{ old('email') ?? $logged_in_user->email }}" placeholder="{{ __('E-mail Address') }}" class="w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" autocomplete="email" required />
            @endif --}}
            <div class="buttons flex">
                <button type="submit" class="btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">Update</button>
                <button type="button" class="close-profile-btn ml-3 btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">Cancel</button>
            </div>
        </form>

        <form action="{{ route('frontend.auth.password.change') }}" method="POST" class="change-pw-container flex flex-col text-gray-500 p-2 sm:p-4 text-sm sm:text-base border border-solid border-gray-200 w-full @if(!@request('section') || @request('section') != 'password'){{ 'hidden' }}@endif">
            @csrf
            @method('patch')
            @if ($logged_in_user->password != null && $logged_in_user->password != '')
                <label for="current_password">@lang('Current Password')</label>
                <input id="current_password" name="current_password" type="password" placeholder="{{ __('Current Password') }}" class="p-3 border border-solid border-gray-200 mt-4" maxlength="100" required autofocus />
            @endif

            <label for="password" class="mt-4">@lang('New Password')</label>
            <input id="password" name="password" type="password" placeholder="{{ __('New Password') }}" class="p-3 border border-solid border-gray-200 mt-4" maxlength="100" required />

            <label for="password_confirmation" class="mt-4">@lang('New Password Confirmation')</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="{{ __('New Password Confirmation') }}" class="p-3 border border-solid border-gray-200 mt-4" maxlength="100" required />

            <button type="submit" class="btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">@lang('Update Password')</button>
        </form>

        <div class="tow-factor-container flex flex-col text-gray-500 hidden border border-solid border-gray-200 w-full p-2 sm:p-4">
            @if ($logged_in_user->hasTwoFactorEnabled())
                <div class="font-semibold primary-black-color">@lang('Two Factor Authentication is Enabled')</div>
                <a href="{{ route('frontend.auth.account.2fa.disable') }}" class="btn black-btn primary-black-bg text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">@lang('Remove Two Factor Authentication')</a>

                <a href="{{ route('frontend.auth.account.2fa.show') }}" class="btn black-btn primary-black-bg text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">@lang('View/Regenerate Recovery Codes')</a>
            @else
                <div class="font-semibold primary-black-color">@lang('Two Factor Authentication is Disabled')</div>
                <a href="{{ route('frontend.auth.account.2fa.create') }}" class="btn black-btn primary-black-bg text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">@lang('Enable Two Factor Authentication')</a>
            @endif
        </div>
    </div>
    @push('after-scripts')
        <script defer src="/assets/js/profile.js"></script>
    @endpush
</div>
