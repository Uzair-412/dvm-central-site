<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter banner name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('area_id', 'Banner Area:') !!}
    {!! Form::select('area_id', ['' => 'Please Select ...'] + \App\Models\Banner::$areas, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('user_id', 'Vendor / User:') !!}
    {!! Form::select('user_id', $data['vendors'], null, ['class'=>'form-control', 'placeholder' => 'Please Select ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Banner Image:') !!}
    {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Banner Image ...']) !!}
    @if($data['p_heading'] == 'Update Banner' && $data['banner']->image != '')
        <p class="help-block"><a href="{{ Storage::disk('ds3')->url('banners/'.$data['banner']->image) }}" target="_blank">Click here to see uploaded banner</a></p>
    @endif
</div>
{{-- <div class="form-group">
    {!! Form::label('image_amp', 'Banner Image (AMP):') !!}
    {!! Form::file('image_amp', ['class'=>'form-control',  'placeholder'=>'Banner Image AMP ...']) !!}
    @if($data['p_heading'] == 'Update Banner' && $data['banner']->image_amp != '')
        <p class="help-block"><a href="/up_data/banners/{{ $data['banner']->image_amp }}" target="_blank">Click here to see uploaded banner</a></p>
    @endif
</div> --}}
<div class="form-group">
    {!! Form::label('link', 'Link URL:') !!}
    {!! Form::text('link', null,['class'=>'form-control', 'placeholder'=>'Enter link URL ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('banner_text', 'Banner Text:') !!}
    {!! Form::textarea('banner_text', null,['class'=>'form-control ckeditor', 'placeholder'=>'Content ...', 'rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('Start Date', 'Start Date:') !!}
    {!! Form::date('date_start', null,['class'=>'form-control', 'placeholder'=>'Start date ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('date_start', 'End Date:') !!}
    {!! Form::date('date_end', null,['class'=>'form-control', 'placeholder'=>'End date ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>