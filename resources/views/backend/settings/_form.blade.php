@if($data['setting']->id == 1)
<div class="form-group">
    {!! Form::label('key_value', $data['setting']->name) !!}
    {!! Form::text('key_value', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter '. $data['setting']->name .' ...']) !!}
</div>
@endif
@if($data['setting']->id == 2)
    <div class="form-group">
        {!! Form::label('key_value', $data['setting']->name) !!}
        <br>
        <label class="radio-inline">{!! Form::radio('key_value', 'auto', ($data['setting']->key_value == 'auto') ? true : false, ['required']) !!} Auto</label>
        <label class="radio-inline">{!! Form::radio('key_value', 'manual', ($data['setting']->key_value == 'manual') ? true : false, ['required']) !!} Manual</label>
    </div>
@endif
@if($data['setting']->id == 3)
    <div class="form-group">
        {!! Form::label('key_value', $data['setting']->name) !!}
        <br>
        {!! Form::select('start_time', ['' => '...'] + $data['hours'], $data['start_time'], ['class'=>'form-control', 'style' => 'width: 100px; display: inline;']) !!}
        &nbsp;
        to
        &nbsp;
        {!! Form::select('end_time', ['' => '...'] + $data['hours'], $data['end_time'], ['class'=>'form-control', 'style' => 'width: 100px; display: inline;']) !!}
    </div>
@endif
@if($data['setting']->id == 4)
    <div class="form-group">
        {!! Form::label('key_value', $data['setting']->name) !!}
        <br>
        <label class="radio-inline">{!! Form::radio('key_value', 'Y', ($data['setting']->key_value == 'Y') ? true : false, ['required']) !!} Active</label>
        <label class="radio-inline">{!! Form::radio('key_value', 'N', ($data['setting']->key_value == 'N') ? true : false, ['required']) !!} In-active</label>
    </div>
@endif
@if($data['setting']->id == 5)
    <div class="form-group">
        {!! Form::label('key_value', $data['setting']->name) !!}
        <br>
        <label class="radio-inline">{!! Form::radio('key_value', 'Y', ($data['setting']->key_value == 'Y') ? true : false, ['required']) !!} Yes, Show Zoom Button on Website</label>
        <label class="radio-inline">{!! Form::radio('key_value', 'N', ($data['setting']->key_value == 'N') ? true : false, ['required']) !!} No, Hide Zoom Button on Website</label>
    </div>
@endif