
<div class="form-group">
    <label for="business_type">Field Set:*</label>
    <select name="field_set_id" id="business_type" class="form-control" required>
        <option value="">- Select Field Set -</option>
        @foreach($data['field-set'] as $field)
            <option @isset($data['fields']) @if($data['fields']->field_set_id == $field->id) selected @endif @endisset value="{{ $field->id }}">{{ $field->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="type">Type:*</label>
    <select name="type" id="field_type" class="form-control" required>
        <option value="">- Select Type -</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'text_field') selected @endif @endisset value="text_field">Text Field</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'link_field') selected @endif @endisset value="link_field">Link Field</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'text_area') selected @endif @endisset value="text_area">Text Area</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'drop_down') selected @endif @endisset value="drop_down">Drop Down</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'check_box') selected @endif @endisset value="check_box">Check Box</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'radio') selected @endif @endisset value="radio">Radio</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'editor') selected @endif @endisset value="editor">Editor</option>
        <option @isset($data['fields']) @if($data['fields']->type == 'date_picker') selected @endif @endisset value="date_picker">Date Picker</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('name', 'Name:*') !!}
    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Name']) !!}
</div>
<div class="form-group">
    {!! Form::label('placeholder', 'Placeholder:*') !!}
    {!! Form::text('placeholder', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Placeholder']) !!}
</div>
<div class="form-group">
    {!! Form::label('placeholder_2', 'Placeholder 2:') !!}
    {!! Form::text('placeholder_2', null,['class'=>'form-control', 'placeholder'=>'Enter Placeholder 2', 'id'=>'field_placeholder_2_input']) !!}
</div>
<div class="form-group" id="field_options" @if(isset($data['fields'])) @if($data['fields']->type == 'text_field' || 
    $data['fields']->type == 'link_field' || $data['fields']->type == 'text_area' || $data['fields']->type == 'editor' || $data['fields']->type == 'date_picker') hidden @endif @else hidden @endif>
    {!! Form::label('options', 'Options:') !!}
    <small>(Comma separated, &asymp; &asymp; Example: denzel washington,)</small>
    <input type="text" id="field_options_input" class="form-control" placeholder="Enter Options">
    @isset($data['fields'])
        @php
            $options = explode(',',$data['fields']->options);
        @endphp
        @foreach($options as $key => $option)
            {!! '<span class="removeName">'.$option.'<small value="'.$key.'">x</small></span>' !!}
        @endforeach
    @endisset
    {!! Form::hidden('options', null,['class'=>'form-control', 'placeholder'=>'Enter Options', 'id'=>'field_options_hidden']) !!}
</div>
<div class="form-group">
    {!! Form::label('', 'Required:*') !!}
    <br>
    <label class="radio-inline">{!! Form::radio('required', 'Y', (@$data['required'] == 'Y') ? true : false, ['required']) !!} Yes</label>
    <label class="radio-inline">{!! Form::radio('required', 'N', (@$data['required'] == 'N') ? true : false, ['required']) !!} No</label>
</div>
<div class="form-group">
    {!! Form::label('position', 'Position:*') !!}
    {!! Form::text('position', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Position ...']) !!}
</div>
@push('after-styles')
    <style>
        #field_options span {
            display: inline-block;
            padding: 4px 6px;
            margin: 0 4px 3px 0;
            border: 1px solid #8EC1E2;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: 14px;
            color: #5A6A75;
            text-shadow: 0 1px 1px #fff;
            background: rgb(254, 255, 255);
            background: -moz-linear-gradient(top, rgba(254, 255, 255, 1) 0%, rgba(221, 241, 249, 1) 35%, rgba(160, 216, 239, 1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(254, 255, 255, 1)), color-stop(35%, rgba(221, 241, 249, 1)), color-stop(100%, rgba(160, 216, 239, 1)));
            background: -webkit-linear-gradient(top, rgba(254, 255, 255, 1) 0%, rgba(221, 241, 249, 1) 35%, rgba(160, 216, 239, 1) 100%);
            background: -o-linear-gradient(top, rgba(254, 255, 255, 1) 0%, rgba(221, 241, 249, 1) 35%, rgba(160, 216, 239, 1) 100%);
            background: -ms-linear-gradient(top, rgba(254, 255, 255, 1) 0%, rgba(221, 241, 249, 1) 35%, rgba(160, 216, 239, 1) 100%);
            background: linear-gradient(to bottom, rgba(254, 255, 255, 1) 0%, rgba(221, 241, 249, 1) 35%, rgba(160, 216, 239, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#feffff', endColorstr='#a0d8ef', GradientType=0);
        }
        #field_options span small {
            padding: 0 4px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
            color: #56809B;
            margin: 0 0 0 4px;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
        }
        #field_options p small {
            color: #CCEBFC;
        }
    </style>
@endpush