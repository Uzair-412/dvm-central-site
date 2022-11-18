<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->address_line_1 }} {{ $row->address_line_2 }}, {{ $row->city }}, {{ $row->state->name }}, {{ $row->zip }}, {{ $row->country->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 'Y') <span class="badge badge-success">Active</span> @else <span
        class="badge badge-warning">In-active</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <x-utils.edit-button :href="route('admin.programs.associations.edit', $row)" />
    <x-utils.delete-button :href="route('admin.programs.associations.destroy', $row)" />
</x-livewire-tables::bs4.table.cell>