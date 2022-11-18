@extends('backend.layouts.app')
@section('title', $p_heading)

@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses/{{ $course->slug }}/modules">{{ $course->title }}</a>
    </li>
    <li class="breadcrumb-item active">
        Manage module
    </li>
</ol>
@endsection

@section('content')
@if(@$module)
    {!! Form::model($module, ['method' => 'PATCH', 'route' => ['admin.manage-courses.course.module.update',$module->id], 'files' => true]) !!}
@else
    {!! Form::open(array('route' => 'admin.manage-courses.course.module.store', 'method' => 'POST', 'id' => 'module_form', 'files' => true)) !!}
@endif
    {!! Form::hidden('course_id', $course->id) !!}
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="url('admin/manage-courses/courses/'.$course->slug.'/modules')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('title', 'title:') !!}
            {!! Form::text('title', @$module ? $module->title : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter module title ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', @$module ? $module->description : null,['class'=>'form-control', 'placeholder'=>'Enter description ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('watch_hours', 'Watch hours:') !!}
            {!! Form::text('watch_hours', @$module ? $module->watch_hours : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter module watch hours ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', ((@$module && @$module->status == 'Y') || !@$module) ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$module && @$module->status == 'N') ? true : false, ['required'])
                !!} In-active</label>
        </div>
        <div class="form-group">
            <label for="is_free" class="">
                {!! Form::checkbox('is_free', '1', ((@$module && @$module->is_free == 1)) ? true : false, array('id'=>'is_free') ) !!} Is Free Module
            </label>

            <label for="allow_quiz" class="">
                {!! Form::checkbox('allow_quiz', '1', ((@$module && @$module->allow_quiz == 1)) ? true : false, array('id'=>'allow_quiz') ) !!} Allow Quiz
            </label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="text-right">
            @if(!@$module)
            <label for="add_video">
                <input type="radio" class="d-none" name="add_video" id="add_video" value="y" />
                <span><button class="btn btn-sm btn-primary mr-2" type="button" id="add_video_btn">@lang('Create module and add video')</button></span>
            </label>
            @endif
            <button class="btn btn-sm btn-primary" type="submit">@if(@$module) @lang('Update Module') @else @lang('Create Module') @endif </button>
        </div>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop

@push('after-scripts')
    <script>
        document.querySelector('#add_video_btn').addEventListener('click', ()=> {
            document.querySelector('#add_video').setAttribute('checked');
            document.querySelector('#module_form').submit();
        })
    </script>
@endpush