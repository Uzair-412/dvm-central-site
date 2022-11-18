@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@if(@$data['accreditation'])
{!! Form::model($data['accreditation'], ['method' => 'PATCH', 'route' => ['admin.programs.accreditation-status.update',
$data['accreditation']->id], 'files' => true]) !!}
@else
{!! Form::open(array('route' => 'admin.programs.accreditation-status.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $data['p_heading'] }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.programs.accreditation-status.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('name', 'Accreditation Name:') !!}
            {!! Form::text('name', @$data['accreditation'] ? $data['accreditation']->name : null,['class'=>'form-control',
            'required',
            'placeholder'=>'Enter accreditation name ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['accreditation']->status == 'Y' ||
                @$data['status'] ==
                'Y') ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['accreditation']->status == 'N') ? true :
                false,
                ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$data['accreditation']) @lang('Update Program
            Accreditation Status') @else @lang('Create Program Accreditation Status') @endif</button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop