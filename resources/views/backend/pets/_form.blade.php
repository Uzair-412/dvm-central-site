<div class="form-group">
    {!! Form::label('user_name', 'First Name:') !!}
    {!! Form::text('first_name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter First Name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Last Name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('user_email', 'User Email:') !!}
    {!! Form::text('email', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter User Email ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('pet_name', 'Pet Name:') !!}
    {!! Form::text('pet_name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Pet Name ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('pet_age', 'Pet Age:') !!}
    {!! Form::text('pet_age', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Pet Age ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null,['class'=>'form-control', 'placeholder'=>'Enter Phone ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Address ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $data['states'], null, ['class' => 'form-control', 'placeholder' => 'Select state ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter City ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::text('zip', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Zip ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Description ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('month_name', 'Pet of the month:') !!}
    {!! Form::text('pet_created_time', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Month Name ...', 'cols'=>'2']) !!}
</div>
{!! Form::label('pet_image', 'Upload Pet Images:') !!}
@forelse ($data['pet_images'] as $images)
    <div class="form-group d-flex">
        {!! Form::file('pet_image',['placeholder'=>'Pet Image ...' , 'name' => 'images[]']) !!}
        @if(count($data['pet_images']) > 0)
            <p class="help-block"><a href="/up_data/pets-of-the-month/images/{{ $images->pet_image }}" target="_blank">Click here to see uploaded picture</a></p>
        @endif
    </div>
    @empty
    <div class="form-group d-flex">
        {!! Form::file('pet_image',['placeholder'=>'Pet Image ...' , 'name' => 'images[]']) !!}
    </div>
@endforelse
<div class="form-group">
    {!! Form::label('video', 'Video:') !!}<br/>
    {!! Form::file('video', null,['class'=>'form-control']) !!}
    @if($data['pet']->video)
        <p class="help-block"><a href="/up_data/pets-of-the-month/videos/{{ $data['pet']->video }}" target="_blank">Click here to see uploaded video</a></p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <div class="d-flex">
        <label class="radio-inline mr-4">{!! Form::radio('status', '1', (@$data['pet']->status == 1) ? true : false, [ 'required']) !!} Approve</label>
        <label class="radio-inline">{!! Form::radio('status', '2', (@$data['pet']->status == 2) ? true : false, [ 'required']) !!} Disapprove</label>
    </div>
</div>
@push('after-scripts')

@endpush