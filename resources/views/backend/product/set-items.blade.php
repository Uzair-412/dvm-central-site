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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $data['p_heading'] }}</strong>
                </div>
                <div class="card-body">
                    @if(sizeof($data['items']) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th width="5%" class="text-center">ID</th>
                                        <th width="10%">Image</th>
                                        <th width="30%">Name</th>
                                        <th width="20%">SKU</th>
                                        <th width="10%">Price</th>
                                        <th width="5%">Quantity</th>
                                        <th width="5%">Position</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    @foreach($data['items'] as $variation)
                                        @php
                                            $image = $variation->image;
                                            $path = 'products/images/thumbnails/'.$image;
                                            $path_large = 'products/images/large/'.$image;
                                        @endphp
                                        <tr id="tr_{{ $variation->pivot->id }}">
                                            <td class="text-center">
                                                {{ $variation->id }}
                                            </td>
                                            <td>
                                                @if(Storage::disk('ds3')->exists($path_large)) <a href="{{ Storage::disk('ds3')->exists($path_large) ? Storage::disk('ds3')->url($path_large) : 'https://via.placeholder.com/600x600.png?text=Image+Not+Available+In+The+Bucket' }}" target="_blank"> @endif
                                                    <img src="{{ Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket' }}" class="img-thumbnail" />
                                                @if(Storage::disk('ds3')->exists($path_large)) </a> @endif
                                            </td>
                                            <td>{{ $variation->name }} @ {{ $variation->pivot->qty }}</td>
                                            <td>{{ $variation->sku }}</td>
                                            <td>$ {{ $variation->price_catalog }}</td>
                                            <td><input type="number" class="form-control set-quantity" min="1" value="{{ $variation->pivot->qty }}" onblur="update_product_set(this.value, {{ $variation->pivot->id }}, 'qty');"></td>
                                            <td><input type="number" class="form-control set-quantity" min="1" value="{{ $variation->pivot->pos }}" onblur="update_product_set(this.value, {{ $variation->pivot->id }}, 'pos');"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="delete_product_set({{ $variation->pivot->id }});"><i class="fa fa-trash "></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <strong>Sorry</strong>, no set items found.
                    @endif
                    <hr />
                    <div id="btn_add_variation">
                        <button type="button" class="btn btn-sm btn-success" onclick="show_sku_modal();">Add Set Items</button>
                    </div>
                    <div>
                        <br>
                        <a href="{{ route('admin.product.edit', $data['product']->id) }}" class="btn btn-danger mb-2">Basic Info</a>
                        <a href="{{ route('admin.product.edit.details', $data['product']->id) }}" class="btn btn-danger mb-2">Update Details</a>
                        <a href="{{ route('admin.product.edit.files', $data['product']->id) }}" class="btn btn-danger mb-2">Manage Images / Files</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Variation SKU Modal -->
        {!! Form::open(array('method' => 'POST', 'id' => 'frm_sku_check')) !!}
            <div class="modal fade" id="product_variation_sku" tabindex="-1" role="dialog" aria-labelledby="product_variation_sku_title" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter SKU to Add Set Item for Display</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {!! Form::text('sku', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter SKU or Product ID...', 'id' => 'sku_cv']) !!}
                            </div>
                            <div class="form-group">
                                <label class="radio-inline"><input type="radio" name="search_field" checked value="sku"> SKU</label>
                                <label class="radio-inline"><input type="radio" name="search_field" value="id"> Product ID</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="add_set_item();">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::hidden('product_id', $data['product']->id) !!}
        {{ Form::close() }}
        <!-- Product Variation SKU Modal -->
    </div> 
@stop