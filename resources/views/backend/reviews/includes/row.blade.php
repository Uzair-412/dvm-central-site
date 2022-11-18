<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}<br><small><em>{{ $row->email }} @if(trim($row->mobile) != null) <br> {{ $row->mobile }} @endif</em></small>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @isset($row->product->name) {{ $row->product->name }} @endisset
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->comments }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @for($i = 1 ; $i <= $row->rating ; $i++)
        <i class="fa fa-star" aria-hidden="true"></i>
    @endfor
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 'Y') <span class="badge badge-success">Active</span> @else <span class="badge badge-warning">In-active</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.reviews.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>