
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter video title ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('', 'Source:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('source', 'Youtube', (@$data['source'] == 'Youtube') ? true : false, ['required']) !!} Youtube</label>
    <label class="radio-inline">{!! Form::radio('source', 'Vimeo', (@$data['source'] == 'Vimeo') ? true : false, ['required']) !!} Vimeo</label>
</div>

<div class="form-group">
    {!! Form::label('video_id', 'Video ID:') !!}
    {!! Form::text('video_id', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter video id ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter video position ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>

