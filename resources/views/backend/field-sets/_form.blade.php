
<div class="form-group">
    <label for="business_type">Business Type:</label>
    <select name="business_type" id="business_type" class="form-control" required>
        <option value="">- Select Business Type -</option>
        @foreach($data['business-type'] as $business)
            <option @if(isset($data['field-sets'])) @if($data['field-sets']->business_type == $business->id) selected @endif @endif value="{{ $business->id }}">{{ $business->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Title']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Description']) !!}
</div>
<div class="form-group">
    {!! Form::label('icon_image', 'Icon Image:') !!}
    {!! Form::file('icon_image', ['class'=>'form-control',  'placeholder'=>'Icon Image ...']) !!}
    @if($data['p_heading'] == 'Update Field Set' && $data['field-sets']->icon_image != '')
        <p class="help-block"><a href="/up_data/field-sets/icon_image/{{ $data['field-sets']->icon_image }}" target="_blank">Click here to see uploaded Icon Image</a></p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('display_position', 'Display Position:') !!}
    {!! Form::text('display_position', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Display Position ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>