<div class="form-group">
    {!! Form::label('name', 'Category Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter category name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>