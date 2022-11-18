@if ($logged_in_user->hasAllAccess())
    <x-utils.view-button :href="route('admin.orders.show', $model)" />
@endif
