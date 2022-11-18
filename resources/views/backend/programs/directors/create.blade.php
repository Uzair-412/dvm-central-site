@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@if(@$data['director'])
{!! Form::model($data['director'], ['method' => 'PATCH', 'route' => ['admin.programs.directors.update',
$data['director']->id], 'files' => true]) !!}
@else
{!! Form::open(array('route' => 'admin.programs.directors.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $data['p_heading'] }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.programs.directors.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('name', 'Director Name:') !!}
            {!! Form::text('name', @$data['director'] ? $data['director']->name : null,['class'=>'form-control', 'required',
            'placeholder'=>'Enter director name ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['director']->status == 'Y' || @$data['status'] ==
                'Y') ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['director']->status == 'N') ? true : false,
                ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$data['director']) @lang('Update Program Director') @else @lang('Create Program Director') @endif</button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop