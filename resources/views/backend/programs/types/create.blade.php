@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@if(@$data['type'])
{!! Form::model($data['type'], ['method' => 'PATCH', 'route' => ['admin.programs.types.update',
$data['type']->id]]) !!}
@else
{!! Form::open(array('route' => 'admin.programs.types.store', 'method' => 'POST')) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $data['p_heading'] }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.programs.types.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('name', 'Program Type:') !!}
            {!! Form::text('name', @$data['type'] ? $data['type']->name : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter program type ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['type']->status == 'Y' || @$data['status'] == 'Y') ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['type']->status == 'N') ? true : false, ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$data['type']) @lang('Update Program
            Type') @else @lang('Create Program Type') @endif</button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop