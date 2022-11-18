<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null,['class'=>'form-control ckeditor', 'required', 'placeholder'=>'Enter Description', 'rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('no_of_products', 'Numbet Of Products:') !!}
    {!! Form::text('no_of_products', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Numbet Of Products ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('no_of_monthly_deals', 'Number Of Monthly Deals:') !!}
    {!! Form::text('no_of_monthly_deals', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Number Of Monthly Deals ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Discount Coupons Module:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('discount_coupons_module', 'Y', (@$data['discount_coupons_module'] == 'Y') ? true : false, ['required']) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('discount_coupons_module', 'N', (@$data['discount_coupons_module'] == 'N') ? true : false, ['required']) !!} No</label>
</div>