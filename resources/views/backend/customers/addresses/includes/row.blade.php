<x-livewire-tables::bs4.table.cell>
    {{ $row->first_name . ' ' . $row->last_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(trim($row->company) != null) {{ $row->company }} @else N/A @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->address1.' '.$row->address2.', '.$row->city.', '. \App\Models\State::get_state_name($row->state) .', '.$row->zip.', '. \App\Models\Country::get_country_name($row->country) }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(trim($row->phone) != null) {{ $row->phone }} @else N/A @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(trim($row->vat) != null) {{ $row->vat }} @else N/A @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->default_billing == 'Y') <span class="badge badge-success">Yes</span> @else <span class="badge badge-warning">No</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->default_shipping == 'Y') <span class="badge badge-success">Yes</span> @else <span class="badge badge-warning">No</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.customers.addresses.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>