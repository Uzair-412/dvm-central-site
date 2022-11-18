<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter flyer name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Flyer Image:') !!}
    {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Flyer Image ...']) !!}
    @if($data['p_heading'] == 'Update Flyer' && $data['flyer']->image != '')
        <p class="help-block"><a href="/up_data/flyers/images/{{ $data['flyer']->image }}" target="_blank">Click here to see uploaded banner</a></p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('pdf_file', 'Flyer PDF:') !!}
    {!! Form::file('pdf_file', ['class'=>'form-control',  'placeholder'=>'Flyer PDF ...']) !!}
    @if($data['p_heading'] == 'Update Flyer' && $data['flyer']->pdf_file != '')
        <p class="help-block"><a href="/up_data/flyers/pdfs/{{ $data['flyer']->pdf_file }}" target="_blank">Click here to see uploaded PFD</a></p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('position', 'Display Position:') !!}
    {!! Form::text('position', null,['class'=>'form-control', 'placeholder'=>'Display Position ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>