@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@if(@$data['institute'])
{!! Form::model($data['institute'], ['method' => 'PATCH', 'route' => ['admin.programs.institutes.update',
$data['institute']->id], 'files' => true]) !!}
@else
{!! Form::open(array('route' => 'admin.programs.institutes.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">  
        {{ $data['p_heading'] }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.programs.institutes.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('name', 'Institute Name:') !!}
            {!! Form::text('name', @$data['institute'] ? $data['institute']->name : null,['class'=>'form-control',
            'required',
            'placeholder'=>'Enter institute name ...']) !!}
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('address_line_1', 'Address line 1:') !!}
                {!! Form::text('address_line_1', @$data['institute'] ? $data['institute']->address_line_1 : null,['class'=>'form-control',
                'required',
                'placeholder'=>'Enter address ...']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('address_line_2', 'Address line 2:') !!}
                {!! Form::text('address_line_2', @$data['institute'] ? $data['institute']->address_line_2 :
                null,['class'=>'form-control', 'placeholder'=>'Enter address ...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('country_id', 'Country:') !!}
                {!! Form::select('country_id', $data['country'], null,['class'=>'form-control', 'required', 'placeholder' => 'Please Select Country...']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('city', 'City:') !!}
                {!! Form::text('city', @$data['institute'] ? $data['institute']->city : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter address ...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('state_id', 'State:') !!}
                {!! Form::select('state_id', @$data['states'] ? $data['states'] : [], null,['class'=>'form-control', 'required', 'placeholder' => 'Please Select State...']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('zip', 'Zip:') !!}
                {!! Form::text('zip', @$data['institute'] ? $data['institute']->zip : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter zip code ...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::label('url', 'URL:') !!}
                {!! Form::text('url', @$data['institute'] ? $data['institute']->url : null,['class'=>'form-control',
                'placeholder'=>'Enter website url link ...']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['institute']->status == 'Y' ||
                @$data['status'] ==
                'Y') ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['institute']->status == 'N') ? true :
                false,
                ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$data['institute']) @lang('Update Program
            Institute') @else @lang('Create Program Institute') @endif</button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop
@push('after-scripts')
<script>
    $('#country_id').change(function () {
        let id = $(this).val();
        $.ajax({
            url: '/admin/programs/institutes/'+id,
            method: 'GET',
            data: {},
            success: function (response) {
                $('#state_id').html(response);
            }
        })
    })
</script>
@endpush