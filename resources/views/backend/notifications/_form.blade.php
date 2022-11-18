<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter title ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Content:') !!}
    {!! Form::textarea('body', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter content ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Platforms and Reciepts:') !!}
    <div class="d-flex">
        <label class="radio-inline mr-4">{!! Form::radio('platform', 'Broadcast', (@$data['platform'] == 'Broadcast') ? true : false, [ 'id' => 'Broadcast', 'required']) !!} Broadcast</label>
        <div>
            <label class="radio-inline">{!! Form::radio('platform', 'One-Device', (@$data['platform'] == 'One-Device') ? true : false, [ 'id' => 'One-Device', 'required']) !!} One device</label>
            {!! Form::select('device', App\Models\PushNotification::$devices, null, ['class' => 'form-control product-vendor-id-selector d-none', 'id' => 'device', 'placeholder' => 'Please Select ...']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('', 'Delivery Schedule:') !!}
    <br>
    <label class="radio-inline mr-4">{!! Form::radio('delivery_type', 'Immediately', (@$data['delivery_type'] == 'Immediately') ? true : false, ['required']) !!} Immediately</label>
    <label class="radio-inline">{!! Form::radio('delivery_type', 'Scheduled', (@$data['delivery_type'] == 'Scheduled') ? true : false, ['required']) !!} Scheduled</label>
</div>
<div class="form-group d-none" id="scheduled-div">
    <div>
        {!! Form::label('', 'Date:') !!}
        <input type="date" name="date" id="date" class="form-control mr-2" />
    </div>
    <div>
        {!! Form::label('', 'Time:') !!}
        <input type="time" name="time" id="time" class="form-control ml-2" />
    </div>
</div>
@push('after-scripts')
    <script>
        $(document).ready(function(){
            $("input[name=platform]").on('change', function(e){
                let val = e.target.value;
                if(val == 'One-Device')
                {
                    $('#device').val('');
                    $('#device').removeClass('d-none');
                }
                else
                {
                    $('#device').addClass('d-none');
                }
            });

            $("input[name=delivery_type]").on('change', function(e){
                let val = e.target.value;
                if(val == 'Scheduled')
                {
                    $('#scheduled-div #date').val('');
                    $('#scheduled-div #time').val('');
                    $('#scheduled-div').removeClass('d-none');
                    $('#scheduled-div').addClass('d-flex');
                }
                else
                {
                    $('#scheduled-div').addClass('d-none');
                    $('#scheduled-div').removeClass('d-flex');
                }
            });
        });
    </script>
@endpush