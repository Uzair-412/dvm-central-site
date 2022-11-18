
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Name', 'onblur' => 'ajax_request();']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Slug']) !!}
    @if($data['cmd'] == 'edit')
        <label class="radio-inline">{!! Form::checkbox('save_slug', 'Y', false, ['onclick' => 'save_slugs(this);']) !!} Save Slug</label>
        <div id="link_generate_slug" class="d-none">
            <a href="javascript:;" onclick="ajax_request();">Re-generate Slug</a>
            <br>
            <label class="radio-inline">{!! Form::checkbox('create_redirect', 'Y', true) !!} Create Redirect</label>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('short_description', 'Short Description:') !!}
    {!! Form::text('short_description', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Short Description']) !!}
</div>
<div class="form-group">
    {!! Form::label('long_description', 'Long Description:') !!}
    {!! Form::textarea('long_description', null,['class'=>'form-control ckeditor', 'required', 'placeholder'=>'Enter Long Description', 'rows'=>'3']) !!}
</div>
<div class="form-group">
    {!! Form::label('icon_code', 'Icon Code:') !!}
    {!! Form::text('icon_code', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Icon Code']) !!}
</div>
<div class="form-group">
    {!! Form::label('icon_image', 'Icon Image:') !!}
    {!! Form::file('icon_image', ['class'=>'form-control',  'placeholder'=>'Icon Image ...']) !!}
    @if($data['p_heading'] == 'Update Business Type' && $data['business-type']->icon_image != '')
        <p class="help-block"><a href="/up_data/business-type/icon-image/{{ $data['business-type']->icon_image }}" target="_blank">Click here to see uploaded Icon Image</a></p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('regular_image', 'Regular Image:') !!}
    {!! Form::file('regular_image', ['class'=>'form-control',  'placeholder'=>'Regular Image ...']) !!}
    @if($data['p_heading'] == 'Update Business Type' && $data['business-type']->regular_image != '')
        <p class="help-block"><a href="/up_data/business-type/regular-image/{{ $data['business-type']->regular_image }}" target="_blank">Click here to see uploaded Regular Image</a></p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('display_position', 'Display Position:') !!}
    {!! Form::text('display_position', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Display Position ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Show In Main Menu:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('show_in_main_menu', 'Y', (@$data['show_in_main_menu'] == 'Y') ? true : false, ['required']) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('show_in_main_menu', 'N', (@$data['show_in_main_menu'] == 'N') ? true : false, ['required']) !!} No</label>
</div>
<div class="form-group">
    {!! Form::label('', 'Show In Home Page:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('show_in_home_page', 'Y', (@$data['show_in_home_page'] == 'Y') ? true : false, ['required']) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('show_in_home_page', 'N', (@$data['show_in_home_page'] == 'N') ? true : false, ['required']) !!} No</label>
</div>
<div class="form-group">
    {!! Form::label('', 'Status:') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
</div>
{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'category') !!}

@if($data['cmd'] == 'edit')
    @push('after-scripts')
    <script>
        $('#slug').prop('disabled', true);
        $('#name').removeAttr('onblur');
    </script>
    @endpush
@endif