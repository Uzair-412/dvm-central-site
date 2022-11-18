<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->domain }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <a href="{{ route('admin.micro-sites.products', $row->id) }}">{{ \App\Models\MicroSites::getProductsCount($row->id) }} Products</a>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.micro-sites.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>