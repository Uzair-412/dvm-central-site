<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ \App\Models\Coupon::$types[$row->type] }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->coupon }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 'Y') <span class="badge badge-success">Active</span> @else <span class="badge badge-warning">In-active</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.coupons.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>