<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ \App\Models\Customer::getCustomerName($row->customer_id) }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <a href="{{ route('admin.orders.show', $row->id) }}">{{ $row->title }}</a>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->invoice_number }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    ${{ number_format($row->amount, 2) }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->due_date }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {!! ($row->status) ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-warning">Pending</span>' !!}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.invoices.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>