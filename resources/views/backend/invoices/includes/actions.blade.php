@if(!$row->status)
    <x-utils.edit-button :href="route('admin.invoices.edit', $model)" />
    <x-utils.delete-button :href="route('admin.invoices.destroy', $model)" />
@endif
