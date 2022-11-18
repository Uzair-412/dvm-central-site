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
    {!! Form::model($data['product'], ['method' => 'PATCH', 'route' => ['admin.product.update.details', $data['product']->id]]) !!}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $data['p_heading'] }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordion">
                            <div class="card">
                                <div class="card-header" id="hd_content">
                                    <h5 class="mb-0 p-0">
                                        Content
                                    </h5>
                                </div>
                                <div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            {!! Form::label('short_description', 'Short Description:') !!}
                                            {!! Form::textarea('short_description', null,['class'=>'form-control', 'placeholder'=>'Short description ...', 'rows'=>'3']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('full_description', 'Full Description:') !!}
                                            {!! Form::textarea('full_description', null,['class'=>'form-control ckeditor', 'placeholder'=>'Full description ...', 'rows'=>'3']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('pdf_link', 'Link PDF File:') !!}
                                            {!! Form::url('pdf_link', null,['class'=>'form-control', 'placeholder'=>'Copy/paste PDF link ...']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('video_link', 'Link Video:') !!}
                                            {!! Form::url('video_link', null,['class'=>'form-control', 'placeholder'=>'Copy/paste Video link ...']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('video_id', 'Attach Existing Video:') !!}
                                            {!! Form::select('video_id', $data['videos'], null, ['class'=>'form-control', 'placeholder' => 'Please Select Video to Attach ...']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($data['product']->type == 'simple')
                                <div class="card">
                                    <div class="card-header" id="hd_info">
                                        <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#cl_info" aria-expanded="false" aria-controls="cl_info">
                                            <h5 class="mb-0">
                                                Additional Information
                                            </h5>
                                        </button>
                                    </div>
                                    <div id="cl_info" aria-labelledby="hd_info" data-parent="#accordion">
                                        <div class="card-body">
                                            @foreach(\App\Models\Product::$additional_info as $key => $value)
                                                <div class="form-group">
                                                    {!! Form::label('additional_info_'.$key, $value.':') !!}
                                                    {!! Form::select('additional_info', $data['additional_info'][$key], $data['additional_information'][$key], ['name'=>'additional_info['. $key .']', 'id' => 'additional_info_'.$key,'class'=>'form-control select_info']) !!}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="hd_pricing">
                                        <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#cl_pricing" aria-expanded="false" aria-controls="cl_pricing">
                                            <h5 class="mb-0">
                                                Pricing
                                            </h5>
                                        </button>
                                    </div>
                                    <div id="cl_pricing" class="collapse" aria-labelledby="hd_pricing" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                {!! Form::label('wholesale_price', 'Wholesale Price:') !!} &nbsp;<small class="text-danger">Note: (Just for the records not visible to users).</small>
                                                {!! Form::text('wholesale_price', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter wholesale price ...']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('price_catalog', 'Price:') !!}
                                                {!! Form::text('price_catalog', null,['class'=>'form-control', 'placeholder'=>'Enter price ...']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('price_discounted', 'Special Price:') !!}
                                                {!! Form::text('price_discounted', null,['class'=>'form-control', 'placeholder'=>'Enter special price ...']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('price_discounted_start', 'Special Price Start Date:') !!}
                                                {!! Form::date('price_discounted_start', null,['class'=>'form-control', 'placeholder'=>'Enter special price start date ...']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('price_discounted_end', 'Special Price End Date:') !!}
                                                {!! Form::date('price_discounted_end', null,['class'=>'form-control', 'placeholder'=>'Enter special price end date ...']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header" id="hd_seo">
                                    <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#cl_seo" aria-expanded="false" aria-controls="cl_seo">
                                        <h5 class="mb-0">
                                            SEO
                                        </h5>
                                    </button>
                                </div>
                                <div id="cl_seo" class="collapse" aria-labelledby="hd_seo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-group">
                                            {!! Form::label('meta_title', 'Meta Title:') !!}
                                            {!! Form::text('meta_title', null,['class'=>'form-control', 'placeholder'=>'Meta Title ...']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
                                            {!! Form::textarea('meta_keywords', null,['class'=>'form-control', 'placeholder'=>'Meta Keywords ...', 'rows'=>'3']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('meta_description', 'Meta Description:') !!}
                                            {!! Form::textarea('meta_description', null,['class'=>'form-control', 'placeholder'=>'Meta Description ...', 'rows'=>'3']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($data['product']->type == 'simple')
                                <div class="card">
                                    <div class="card-header" id="hd_shipping_tax">
                                        <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#cl_shipping_tax" aria-expanded="false" aria-controls="cl_shipping_tax">
                                            <h5 class="mb-0">
                                                Stock, Shipping and Tax
                                            </h5>
                                        </button>
                                    </div>
                                    <div id="cl_shipping_tax" class="collapse" aria-labelledby="hd_shipping_tax" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                {!! Form::label('', 'In Stock:') !!}
                                                <br>
                                                <label class="radio-inline">{!! Form::radio('in_stock', 'Y') !!} Yes</label>
                                                <label class="radio-inline">{!! Form::radio('in_stock', 'N') !!} No</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('', 'Check Quantity:') !!}
                                                <br>
                                                <label class="radio-inline">{!! Form::radio('check_quantity', 'Y') !!} Yes</label>
                                                <label class="radio-inline">{!! Form::radio('check_quantity', 'N') !!} No</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('quantity', 'Available Quantity:') !!}
                                                {!! Form::number('quantity', null,['class'=>'form-control', 'placeholder'=>'Enter available quantity ...']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('', 'Shipping Type:') !!}
                                                <br>
                                                <label class="radio-inline">{!! Form::radio('ship_type', 'intl') !!} International</label>
                                                <label class="radio-inline">{!! Form::radio('ship_type', 'us') !!} US/Canada</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('weight', 'Weight:') !!}
                                                {!! Form::text('weight', null,['class'=>'form-control', 'placeholder'=>'Item weight ...']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('', 'Taxable Item:') !!}
                                                <br>
                                                <label class="radio-inline">{!! Form::radio('taxable', 'Y') !!} Yes</label>
                                                <label class="radio-inline">{!! Form::radio('taxable', 'N') !!} No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="hd_extra_items">
                                        <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#cl_extra_items" aria-expanded="false" aria-controls="cl_extra_items">
                                            <h5 class="mb-0">
                                                Related, Up-Sells and Cross-Sells
                                            </h5>
                                        </button>
                                    </div>
                                    <div id="cl_extra_items" class="" aria-labelledby="hd_extra_items" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                {!! Form::label('related_products', 'Related Products') !!}
                                                {!! Form::select('related_products', $data['products'], null, ['multiple'=>'multiple','name'=>'related_products[]','class'=>'form-control select2']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('upsell_products', 'Upsell Products') !!}
                                                {!! Form::select('upsell_products', $data['products'], null, ['multiple'=>'multiple','name'=>'upsell_products[]','class'=>'form-control select2']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('cross_sell_products', 'Cross Sell Products') !!}
                                                {!! Form::select('cross_sell_products', $data['products'], null, ['multiple'=>'multiple','name'=>'cross_sell_products[]','class'=>'form-control select2']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header" id="hd_display">
                                    <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#cl_display" aria-expanded="false" aria-controls="cl_display">
                                        <h5 class="mb-0">
                                            Display
                                        </h5>
                                    </button>
                                </div>
                                <div id="cl_display" class="" aria-labelledby="hd_display" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-group">
                                            {!! Form::label('tags', 'Search Tags:') !!}
                                            {!! Form::select('tags', $data['tags'], null, ['multiple'=>'multiple','name'=>'tags[]','class'=>'form-control select_tags']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('competitor_skus', 'Competitor SKUs:') !!}
                                            {!! Form::select('competitor_skus', $data['competitor_skus'], null, ['multiple'=>'multiple','name'=>'competitor_skus[]','class'=>'form-control select_tags']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('visibility', 'Visibility:') !!}
                                            {!! Form::select('visibility', \App\Models\Product::$visibility, null, ['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Featured Product:') !!}
                                            <br>
                                            <label class="radio-inline">{!! Form::radio('featured', 'Y') !!} Yes</label>
                                            <label class="radio-inline">{!! Form::radio('featured', 'N') !!} No</label>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Hot Product:') !!}
                                            <br>
                                            <label class="radio-inline">{!! Form::radio('hot', 'Y') !!} Yes</label>
                                            <label class="radio-inline">{!! Form::radio('hot', 'N') !!} No</label>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'New Product:') !!}
                                            <br>
                                            <label class="radio-inline">{!! Form::radio('new', 'Y') !!} Yes</label>
                                            <label class="radio-inline">{!! Form::radio('new', 'N') !!} No</label>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Deals Of The Day:') !!}
                                            <br>
                                            <label class="radio-inline">{!! Form::radio('deals_of_the_day', 'Y') !!} Yes</label>
                                            <label class="radio-inline">{!! Form::radio('deals_of_the_day', 'N') !!} No</label>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('position', 'Position:') !!}
                                            {!! Form::number('position', null,['class'=>'form-control', 'placeholder'=>'Display position ...']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('banner_id', 'Banner:') !!}
                                            {!! Form::select('banner_id', $data['banners'], null, ['class' => 'form-control', 'placeholder' => 'Please Select ...']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('', 'Status:') !!}
                                            <br>
                                            <label class="radio-inline">{!! Form::radio('status', 'Y') !!} Active</label>
                                            <label class="radio-inline">{!! Form::radio('status', 'N') !!} Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('step', '2') !!}
                            {!! Form::hidden('type', $data['product']->type) !!}
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            <a href="{{ route('admin.product.edit', $data['product']->id) }}" class="btn btn-danger mb-2">Basic Info</a>
                            <a href="{{ route('admin.product.edit.files', $data['product']->id) }}" class="btn btn-danger mb-2">Manage Images / Files</a>
                            @if($data['product']->type == 'variation')
                                <a href="{{ route('admin.product.edit.variations', $data['product']->id) }}" class="btn btn-danger mb-2">Manage Variations</a>
                            @endif
                            @if($data['product']->is_set == 'Y')
                                <a href="{{ route('admin.product.edit.set-items', $data['product']->id) }}" class="btn btn-danger mb-2">Set Items</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
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