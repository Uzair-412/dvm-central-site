<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->first_name . ' ' . $row->last_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->email }}
</x-livewire-tables::bs4.table.cell>
@if(isset($row->customer_level))
<x-livewire-tables::bs4.table.cell>
    {{ $row->customer_level->name }}
</x-livewire-tables::bs4.table.cell>
@endif
<x-livewire-tables::bs4.table.cell>
    @if($row->confirmed == '1') <span class="badge badge-success">Confirmed</span> @else <span class="badge badge-danger">Not Confirmed</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->type }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->active == '1') <span class="badge badge-success">@lang('Active')</span> @else <span class="badge badge-danger">@lang('In-active')</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.customers.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @php
        $documents_count = $row->documents();
    @endphp
    <div class="position-relative"> 
        <a href="user-documents/{{$row->id }}"><i class="fas fa-file font-2xl ml-3 relative"></i></a>
        <span class="position-absolute badge rounded-pill badge-danger my-n2 text-value-sm">{{ $documents_count}}</span>
    </div>
</x-livewire-tables::bs4.table.cell>