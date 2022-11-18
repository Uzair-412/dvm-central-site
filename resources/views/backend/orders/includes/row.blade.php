<x-livewire-tables::bs4.table.cell>
    {{ $row->id }} 
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->first_name }} {{ $row->last_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->first_name }} {{ $row->last_name }}<br>
    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    ${{ number_format($row->grand_total, 2) }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->city . ' / ' . $row->zip_code }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ \App\Models\Order::$statuses[$row->order_status] }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.orders.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>