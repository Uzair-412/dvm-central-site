@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    {!! Form::model($job_type, ['method' => 'PATCH', 'route' => ['admin.manage-jobs.types.update', $job_type->id], 'files' => true]) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.manage-jobs.types.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('name', 'Job Type:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter job type ...']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">update</button>
        </x-slot>
    </x-backend.card>
    {!! Form::hidden('id', $job_type->id) !!}
    {!! Form::close() !!}
@stop
