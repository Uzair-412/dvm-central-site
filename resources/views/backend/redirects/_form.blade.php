@csrf

<div class="form-group">
    {!! Form::label('request_url', 'Request URL:') !!}
    {!! Form::text('request_url', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Request URL ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('target_url', 'Target URL:') !!}
    {!! Form::text('target_url', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Target URL ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', \App\Models\Redirect::$type, @$data['type'], ['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('type_id', 'Type Id:') !!}
    {!! Form::text('type_id', null,['class'=>'form-control', 'placeholder'=>'Enter Enter Type Id: ...']) !!}
</div>

<div class="form-group">
    {!! Form::label('mode', 'Mode:') !!}
    {!! Form::select('mode', \App\Models\Redirect::$mode, @$data['mode'], ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::text('reference', null,['class'=>'form-control', 'placeholder'=>'Enter Enter Reference: ...']) !!}
</div>





