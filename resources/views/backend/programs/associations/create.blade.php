@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    @if (@$data['association'])
        {!! Form::model($data['association'], ['method' => 'PATCH', 'route' => ['admin.programs.associations.update', $data['association']->id], 'files' => true]) !!}
    @else
        {!! Form::open(['route' => 'admin.programs.associations.store', 'method' => 'POST', 'files' => true]) !!}
    @endif
    <x-backend.card>
        <x-slot name="header">
            {{ $data['p_heading'] }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.programs.associations.index')"
                :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('name', 'Association Name:') !!}
                {!! Form::text('name', @$data['association'] ? $data['association']->name : null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter Association name ...']) !!}
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('address_line_1', 'Address line 1:') !!}
                    {!! Form::text('address_line_1', @$data['association'] ? $data['association']->address_line_1 : null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter address ...']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('address_line_2', 'Address line 2:') !!}
                    {!! Form::text('address_line_2', @$data['association'] ? $data['association']->address_line_2 : null, ['class' => 'form-control', 'placeholder' => 'Enter address ...']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('country_id', 'Country:') !!}
                    {!! Form::select('country_id', $data['country'], null, ['class' => 'form-control', 'required', 'placeholder' => 'Please Select Country...']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('city', 'City:') !!}
                    {!! Form::text('city', @$data['association'] ? $data['association']->city : null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter address ...']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('phone_number', 'Phone Number:') !!}
                    {!! Form::text('phone_number', @$data['association'] ? $data['association']->phone_number : null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter Phone Number ...']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('fax_number', 'Fax:') !!}
                    {!! Form::text('fax_number', @$data['association'] ? $data['association']->fax_number : null, ['class' => 'form-control', 'placeholder' => 'Enter Fax ...']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('email_id', 'Email:') !!}
                    {!! Form::text('email_id', @$data['association'] ? $data['association']->email_id : null, ['class' => 'form-control', 'placeholder' => 'Enter Email Id ...']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('UAN', 'UAN:') !!}
                    {!! Form::text('UAN', @$data['association'] ? $data['association']->uan : null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter UAN ...']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('state_id', 'State:') !!}
                    {!! Form::select('state_id', @$data['states'] ? $data['states'] : [], null, ['class' => 'form-control', 'required', 'placeholder' => 'Please Select State...']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('zip', 'Zip:') !!}
                    {!! Form::text('zip', @$data['association'] ? $data['association']->zip : null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter zip code ...']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('url', 'URL:') !!}
                    {!! Form::text('url', @$data['association'] ? $data['association']->url : null, ['class' => 'form-control', 'placeholder' => 'Enter website url link ...']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', @$data['association'] ? $data['association']->description : null, ['class' => 'form-control', 'placeholder' => 'Enter Description ...']) !!}
                </div>
            </div>  
            <div class="row">
                <div class="form-group col-md-12">
                    {!! Form::label('image', 'Upload Image:') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            @if (@$data['association'])
                <div class="row">
                    <div class="form-group col-md-12">
                        <img src="{{ asset('up_data/associations/' . $data['association']->image) }}" width="35px;"
                            height="35px;" alt="" />
                    </div>
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('', 'Status:') !!}
                <br>
                <label class="radio-inline">{!! Form::radio('status', 'Y', @$data['association']->status == 'Y' || @$data['status'] == 'Y' ? true : false, ['required']) !!} Active</label>
                <label class="radio-inline">{!! Form::radio('status', 'N', @$data['association']->status == 'N' ? true : false, ['required']) !!} In-active</label>
            </div>

            <div class="form-group">
                <label class="radio-inline">{!! Form::checkbox('is_mobile', 'Y', ['checked']) !!} Mobile Association</label>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">
                @if (@$data['association']) @lang('Update Program
                Association') @else @lang('Create Program Association') @endif
            </button>
        </x-slot>
    </x-backend.card>
    {!! Form::close() !!}
@stop
@push('after-scripts')
    <script>
        $('#country_id').change(function() {
            let id = $(this).val();
            $.ajax({
                url: '/admin/programs/associations/' + id,
                method: 'GET',
                data: {},
                success: function(response) {
                    $('#state_id').html(response);
                }
            })
        })
    </script>
@endpush

