@php
    $image = $row->image;
    $path = 'products/images/thumbnails/'.$image;
    if($image != ''){
        $path = Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/100x100.png?text=Image+Not+Available+In+The+Bucket';
    }else{
        $path = 'https://via.placeholder.com/100x100.png';
    }
@endphp
<x-livewire-tables::bs4.table.cell>
    {{ $row->id }}
    <hr />
    <a href="javascript:;" onclick="show_qr_code({{ $row->id }});"><i class="fas fa-qrcode"></i></a>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <img src="{{ $path }}" class="img-thumbnail" width="100" />
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @foreach($row->categories as $category)
        &bull; {{ $category->name }} <br>
    @endforeach
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{ $row->sku }}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->type == 'simple')
        {{ \App\Models\Product::$types[$row->type] }}
    @elseif($row->type == 'child')
        {{ \App\Models\Product::$types[$row->type] }}
    @else
        {{ \App\Models\Product::$types[$row->type] }} <br>
        <small><em><a href="{{ route('admin.product.edit.variations', $row->id) }}">{{ \App\Models\Product::getSubItemsCount($row->id) }} Sub Items</a></em></small>
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->type == 'child')
        Not Visible Individually
    @else
        {{ \App\Models\Product::$visibility[$row->visibility] }}
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->type == 'simple' || $row->type == 'child')
        $ {{ number_format($row->price_catalog, 2) }}
    @else
        Multiple <br> <small><em>{{ \App\Models\Product::getSubItemsPriceRange($row->id) }}</em></small>
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if($row->status == 'Y') <span class="badge badge-success">Active</span> @else <span class="badge badge-warning">In-active</span> @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.product.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>