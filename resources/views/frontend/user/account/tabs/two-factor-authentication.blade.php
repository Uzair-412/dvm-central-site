@if ($logged_in_user->hasTwoFactorEnabled())
    <h4>@lang('Two Factor Authentication is Enabled')</h4>
    <a href="{{ route('frontend.auth.account.2fa.disable') }}" class="btn btn-danger btn-lg">@lang('Remove Two Factor Authentication')</a>
    <a href="{{ route('frontend.auth.account.2fa.show') }}" class="btn btn-primary btn-lg">@lang('View/Regenerate Recovery Codes')</a>
@else
    <h4>@lang('Two Factor Authentication is Disabled')</h4>
    <a href="{{ route('frontend.auth.account.2fa.create') }}" class="btn btn-lg success-btn">@lang('Enable Two Factor Authentication')</a>
@endif