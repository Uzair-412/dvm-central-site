@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    {!! Form::model($working_time, ['method' => 'PATCH', 'route' => ['admin.manage-jobs.working-time.update', $working_time->id], 'files' => true]) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.manage-jobs.working-time.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('name', 'Working Time:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter working time ...']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">update</button>
        </x-slot>
    </x-backend.card>
    {!! Form::hidden('id', $working_time->id) !!}
    {!! Form::close() !!}
@stop
