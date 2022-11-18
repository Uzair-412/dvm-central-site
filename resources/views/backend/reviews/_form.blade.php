<div class="form-group">
    {!! Form::label('product', 'Product:') !!}
    @isset($data['review']->product->name)<br>
    <p>{{ $data['review']->product->name }}</p> @endisset
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter email ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null,['class'=>'form-control', 'placeholder'=>'Enter mobile ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('comments', 'Comments:') !!}
    {!! Form::textarea('comments', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter comments ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('rating', 'Rating:') !!}
    {!! Form::select('rating', [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'], null, ['class'=>'form-control', 'placeholder'=>'Select rating ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y') !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N') !!} In-active</label>
</div>
