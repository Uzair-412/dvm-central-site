<div class="card shadow">
    <div class="card-header">
        Speaker's Basic Info
        <div class="card-header-actions">
            <a href="/admin/speakers" class="card-header-action">Cancel</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name:') !!}
                    {!! Form::text('first_name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter First Name']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name:') !!}
                    {!! Form::text('last_name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Last Name']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::text('address', null,['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter address ...']) !!}
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('country', 'Country:') !!}
                    {!! Form::select('country', $data['countries'], @$data['speaker_country'],['class'=>'form-control', 'required' => 'required', 'onchange="get_states(this.value);"', 'placeholder'=>'Select country ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('state', 'State:') !!}
                    <div id="div_state">
                        @php
                            $show_text_field = true;
                            if(isset($data['address']))
                            {
                                if(is_numeric($data['speakers']->state))
                                    $show_text_field = false;
                            }
                        @endphp
                        @if($show_text_field)
                            {!! Form::text('state', @$data['speaker_state'], ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter state ...']) !!}
                        @else
                            {!! Form::select('state', $data['states'], @$data['speaker_state'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter state ...']) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('city', 'City:') !!}
                    {!! Form::text('city', null,['class'=>'form-control', 'placeholder'=>'Enter city ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('zip', 'Zip / Post Code:') !!}
                    {!! Form::text('zip', null,['maxlength' => '9', 'class'=>'form-control', 'placeholder'=>'Enter zip / post code ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('phone', 'Phone:') !!}
                    {!! Form::text('phone', null,['class'=>'form-control', 'placeholder'=>'Enter phone ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('mobile', 'Mobile:') !!}
                    {!! Form::text('mobile', null,['class'=>'form-control', 'placeholder'=>'Enter Mobile ...']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-header">
        Speaker's Additional Info
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('job_title', 'Job Title:') !!}
                    {!! Form::text('job_title', null,['class'=>'form-control', 'placeholder'=>'Enter Job Title']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('institute', 'Institute:') !!}
                    {!! Form::text('institute', null,['class'=>'form-control', 'placeholder'=>'Enter Institute']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('about', 'About Speaker:') !!}
            {!! Form::textarea('about', null,['class'=>'form-control', 'placeholder'=>'About Speaker ...', 'rows'=>'3']) !!}
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('profile', 'Image:') !!}
                    {!! Form::file('profile', ['class'=>'form-control', 'placeholder'=>'Profile Image ...']) !!}
                    @if($data['cmd'] == 'edit' && $data['speakers']->profile != '')
                        <p class="help-block"><a href="/up_data/speakers/{{ $data['speakers']->profile }}" target="_blank">Click here to see uploaded picture</a></p>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('profession', 'Profession') !!}
                    {!! Form::text('profession', null,['class'=>'form-control', 'placeholder'=>'Enter Profession ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('classification', 'Classification') !!}
                    {!! Form::text('classification', null,['class'=>'form-control', 'placeholder'=>'Enter Classification ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('specialty', 'Specialty') !!}
                    {!! Form::text('specialty', null,['class'=>'form-control', 'placeholder'=>'Enter Specialty ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('employer_type', 'Employer Type') !!}
                    {!! Form::text('employer_type', null,['class'=>'form-control', 'placeholder'=>'Enter Employer Type ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('practice_role', 'Practice Role') !!}
                    {!! Form::text('practice_role', null,['class'=>'form-control', 'placeholder'=>'Enter Practice Role ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('vets_in_practice', 'Vets In Practice') !!}
                    {!! Form::number('vets_in_practice', null,['class'=>'form-control', 'placeholder'=>'Enter Vets In Practice ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('techs_in_practice', 'Techs In Practice') !!}
                    {!! Form::number('techs_in_practice', null,['class'=>'form-control', 'placeholder'=>'Enter Techs In Practice ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('practice_revenue', 'Practice Revenue') !!}
                    {!! Form::text('practice_revenue', null,['class'=>'form-control', 'placeholder'=>'Enter Practice Revenue ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('practices_in_group', 'Practices In Group') !!}
                    {!! Form::text('practices_in_group', null,['class'=>'form-control', 'placeholder'=>'Enter Practices In Group ...']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('credentials', 'Credentials') !!}
            {!! Form::select('credentials', $data['credentials'], null, ['multiple'=>'multiple', 'name'=>'credentials[]', 'class'=>'form-control select_credentials']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('website', 'Website') !!}
            {!! Form::text('website', null,['class'=>'form-control', 'placeholder'=>'Enter Website ...']) !!}
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-header">
        Social Media Accounts And Status
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('sm_facebook', 'Facebook:') !!}
                    {!! Form::text('sm_facebook', null,['class'=>'form-control', 'placeholder'=>'Enter Facebook ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('sm_instagram', 'Instagram:') !!}
                    {!! Form::text('sm_instagram', null,['class'=>'form-control', 'placeholder'=>'Enter Instagram ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('sm_linkedin', 'LinkedIn:') !!}
                    {!! Form::text('sm_linkedin', null,['class'=>'form-control', 'placeholder'=>'Enter LinkedIn ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('sm_pinterest', 'Pinterest:') !!}
                    {!! Form::text('sm_pinterest', null,['class'=>'form-control', 'placeholder'=>'Enter Pinterest ...']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('sm_vimeo', 'Vimeo:') !!}
                    {!! Form::text('sm_vimeo', null,['class'=>'form-control', 'placeholder'=>'Enter Vimeo ...']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('sm_youtube', 'Youtube:') !!}
                    {!! Form::text('sm_youtube', null,['class'=>'form-control', 'placeholder'=>'Enter Youtube ...']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('sm_twitter', 'Twitter:') !!}
            {!! Form::text('sm_twitter', null,['class'=>'form-control', 'placeholder'=>'Enter Twitter ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
    </div>
</div>