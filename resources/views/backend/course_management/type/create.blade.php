@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
@if(@$course_type)
    {!! Form::model($course_type, ['method' => 'PATCH', 'route' => ['admin.manage-courses.types.update',$course_type->id], 'files' => true]) !!}
@else
    {!! Form::open(array('route' => 'admin.manage-courses.types.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.manage-courses.types.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', @$course_type ? $course_type->name : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter course type name ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', ((@$course_type && @$course_type->status == 'Y') || !@$course_type) ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$course_type && @$course_type->status == 'N') ? true : false, ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$news_category) @lang('Update Course Type') @else @lang('Create Course Type') @endif </button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop