@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/product">Manage Products</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $data['breadcrumbs'] }}
    </li>
</ol>
@endsection
    <x-backend.card>
        <x-slot name="header">
            @lang('Manage Variations')

        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            @if (sizeof($data['variations']) > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th width="5%" class="text-center">ID</th>
                                <th width="10%">Image</th>
                                <th width="30%">Name</th>
                                <th width="20%">SKU</th>
                                <th width="10%">Price</th>
                                <th width="10%">Position</th>
                                <th width="15%">Action</th>
                            </tr>
                            @foreach ($data['variations'] as $variation)
                                @php
                                    $image = $variation->image;
                                    $path = 'products/images/thumbnails/' . $image;
                                @endphp
                                <tr id="tr_{{ $variation->id }}">
                                    <td class="text-center">
                                        {{ $variation->id }}
                                        <hr />
                                        <a href="javascript:;"
                                            onclick="show_qr_code({{ $variation->id }}, {{ $data['product']->id }});"><i
                                                class="fas fa-qrcode"></i></a>
                                    </td>
                                    <td><img src="{{ Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket' }}"
                                            class="img-thumbnail" /></td>
                                    <td>{{ $variation->name }}</td>
                                    <td>{{ $variation->sku }}</td>
                                    <td>$ {{ $variation->price_catalog }}</td>
                                    <td><input type="number" class="form-control" value="{{ $variation->position }}"
                                            onblur="set_position(this.value, {{ $variation->id }});"></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="modify_product_variation({{ $variation->id }});"><i
                                                class="fa fa-pencil-alt "></i></button>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="delete_product_variation({{ $variation->id }}, {{ $data['product']->id }});"><i
                                                class="fa fa-trash "></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <strong>Sorry</strong>, no product variations found.
            @endif
            <hr />
            <div id="btn_add_variation">
                <button type="button" class="btn btn-sm btn-success" onclick="show_sku_modal();">Add Variation</button>
            </div>
            <div id="div_add_variation">
                {!! Form::open(['route' => ['admin.product.upload.variations', $data['product']->id], 'method' => 'POST', 'id' => 'frm_variation', 'files' => true]) !!}
                <h3><span id="sp_add_new_variation">Add New Variation</span></h3>
                <div class="accordion" id="accordion">
                    <div class="card">
                        <div class="card-header" id="hd_basic_info">
                            <h5 class="mb-0 p-0">
                                Basic Information
                            </h5>
                        </div>
                        <div>
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('name', 'Name:') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter variation name ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('caption', 'Size / Color Caption:') !!}
                                    {!! Form::text('caption', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter size / color caption ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('sku', 'SKU:') !!}
                                    {!! Form::text('sku', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter SKU ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('wholesale_price', 'Wholesale Price:') !!} &nbsp;<small class="text-danger">Note: (Just for the records not visible to users).</small>
                                    {!! Form::text('wholesale_price', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter wholesale price ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('price_catalog', 'Price:') !!}
                                    {!! Form::text('price_catalog', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter price ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('image', 'Picture:') !!}
                                    {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Select picture ...', 'accept' => 'image/*']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="hd_content">
                            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse"
                                data-target="#cl_content" aria-expanded="false" aria-controls="cl_content"
                                id="btn_content_tab">
                                <h5 class="mb-0">
                                    Content
                                </h5>
                            </button>
                        </div>
                        <div id="cl_content" class="collapse" aria-labelledby="hd_content" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('short_description', 'Short Description:') !!}
                                    {!! Form::textarea('short_description', null, ['class' => 'form-control', 'placeholder' => 'Short description ...', 'rows' => '3']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('full_description', 'Full Description:') !!}
                                    {!! Form::textarea('full_description', null, ['class' => 'form-control fd', 'placeholder' => 'Full description ...', 'rows' => '3']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('pdf_link', 'Link PDF File:') !!}
                                    {!! Form::url('pdf_link', null, ['class' => 'form-control', 'placeholder' => 'Copy/paste PDF link ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('video_link', 'Link Video:') !!}
                                    {!! Form::url('video_link', null, ['class' => 'form-control', 'placeholder' => 'Copy/paste Video link ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('video_id', 'Attach Existing Video:') !!}
                                    {!! Form::select('video_id', $data['videos'], null, ['id' => 'video_id', 'class' => 'form-control', 'placeholder' => 'Please Select Video to Attach ...']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="hd_info">
                            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse"
                                data-target="#cl_info" aria-expanded="false" aria-controls="cl_info">
                                <h5 class="mb-0">
                                    Additional Information
                                </h5>
                            </button>
                        </div>
                        <div id="cl_info" aria-labelledby="hd_info" data-parent="#accordion">
                            <div class="card-body">
                                @foreach (\App\Models\Product::$additional_info as $key => $value)
                                    <div class="form-group ">
                                        {!! Form::label('additional_info_' . $key, $value . ':') !!}
                                        {!! Form::select('additional_info', $data['additional_info'][$key], $data['additional_information'][$key], ['name' => 'additional_info[' . $key . ']', 'id' => 'additional_info_' . $key, 'class' => 'form-control select_info width:auto']) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="hd_pricing">
                            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse"
                                data-target="#cl_pricing" aria-expanded="false" aria-controls="cl_pricing">
                                <h5 class="mb-0">
                                    Special Price
                                </h5>
                            </button>
                        </div>
                        <div id="cl_pricing" class="collapse" aria-labelledby="hd_pricing" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('price_discounted', 'Special Price:') !!}
                                    {!! Form::text('price_discounted', null, ['class' => 'form-control', 'placeholder' => 'Enter special price ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('price_discounted_start', 'Special Price Start Date:') !!}
                                    {!! Form::date('price_discounted_start', null, ['class' => 'form-control', 'placeholder' => 'Enter special price start date ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('price_discounted_end', 'Special Price End Date:') !!}
                                    {!! Form::date('price_discounted_end', null, ['class' => 'form-control', 'placeholder' => 'Enter special price end date ...']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="hd_shipping_tax">
                            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse"
                                data-target="#cl_shipping_tax" aria-expanded="false" aria-controls="cl_shipping_tax">
                                <h5 class="mb-0">
                                    Stock, Shipping and Tax
                                </h5>
                            </button>
                        </div>
                        <div id="cl_shipping_tax" class="collapse" aria-labelledby="hd_shipping_tax"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('', 'In Stock:') !!}
                                    <br>
                                    <label class="radio-inline">{!! Form::radio('in_stock', 'Y', old('in_stock', true), ['id' => 'in_stock_y']) !!} Yes</label>
                                    <label class="radio-inline">{!! Form::radio('in_stock', 'N', false, ['id' => 'in_stock_n']) !!} No</label>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('', 'Check Quantity:') !!}
                                    <br>
                                    <label class="radio-inline">{!! Form::radio('check_quantity', 'Y', false, ['id' => 'check_quantity_y']) !!} Yes</label>
                                    <label class="radio-inline">{!! Form::radio('check_quantity', 'N', old('check_quantity', true), ['id' => 'check_quantity_n']) !!} No</label>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('quantity', 'Available Quantity:') !!}
                                    {!! Form::number('quantity', null, ['class' => 'form-control','required', 'placeholder' => 'Enter available quantity ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('', 'Shipping Type:') !!}
                                    <br>
                                    <label class="radio-inline">{!! Form::radio('ship_type', 'intl', old('ship_type', true), ['id' => 'ship_type_intl']) !!} International</label>
                                    <label class="radio-inline">{!! Form::radio('ship_type', 'us', false, ['id' => 'ship_type_us']) !!} US/Canada</label>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('weight', 'Weight:') !!}
                                    {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Item weight ...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('', 'Taxable Item:') !!}
                                    <br>
                                    <label class="radio-inline">{!! Form::radio('taxable', 'Y', false, ['id' => 'taxable_y']) !!} Yes</label>
                                    <label class="radio-inline">{!! Form::radio('taxable', 'N', old('taxable', true), ['id' => 'taxable_n']) !!} No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="hd_extra_items">
                            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse"
                                data-target="#cl_extra_items" aria-expanded="false" aria-controls="cl_extra_items">
                                <h5 class="mb-0">
                                    Related, Up-Sells and Cross-Sells
                                </h5>
                            </button>
                        </div>
                        <div id="cl_extra_items" class="" aria-labelledby="hd_extra_items"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('related_products', 'Related Products') !!}
                                    {!! Form::select('related_products', $data['products'], null, ['multiple' => 'multiple', 'name' => 'related_products[]', 'class' => 'form-control select2', 'id' => 'related_products']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('upsell_products', 'Upsell Products') !!}
                                    {!! Form::select('upsell_products', $data['products'], null, ['multiple' => 'multiple', 'name' => 'upsell_products[]', 'class' => 'form-control select2', 'id' => 'upsell_products']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cross_sell_products', 'Cross Sell Products') !!}
                                    {!! Form::select('cross_sell_products', $data['products'], null, ['multiple' => 'multiple', 'name' => 'cross_sell_products[]', 'class' => 'form-control select2', 'id' => 'cross_sell_products']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden('step', '4') !!}
                    {!! Form::hidden('cmd', 'add', ['id' => 'cmd']) !!}
                    {!! Form::hidden('variation_id', '', ['id' => 'variation_id']) !!}
                    <button type="submit" class="btn btn-sm btn-primary float-right mx-2">Submit</button>
                    <button type="button" onclick="show_hide_add_variation('hide');"
                        class="btn btn-sm btn-danger float-right mx-2">Cancel</button>
                </div>
                {!! Form::close() !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <div>
                <br>
                <a href="{{ route('admin.product.edit', $data['product']->id) }}"
                    class="btn btn-sm btn-danger float-right mx-2">Basic Info</a>
                <a href="{{ route('admin.product.edit.details', $data['product']->id) }}"
                    class="btn btn-sm btn-danger float-right mx-2">Update Details</a>
                <a href="{{ route('admin.product.edit.files', $data['product']->id) }}"
                    class="btn btn-sm btn-danger float-right mx-2">Manage Images / Files</a>
                @if ($data['product']->is_set == 'Y')
                    <a href="{{ route('admin.product.edit.set-items', $data['product']->id) }}"
                        class="btn btn-sm btn-danger float-right mx-2">Set Items</a>
                @endif
            </div>
        </x-slot>
    </x-backend.card>
    <!-- Product Variation SKU Modal -->
    {!! Form::open(['method' => 'POST', 'id' => 'frm_sku_check']) !!}
    <div class="modal fade" id="product_variation_sku" tabindex="-1" role="dialog"
        aria-labelledby="product_variation_sku_title" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter SKU to Add Variation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::text('sku', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter SKU ...', 'id' => 'sku_cv']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="check_sku_variation();">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::hidden('product_id', $data['product']->id) !!}
    {{ Form::close() }}
    <!-- Product Variation SKU Modal -->
@stop
@push('after-scripts')
     
  <script type="text/javascript">
        $(document).ready(function() {
            $('.select_info').select2({
                    placeholder: "Select Value",
                    width: '100%',
                    allowClear: true ,// This is for clear get the clear button if wanted
                    tags: true , // This is for Editing new value
                    theme: "classic",
            });
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });
    </script>
@endpush
