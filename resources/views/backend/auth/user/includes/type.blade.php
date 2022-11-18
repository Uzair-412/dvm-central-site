@if ($user->type == 'admin')
    @lang('Administrator')
@elseif ($user->type == 'customer')
    @lang('Customer')
@elseif($user->type == 'staff')
    @lang('Staff')
@elseif($user->type == 'vendor')
    @lang('Vendor')
@endif