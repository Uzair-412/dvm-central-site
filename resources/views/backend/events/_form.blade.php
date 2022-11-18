<div class="accordion" id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <h5 class="mb-0">
                    Basic Information
                </h5>
            </button>
        </div>
        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('type', 'Type:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('type', 'virtual', (@$data['type'] == 'virtual') ? true : false, ['required', 'class' => 'event_type']) !!} Virtual</label>
                    <label class="radio-inline">{!! Form::radio('type', 'live', (@$data['type'] == 'live') ? true : false, ['required', 'class' => 'event_type']) !!} Live</label>
                    <label class="radio-inline">{!! Form::radio('type', 'hybrid', (@$data['type'] == 'hybrid') ? true : false, ['required', 'class' => 'event_type']) !!} Hybrid</label>
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter event name ...', 'onblur' => 'ajax_request();']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('speakers', 'Speakers:') !!} <span class="text-danger">*</span>
                    {!! Form::select('speakers', $data['speakers'], $data['event']->speakers->pluck('speaker_id')->toArray(), ['name'=>'speakers[]', 'id'=>'speakers', 'multiple'=>'multiple', 'class'=>'form-control select2', 'required', 'placeholder'=>'Select speakers ...']) !!}
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('start_date', 'Start Date:') !!} <span class="text-danger">*</span>
                            <div class="input-group">
                                {!! Form::date('start_date', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter start date ...']) !!}
                                {!! Form::select('start_hh', $data['hours'], @$data['start_time'][0], ['class'=>'form-control', 'required']) !!}
                                {!! Form::select('start_mm', $data['minutes'], @$data['start_time'][1], ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('end_date', 'End Date:') !!} <span class="text-danger">*</span>
                            <div class="input-group">
                                {!! Form::date('end_date', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter end date ...']) !!}
                                {!! Form::select('end_hh', $data['hours'], @$data['end_time'][0], ['class'=>'form-control', 'required']) !!}
                                {!! Form::select('end_mm', $data['minutes'], @$data['end_time'][1], ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('attendee_registration_fee', 'Attendee Registration Fee:') !!}
                            {!! Form::number('attendee_registration_fee', null,['class'=>'form-control', 'placeholder'=>'Attendee Registration Fee...', 'step'=>'0.01']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('exhibitor_registration_fee', 'Exhibitor Registration Fee:') !!}
                            {!! Form::number('exhibitor_registration_fee', null,['class'=>'form-control', 'placeholder'=>'Exhibitor Registration Fee ...', 'step'=>'0.01']) !!}
                        </div>
                    </div>
                </div>
                <div id="div_location" class="form-group venue_location d-none">
                    <div class="form-group">
                        {!! Form::label('address', 'Address:') !!}
                        {!! Form::text('address', null,['class'=>'form-control', 'placeholder'=>'Address ...']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city', 'City:') !!}
                        {!! Form::text('city', null,['class'=>'form-control', 'placeholder'=>'City ...']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('state', 'State:') !!}
                        {!! Form::select('state', $data['states'], null, ['class' => 'form-control', 'placeholder' => 'Select state ...']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('short_description', 'Short Description:') !!}
                    {!! Form::textarea('short_description', null,['class'=>'form-control', 'placeholder'=>'Short Description ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_description', 'Content:') !!}
                    {!! Form::textarea('full_description', null,['class'=>'form-control ckeditor', 'placeholder'=>'Full Description ...', 'rows'=>'3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    Image and Video
                </h5>
            </button>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('image', 'Image:') !!}
                            {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Background Image ...']) !!}
                            @if($data['p_heading'] == 'Update Event' && $data['event']->image != '')
                                <p class="help-block"><a href="/up_data/events/{{ $data['event']->image_thumbnail }}" target="_blank">Click here to see uploaded picture</a></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('thumbnail', 'Thumbnail:') !!}
                            {!! Form::file('thumbnail', ['class'=>'form-control',  'placeholder'=>'thumbnail ...']) !!}
                            @if($data['p_heading'] == 'Update Event' && $data['event']->thumbnail != '')
                                <p class="help-block"><a href="/up_data/events/{{ $data['event']->thumbnail }}" target="_blank">Click here to see uploaded thumbnail</a></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('video', 'Video:') !!}
                            {!! Form::file('video', ['class'=>'form-control',  'placeholder'=>'Video ...']) !!}
                            @if($data['p_heading'] == 'Update Event' && $data['event']->video != '')
                                <p class="help-block"><a href="/up_data/events/{{ $data['event']->video }}" target="_blank">Click here to see uploaded video</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h5 class="mb-0">
                    Search Engine Optimization
                </h5>
            </button>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!} <span class="text-danger">*</span>
                    {!! Form::text('slug', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter slug ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_title', 'Meta Title:') !!}
                    {!! Form::text('meta_title', null,['class'=>'form-control', 'placeholder'=>'Meta Title ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
                    {!! Form::textarea('meta_keywords', null,['class'=>'form-control', 'placeholder'=>'Meta Keywords ...', 'rows'=>'3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description', 'Meta Description:') !!}
                    {!! Form::textarea('meta_description', null,['class'=>'form-control', 'placeholder'=>'Meta Description ...', 'rows'=>'3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <h5 class="mb-0">
                    Display Settings
                </h5>
            </button>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('', 'Show in Vendor Section:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('show_in_vendor', 'Y', (@$data['show_in_vendor'] == 'Y') ? true : false, ['required']) !!} Yes</label>
                    <label class="radio-inline">{!! Form::radio('show_in_vendor', 'N', (@$data['show_in_vendor'] == 'N') ? true : false, ['required']) !!} No</label>
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Status:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
                    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'virtual_events') !!}
<script>
    let event_type = document.querySelectorAll('.event_type');
    event_type.forEach(element => {
        element.addEventListener('change', function(e){
            if(e.target.value == 'virtual'){
                document.querySelector('.venue_location').classList.add("d-none");
                
            }else if(e.target.value == 'hybrid' || e.target.value == 'live'){
                document.querySelector('.venue_location').classList.remove("d-none");
            }
        });
    });
</script>