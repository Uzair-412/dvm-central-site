@push('after-styles')
    <link rel="stylesheet" href="{{ asset('static/css/chosen.css') }}">
@endpush
<div class="card shadow">
    <div class="card-header">
        Store's Basic Info
        <div class="card-header-actions">
            <a href="/admin/webinars" class="card-header-action">Cancel</a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('name', 'Webinar Name:') !!}
            {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Webinar Name', 'id'=>'name']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('event_id', 'Select Events:') !!}
            {!! Form::select('event_id', $data['events'], null, ['class'=>'form-control select2', 'placeholder' => 'Please Select ...', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('speaker_id', 'Select Speakers:') !!}
            {!! Form::select('speaker_id', $data['speakers'], $data['speaker'], ['multiple', 'name'=>'speaker_id[]', 'class'=>'form-control select2', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('short_detail', 'Short Description:') !!}
            {!! Form::textarea('short_detail', null,['class'=>'form-control', 'placeholder'=>'Short description ...', 'rows'=>'3']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('full_detail', 'Full Description:') !!}
            {!! Form::textarea('full_detail', null,['class'=>'form-control ckeditor', 'placeholder'=>'Full description ...', 'rows'=>'3']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('location', 'Location:') !!}
            {!! Form::text('location', null,['class'=>'form-control', 'placeholder'=>'Enter webinar location ...']) !!}
        </div>
        <div class="form-group row">
            <div class="col">
                {!! Form::label('start_date ', 'Start Date:') !!}
                {!! Form::input('dateTime-local','start_date', null,['class'=>'form-control', 'required']) !!}
            </div>
            <div class="col">
                {!! Form::label('end_date', 'End Date:') !!}
                {!! Form::input('dateTime-local','end_date', null,['class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                {!! Form::label('zoom_link', 'Zoom Link:') !!}
                {!! Form::text('zoom_link', null,['class'=>'form-control', 'placeholder'=>'Enter Zoom Link']) !!}
            </div>
            <div class="col">
                {!! Form::label('zoom_meeting_id', 'Zoom Meeting ID:') !!}
                {!! Form::text('zoom_meeting_id', null,['class'=>'form-control', 'placeholder'=>'Enter Zoom Meeting ID']) !!}
            </div>
            <div class="col">
                {!! Form::label('zoom_password', 'Zoom Meeting Password:') !!}
                {!! Form::text('zoom_password', null,['class'=>'form-control', 'placeholder'=>'Enter Zoom Meeting Password']) !!}
            </div>
        </div>
        <div class="form-group row list-inline">
            <div class="col pt-2">
                {!! Form::label('image', 'Webinar Image:') !!}
                {!! Form::file('image', ['class'=>'form-control', 'onchange' => 'loadFile(event)']) !!}
            </div>
            <div class="col">
                <img src="{{URL::current() == route('admin.webinars.create') ? 'https://via.placeholder.com/100x100.png' : ((!file_exists('/up_data/webiners/images/'.$data['webinars']->image)) ? ('/up_data/webiners/images/'.$data['webinars']->image) : ('/up_data/na.webp'))}}" id="imgshow" width="100" />
            </div>
        </div>
        <div class="form-group ">
            {!! Form::label('', 'Video Type:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('video_type', 'youtube',(@$data['webinars']['video_type'] == 'youtube') ? true : false) !!} Youtube</label>
            <label class="radio-inline">{!! Form::radio('video_type', 'vimeo',    (@$data['status']['video_type'] == 'vimeo') ? true : false) !!} Vimeo</label>
        </div>
        <div class="form-group">
            {!! Form::label('video_url', 'Video URL:') !!}
                {!! Form::text('video_url', null,['class'=>'form-control', 'placeholder'=>'Enter Video URL']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Webinar Type:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('webinar_type', 'event',(@$data['webinars']['webinar_type'] == 'event') ? true : false) !!}  Events Section</label>
            <label class="radio-inline">{!! Form::radio('webinar_type', 'website',  (@$data['status']['webinar_type'] == 'website') ? true : false) !!} Main Website</label>
        </div>
        <div class="form-group">
            <label for="Show_in_app" class="">
                @php 
                $checked_show_in_app = 1;
                    if(@$data['webinars'])
                    {
                        $checked_show_in_app = (bool)(int)@$data['webinars']['show_in_app'];
                    }
                @endphp
                {!! Form::checkbox('show_in_app', '1', ['checked'=>$checked_show_in_app] ) !!} Show in Mobile App
            </label>
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', ($data['webinars']['status'] == 'Y') ? true : false, ['required']) !!} Yes</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', ($data['webinars']['status'] == 'N') ? true : false, ['required']) !!} No</label>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
    </div>
</div>
@push('after-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $('document').ready(function () {
                $("#image").change(function () {
                    if (this.files && this.files    ) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#imgshow').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });
        </script>
@endpush
@push('after-scripts')
    <script src="{{ asset('static/js/chosen.js') }}"></script>
    <script>
        $("#speaker_id").chosen({
            max_selected_options: 100,
        });
    </script>
@endpush