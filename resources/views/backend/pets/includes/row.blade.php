<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->first_name }} {{ $row->last_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->email }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->pet_name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->pet_age }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 1) <span class="badge badge-success">Approved</span> @elseif($row->status == 0) <span
        class="badge badge-primary">Pending</span> @elseif($row->status == 2) <span
        class="badge badge-danger">Disapproved</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <a href="{{ route('admin.pets.view', $row->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
    <a href="{{ route('admin.pets.edit', $row->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil-alt"></i></a>
</x-livewire-tables::bs4.table.cell>