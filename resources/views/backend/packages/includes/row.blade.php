<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell width="700">
    {!! Str::limit($row->description, 100) !!}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->no_of_products == '0') <span class="badge badge-success">Unlimited</span> @else {{ $row->no_of_products }} @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->no_of_monthly_deals }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->discount_coupons_module == 'Y') <span class="badge badge-success">Yes</span> @else <span class="badge badge-warning">No</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.packages.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>