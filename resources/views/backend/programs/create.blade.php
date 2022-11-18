@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@if(@$data['program'])
{!! Form::model($data['program'], ['method' => 'PATCH', 'route' => ['admin.programs.program.update',
$data['program']->id], 'files' => true]) !!}
@else
{!! Form::open(array('route' => 'admin.programs.program.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $data['p_heading'] }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.programs.program.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('type_id', 'Types:') !!}
                {!! Form::select('type_id', $data['types'], null,['class'=>'form-control', 'required', 'placeholder' =>
                'Please Select Type ...']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('institute_id', 'Institutes:') !!}
                {!! Form::select('institute_id', $data['institutes'], null,['class'=>'form-control', 'required', 'placeholder' =>
                'Please Select Institute ...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('director_id', 'Directors:') !!}
                {!! Form::select('director_id', $data['directors'], null,['class'=>'form-control', 'required', 'placeholder' =>
                'Please Select Director ...']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('discipline_code', 'Discipline Code:') !!}
                {!! Form::text('discipline_code', @$data['program'] ? $data['program']->discipline_code : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter discipline code ...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('accreditation_status_id', 'Accreditation Statuses:') !!}
                {!! Form::select('accreditation_status_id', $data['accreditation_statuses'], null,['class'=>'form-control', 'required', 'placeholder' =>
                'Please Select Accreditation Status ...']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('last_accreditation_visit', 'Last Accreditation Visit:') !!}
                {!! Form::text('last_accreditation_visit', @$data['program'] ? $data['program']->last_accreditation_visit : null,['class'=>'form-control', 'required']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('next_accreditation_visit', 'Next Accreditation Visit:') !!}
                {!! Form::text('next_accreditation_visit', @$data['program'] ? $data['program']->next_accreditation_visit : null,['class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['program']->status == 'Y' ||
                @$data['status'] ==
                'Y') ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['program']->status == 'N') ? true :
                false,
                ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$data['program']) @lang('Update Program') @else @lang('Create Program') @endif</button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop