<div class="form-group">
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', ['' => 'Please Select ...'] + $data['customers'], Request::input('customer_id'), ['class'=>'form-control', 'onchange' => 'get_customer_orders(this.value);']) !!}
</div>
<div class="form-group">
    {!! Form::label('ref_type', 'Invoice Type:') !!}
    {!! Form::select('ref_type', ['' => 'Please Select ...'] + \App\Models\Invoice::$ref_types, Request::input('ref_type'), ['class'=>'form-control', 'onchange' => 'set_invoice_type(this.value);']) !!}
</div>
<div class="form-group {{ $data['display_ref_id'] }}" id="div_ref_id">
    {!! Form::label('ref_id', 'Order Number:') !!}
    <div id="div_ref_id_select">
        {!! Form::select('ref_id', ['' => 'Please Select ...'] + $data['ref_ids'], Request::input('ref_id'), ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null,['class'=>'form-control', 'placeholder'=>'Enter title ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('invoice_number', 'Invoice Number:') !!}
    {!! Form::text('invoice_number', null,['class'=>'form-control', 'placeholder'=>'Enter invoice number ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null,['class'=>'form-control', 'placeholder'=>'Enter amount ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('due_date', 'Due Date:') !!}
    {!! Form::input('date','due_date', null,['class'=>'form-control', 'placeholder'=>'Select due date ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('late_fee_type', 'Charge Late Fee:') !!}
    {!! Form::select('late_fee_type', ['' => 'Please Select ...'] + \App\Models\Invoice::$late_fee_types, Request::input('late_fee_type'), ['class'=>'form-control', 'onchange' => 'set_late_fee(this.value);']) !!}
</div>
<div class="form-group {{ $data['display_late_fee'] }}" id="div_late_fee">
    {!! Form::label('late_fee', 'Late Fee:') !!}
    {!! Form::text('late_fee', Request::input('late_fee'),['class'=>'form-control', 'placeholder'=>'Enter late fee ...']) !!}
</div>
<div class="form-group" id="div_late_fee">
    {!! Form::label('notified', 'Notify Customer:') !!}<br>
    <label>{!! Form::checkbox('notified', 'Y', Request::input('notified')) !!} Yes, notify customer by sending email</label>
</div>