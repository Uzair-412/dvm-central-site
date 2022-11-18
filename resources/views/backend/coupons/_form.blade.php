<div class="form-group">
    {!! Form::label('vendors', 'Vendor Name:') !!}
    {!! Form::select('vendor_id', $data['vendors'], null,['class'=>'form-control', 'placeholder'=>'Please select customer group ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter coupon name ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null,['class'=>'form-control', 'placeholder'=>'Description ...', 'rows'=>'3']) !!}
</div>

<div class="form-group">
    {!! Form::label('coupon', 'Coupon Code:') !!}
    {!! Form::text('coupon', null,['class'=>'form-control', 'placeholder'=>'Enter coupon code ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('uses_per_customer', 'Uses Per Customer:') !!}
    {!! Form::number('uses_per_customer', null,['class'=>'form-control', 'placeholder'=>'Enter uses per customer ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('group_id', 'Customer Group:') !!}
    {!! Form::select('group_id', $data['groups'], null,['class'=>'form-control', 'placeholder'=>'Please select customer group ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('date_from', 'Start Date:') !!}
    {!! Form::date('date_from', null,['class'=>'form-control', 'placeholder'=>'Start date ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('date_to', 'End Date:') !!}
    {!! Form::date('date_to', null,['class'=>'form-control', 'placeholder'=>'End date ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Discount Type:') !!}
    {!! Form::select('type', \App\Models\Coupon::$types, null,['class'=>'form-control', 'required', 'placeholder'=>'Please select discount type ...', 'onchange' => 'set_discount_type(this.value);']) !!}
</div>

<div class="{{ $data['display_bogo'] }}" id="div_bogo">

    <div class="form-group">
        {!! Form::label('buy_skus', 'SKUs of Items:') !!}
        {!! Form::text('buy_skus', null,['class'=>'form-control', 'placeholder'=>'Enter SKUs to buy ...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('items_buy', 'No of Items to Buy:') !!}
        {!! Form::number('items_buy', null,['class'=>'form-control', 'placeholder'=>'Enter number of items to buy ...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('get_skus', 'SKUs to Get:') !!}
        {!! Form::text('get_skus', null,['class'=>'form-control', 'placeholder'=>'Enter SKUs to get ...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('items_get', 'No of Items to Get:') !!}
        {!! Form::number('items_get', null,['class'=>'form-control', 'placeholder'=>'Enter number of items to get ...']) !!}
    </div>

</div>

<div class="form-group {{ $data['display_discount'] }}" id="div_discount">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::number('discount', null,['class'=>'form-control', 'placeholder'=>'Enter discount value ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Coupon Image:') !!}
    {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Coupon Image ...']) !!}
    <p class="help-block">Only JPG or PNG Images, Size not more than 600 x 300 in width and height</p>
    @if($data['p_heading'] == 'Update Coupon' && $data['coupon']->image != '')
        <p class="help-block"><a href="/up_data/coupons/{{ $data['coupon']->image }}" target="_blank">Click here to see
                uploaded coupon image</a></p>
    @endif
</div>

<div class="form-group">
    {!! Form::label('', 'Free Shipping:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('free_shipping', 'Y', (@$data['free_shipping'] == 'Y') ? true : false, ['required']) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('free_shipping', 'N', (@$data['free_shipping'] == 'N') ? true : false, ['required']) !!} No</label>
</div>

<div class="form-group">
    {!! Form::label('', 'Showcase Coupon:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('showcase', 'Y', (@$data['showcase'] == 'Y') ? true : false, ['required']) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('showcase', 'N', (@$data['showcase'] == 'N') ? true : false, ['required']) !!} No</label>
</div>

<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>

