<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->body }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->platform }}
    @if($row->platform == 'One-Device')
        <p class="text-value">{{ $row->device }}</p>
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->delivery_type }}
    @if($row->delivery_type == 'Scheduled')
        <p class="text-value">{{ date('m-d-Y h:i a',$row->date) }}</p>
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->flag == '1') <span class="badge badge-success">Sent</span> @else <span````
        class="badge badge-warning">Not-Sent</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell> 
    <x-utils.delete-button :href="route('admin.notifications.destroy', $row->id)" />
</x-livewire-tables::bs4.table.cell>