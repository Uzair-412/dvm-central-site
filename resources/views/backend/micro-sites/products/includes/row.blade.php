<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->sku }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <label class="switch switch-label switch-outline-success-alt">
        <input type="checkbox" name="default" class="switch-input" @if($row->featured == 'Y') checked value="N" @else value="Y" @endif onclick="update_site_product(this.value, {{ $row->ms_id }}, 'featured');" />
        <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </label>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <input type="number" class="form-control" value="{{ $row->pos }}" onblur="update_site_product(this.value, {{ $row->ms_id }}, 'pos');">
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.micro-sites.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>