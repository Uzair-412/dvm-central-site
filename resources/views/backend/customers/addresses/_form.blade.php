<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null,['class'=>'form-control', 'placeholder'=>'Enter first name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder'=>'Enter last name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('company', 'Company:') !!}
    {!! Form::text('company', null,['class'=>'form-control', 'placeholder'=>'Enter company name ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('address1', 'Address Line 1:') !!}
    {!! Form::text('address1', null,['class'=>'form-control', 'placeholder'=>'Enter address line 1...']) !!}
</div>
<div class="form-group">
    {!! Form::label('address2', 'Address Line 2:') !!}
    {!! Form::text('address2', null,['class'=>'form-control', 'placeholder'=>'Enter address line 2 ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::select('country', $data['countries'], null,['class'=>'form-control', 'onchange="get_states(this.value);"', 'placeholder'=>'Select country ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    <div id="div_state">

        @php
            $show_text_field = true;
            if(isset($data['address']))
            {
                if(is_numeric($data['address']->state))
                    $show_text_field = false;
            }
        @endphp

        @if($show_text_field)
            {!! Form::text('state', null,['class'=>'form-control', 'placeholder'=>'Enter state ...']) !!}
        @else
            {!! Form::select('state', $data['states'], null,['class'=>'form-control', 'placeholder'=>'Enter state ...']) !!}
        @endif

    </div>
</div>
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null,['class'=>'form-control', 'placeholder'=>'Enter city ...']) !!}
</div>


<div class="form-group">
    {!! Form::label('zip', 'Zip / Post Code:') !!}
    {!! Form::text('zip', null,['class'=>'form-control', 'placeholder'=>'Enter zip / post code ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null,['class'=>'form-control', 'placeholder'=>'Enter phone ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('vat', 'VAT:') !!}
    {!! Form::text('vat', null,['class'=>'form-control', 'placeholder'=>'Enter VAT ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('default_shipping', 'Default Shipping Address:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('default_shipping', 'Y', (@$data['default_shipping'] == 'Y') ? true : false) !!} Yes</label>
    &nbsp;
    <label class="radio-inline">{!! Form::radio('default_shipping', 'N', (@$data['default_shipping'] == 'N') ? true : false) !!} No</label>
</div>
