<div class="form-group">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter question ...', 'onblur' => 'ajax_request();']) !!}
</div>
<div class="form-group">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter answer ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('in_home', 'Show on Home Page:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('in_home', 'Y', (@$data['in_home'] == 'Y') ? true : false) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('in_home', 'N', (@$data['in_home'] == 'N') ? true : false) !!} No</label>
</div>
<div class="form-group">
    {!! Form::label('position', 'Display Position:') !!}
    {!! Form::text('position', null,['class'=>'form-control', 'placeholder'=>'Enter display position ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false) !!} In-active</label>
</div>
{!! Form::hidden('table', 'faqs') !!}