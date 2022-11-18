<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null,['class'=>'form-control', 'placeholder'=>'Enter first name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder'=>'Enter last name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null,['class'=>'form-control', 'placeholder'=>'Enter email ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Enter password ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Re-type Password:') !!}
    {!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Enter password ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('group_id', 'Group:') !!}
    {!! Form::select('group_id', $data['groups'], null,['class'=>'form-control', 'placeholder'=>'Select group ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', $data['type'], null,['class'=>'form-control', 'placeholder'=>'Select group ...' , 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('level', 'Level:') !!}
    {!! Form::select('level', $data['level'] , null,['class'=>'form-control', 'placeholder'=>'Select level ...', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('confirmed', 'Confirmed:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('confirmed', '1', (@$data['confirmed'] == '1') ? true : false) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('confirmed', '0', (@$data['confirmed'] == '0') ? true : false) !!} No</label>
</div>
<div class="form-group">
    {!! Form::label('active', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('active', '1', (@$data['active'] == '1') ? true : false) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('active', '0', (@$data['active'] == '0') ? true : false) !!} In-active</label>
</div>
<div class="form-group">
    {!! Form::label('send_welcome_email', 'Send Welcome Email:') !!}
    <br>
    <label class="radio-inline">{!! Form::checkbox('send_welcome_email', 'Y') !!} Yes, send welcome email to customer</label>
</div>
<div class="form-group">
    {!! Form::label('send_confirmation_email', 'Send Confirmation Email:') !!}
    <br>
    <label class="radio-inline">{!! Form::checkbox('send_confirmation_email', 'Y') !!} Yes, send confirmation email to customer</label>
</div>