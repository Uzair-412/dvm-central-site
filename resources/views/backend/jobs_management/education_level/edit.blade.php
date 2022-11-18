@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    {!! Form::model($education_level, ['method' => 'PATCH', 'route' => ['admin.manage-jobs.education-level.update', $education_level->id], 'files' => true]) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.manage-jobs.education-level.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('name', 'Education Level:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter education level ...']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">update</button>
        </x-slot>
    </x-backend.card>
    {!! Form::hidden('id', $education_level->id) !!}
    {!! Form::close() !!}
@stop
