<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('position', 'Display Position:') !!}
    {!! Form::text('position', null,['class'=>'form-control', 'placeholder'=>'Display Position ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['category_block']->status == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['category_block']->status == 'N') ? true : false, ['required']) !!} In-active</label>
</div>
@push('after-scripts')
@endpush