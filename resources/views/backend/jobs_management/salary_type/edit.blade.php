@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    {!! Form::model($salary_type, ['method' => 'PATCH', 'route' => ['admin.manage-jobs.salary-type.update', $salary_type->id], 'files' => true]) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.manage-jobs.salary-type.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('name', 'Salary Type:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter salary type ...']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">update</button>
        </x-slot>
    </x-backend.card>
    {!! Form::hidden('id', $salary_type->id) !!}
    {!! Form::close() !!}
@stop
