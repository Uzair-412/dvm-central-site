@extends('backend.layouts.app')
@section('title', $p_heading)

@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses/{{ $quiz->module->course->slug }}/modules">{{ $quiz->module->course->title }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="/admin/manage-courses/course/{{ $quiz->module->course->slug }}/module/{{ $quiz->module->slug }}/quizes">{{ $quiz->module->title }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $quiz->question }}
    </li>
    <li class="breadcrumb-item active">
        <span class="badge bg-primary text-white mt-1">Options</span>
    </li>
</ol>
@endsection

@section('content')
    @if(@$option)
        {!! Form::model($option, ['method' => 'patch', 'route' => ['admin.manage-courses.course.module.quiz.options.update',$option->id]]) !!}
    @else
        {!! Form::open(array('route' => 'admin.manage-courses.course.module.quiz.options.store', 'method' => 'POST', 'id' => 'module_form')) !!}
    @endif
        {!! Form::hidden('quiz_id', $quiz->id) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            @if(@$option)
                <x-utils.link class="card-header-action" :href="url('admin/manage-courses/course/'.$quiz->module->course->slug.'/module/'.$quiz->module->slug.'/quiz/'.$quiz->id.'/options')" :text="__('Cancel')" />
            @else
                <x-utils.link class="card-header-action" :href="url('/admin/manage-courses/course/'.$quiz->module->course->slug.'/module/'.$quiz->module->slug.'/quizes')" :text="__('Cancel')" />
            @endif
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('quiz_option', 'Option:') !!}
                {!! Form::text('quiz_option', @$option ? $option->quiz_option : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter quiz option ...']) !!}
            </div>
            <div class="form-group">
                <label for="is_true" class="">
                    {!! Form::checkbox('is_true', '1', ((@$option && @$option->is_true == 1)) ? true : false, array('id'=>'is_true') ) !!} Check for true option
                </label>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="text-right">
                <button class="btn btn-sm btn-primary" type="submit">@if(@$option) @lang('Update Option') @else @lang('Add Option') @endif </button>
            </div>
        </x-slot>
    </x-backend.card>
    {!! Form::close() !!}
    
    <x-backend.card>
        <x-slot name="header">
            Manage Options
        </x-slot>
        <x-slot name="body">
            <livewire:backend.course-management.course-module-quiz-options-table :params="$quiz->id" />
        </x-slot>
    </x-backend.card>
@endsection