<div class="form-group">
    {!! Form::label('association_id', 'Association:') !!}
    {!! Form::select('association_id', $data['associations'], null,['class'=>'form-control', 'required', 'placeholder'=>'Select Association ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter trade show title ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('link', 'Link URL:') !!}
    {!! Form::text('link', null,['class'=>'form-control', 'placeholder'=>'Enter trade show link URL ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('booth', 'Booth Number:') !!}
    {!! Form::text('booth', null,['class'=>'form-control', 'placeholder'=>'Enter booth number ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter location ...']) !!}
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::date('start_date', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter start date ...']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('end_date', 'End Date:') !!}
            {!! Form::date('end_date', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter end date ...']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('details_link', 'Details Link URL:') !!}
    {!! Form::text('details_link', null,['class'=>'form-control', 'placeholder'=>'Enter trade show link to detail page ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('details', 'Content:') !!}
    {!! Form::textarea('details', null,['class'=>'form-control ckeditor', 'placeholder'=>'Content ...', 'rows'=>'3']) !!}
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('image_thumbnail', 'Thumbnail Image:') !!}
            {!! Form::file('image_thumbnail', ['class'=>'form-control',  'placeholder'=>'Thumbnail Image ...']) !!}
            @if($data['p_heading'] == 'Update Post' && $data['post']->image_thumbnail != '')
                <p class="help-block"><a href="/up_data/blog/{{ $data['post']->image_thumbnail }}" target="_blank">Click here to see uploaded picture</a></p>
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('image', 'Image (For Detail Page):') !!}
            {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Post Image ...']) !!}
            @if($data['p_heading'] == 'Update Post' && $data['post']->image != '')
                <p class="help-block"><a href="/up_data/blog/{{ $data['post']->image }}" target="_blank">Click here to see uploaded picture</a></p>
            @endif
        </div>
    </div>
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