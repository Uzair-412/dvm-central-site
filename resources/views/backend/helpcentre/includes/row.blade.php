<style>
span.notify {
    position: relative;
}
i.count {
    position: absolute;
    left: -2rem;
    top: -1rem;
    background: #db1010;
    width: 25px;
    height: 25px;
    border-radius: 100%;
    color: #fff;
    box-shadow: 2px 2px 10px 0px #979797;
}
</style>
<x-livewire-tables::bs4.table.cell class="text-center">
    {!! ($row->NotSeen) ? '<span class="notify"><i class="count">' . $row->NotSeen . '</i></span>' : '' !!}
    {!! ($row->helpc_response_by==0) ? '<span class="notify"><i class="count">1</i></span>' : '' !!}
    {{ ++$index }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell class="px-3 py-2 md:px-6 md:py-3 ">
    {{ $row->helpc_first_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell class="px-3 py-2 md:px-6 md:py-3 ">
    {{ $row->helpc_last_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell class="px-3 py-2 md:px-6 md:py-3 ">
    {{ $row->helpc_email }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell class="px-3 py-2 md:px-6 md:py-3 ">
    {{ $row->helpc_phone_no }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell class="px-3 py-2 md:px-6 md:py-3 ">
    {{ $row->helpc_type }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell class="px-3 py-2 md:px-6 md:py-3 ">
    <a href="{{ route('admin.help.show', $row->helpc_id) }}"><i class="fas fa-eye"></i></a>
</x-livewire-tables::bs4.table.cell>