<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <a href="{{ route('admin.category-blocks.show', $row->id) }}">{{ $row->blockCategories->count() }}</a>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell width="600">
    {{ $row->position }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 'Y') <span class="badge badge-success">Active</span> @else <span class="badge badge-warning">In-active</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <x-utils.edit-button :href="route('admin.category-blocks.edit', $row)" />
    <x-utils.delete-button :href="route('admin.category-blocks.destroy', $row)" />
</x-livewire-tables::bs4.table.cell>