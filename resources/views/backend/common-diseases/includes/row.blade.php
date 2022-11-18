<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{@$row->AnimalPet->name}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->site_url }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.common-diseases.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>