<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <x-utils.edit-button :href="route('admin.manage-jobs.category.edit', $row)" />
    <x-utils.delete-button :href="route('admin.manage-jobs.category.destroy', $row)" />
</x-livewire-tables::bs4.table.cell>