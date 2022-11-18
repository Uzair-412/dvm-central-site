@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <div class="row">
        @foreach($data['images'] as $image)
            @php
                if($image->type != 'child' )
                    $link = '/admin/product/'. $image->id .'/edit-files';
                else
                {
                    $parent_id = \App\Models\Product::getParentId($image->id);
                    $link = '/admin/product/'. $parent_id .'/edit-variations';
                }
            @endphp
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"><strong>{{ $image->sku }}</strong></div>
                    <div class="float-right"><a href="{{ $link }}" target="_blank">Edit</a></div>
                </div>
                <div class="card-body">
                    <img src="{{ Storage::disk('ds3')->url('products/images/'.$image->image) }}" />
                </div>
                <div class="card-footer">
                    {{ $image->name }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="pagination pagination-sm no-margin">
                        {!! $data['images']->appends( request()->except('page') )->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop