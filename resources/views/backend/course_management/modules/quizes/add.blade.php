@extends('backend.layouts.app')
@section('title', $p_heading)

@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses/{{ $course_module->course->slug }}/modules">{{ $course_module->course->title }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $course_module->title }}
    </li>
    <li class="breadcrumb-item active">
        <span class="badge bg-primary text-white mt-1">Quizes</span>
    </li>
</ol>
@endsection

@section('content')
    @if(@$quiz)
        {!! Form::model($quiz, ['method' => 'patch', 'route' => ['admin.manage-courses.course.module.quiz.update',$quiz->id]]) !!}
    @else
        {!! Form::open(array('route' => 'admin.manage-courses.course.module.quiz.store', 'method' => 'POST', 'id' => 'module_form')) !!}
    @endif
        {!! Form::hidden('module_id', $course_module->id) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            @if(@$quiz)
                <x-utils.link class="card-header-action" :href="url('admin/manage-courses/course/'.$course_module->course->slug.'/module/'.$course_module->slug.'/quizes')" :text="__('Cancel')" />
            @else
                <x-utils.link class="card-header-action" :href="url('admin/manage-courses/courses/'.$course_module->course->slug.'/modules')" :text="__('Cancel')" />
            @endif
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('question', 'Question:') !!}
                {!! Form::text('question', @$quiz ? $quiz->question : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter question ...']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="text-right">
                <button class="btn btn-sm btn-primary" type="submit">@if(@$quiz) @lang('Update Quiz') @else @lang('Add Quiz') @endif </button>
            </div>
        </x-slot>
    </x-backend.card>
    {!! Form::close() !!}
    
    <x-backend.card>
        <x-slot name="header">
            Manage Quizes
        </x-slot>
        <x-slot name="body">
            <livewire:backend.course-management.course-module-quizes-table :params="$course_module->id" />
        </x-slot>
    </x-backend.card>
@endsection