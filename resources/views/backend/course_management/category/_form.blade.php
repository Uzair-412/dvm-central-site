<div class="form-group">
    {!! Form::label('name', 'Category Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter category name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter slug ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('short_description', 'Description:') !!}
    {!! Form::textarea('short_description', null,['class'=>'form-control', 'placeholder'=>'Enter description ...']) !!}
</div>