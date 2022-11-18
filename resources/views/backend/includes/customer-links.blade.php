{{--\Route::current()->getName() == 'comp'
\Request::is('companies/*')--}}

@if(isset($data['customer']->id))
    <div class="col-md-3">
        <div class="list-group ">
            <a href="{{ route('admin.customers.edit', $data['customer']->id) }}" class="list-group-item list-group-item-action @if(\Route::current()->getName() == 'admin.customers.edit') active @endif">Basic Information</a>
            @if($data['customer']->type == 'vendor')
                <a href="{{ @$data['customer']->vendor ? route('admin.customers.vendor.edit', [$data['customer']->id, $data['customer']->vendor->id]) : route('admin.customers.vendor.create', $data['customer']->id) }}" class="list-group-item list-group-item-action @if(\Route::current()->getName() == 'admin.customers.vendor.edit' || \Route::current()->getName() == 'admin.customers.vendor.create') active @endif">Vendor Information</a>
            @endif
            {{-- <a href="{{ route('admin.customers.addresses.index', $data['customer']->id) }}" class="list-group-item list-group-item-action @if(\Route::current()->getName() == 'admin.customers.addresses.index' || \Route::current()->getName() == 'admin.customers.addresses.create') active @endif">Addresses</a> --}}
            {{-- <a href="#" class="list-group-item list-group-item-action">Order History</a>
            <a href="#" class="list-group-item list-group-item-action">Newsletters</a> --}}
            {{-- <a href="{{ route('admin.customers.products.index', $data['customer']->id) }}" class="list-group-item list-group-item-action">Product Reviews</a> --}}
        </div>
    </div>
@else
    <div class="col-md-3">
        <div class="list-group ">
            <a href="#" class="list-group-item list-group-item-action disabled active">Basic Information</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Addresses</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Order History</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Newsletters</a>
            {{-- <a href="#" class="list-group-item list-group-item-action dissabled">Product Reviews</a> --}}
        </div>
    </div>
@endif