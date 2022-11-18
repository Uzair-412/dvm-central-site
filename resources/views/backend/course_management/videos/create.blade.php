@extends('backend.layouts.app')
@section('title', $p_heading)
@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses">Courses</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/manage-courses/courses/{{ $module->course->slug }}/modules">{{ $module->course->title }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="/admin/manage-courses/course/module/{{ $module->slug }}/videos">{{ $module->title }}</a>
    </li>
    <li class="breadcrumb-item active">
        Manage video
    </li>
</ol>
@endsection
@section('content')
@if(@$video)
    {!! Form::model($video, ['method' => 'PATCH', 'route' => ['admin.manage-courses.course.module.video.update',$video->id], 'files' => true]) !!}
@else
    {!! Form::open(array('route' => 'admin.manage-courses.course.module.video.store', 'method' => 'POST', 'files' => true)) !!}
@endif
    {!! Form::hidden('course_module_id', $module->id) !!}
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="url('admin/manage-courses/course/module/'.$module->slug.'/videos')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('title', 'title:') !!}
            {!! Form::text('title', @$video ? $video->title : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter module title ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', @$video ? $video->description : null,['class'=>'form-control', 'placeholder'=>'Enter description ...']) !!}
        </div>
        <div class="row">
            <div class="form-group col-md-6">
               {!! Form::label('thumbnail', 'Thumbnail:') !!}<br/>
               {!! Form::file('thumbnail', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('video', 'Video:') !!}<br/>
                {!! Form::file('video', null,['class'=>'form-control']) !!}
            </div>
        </div>
        @if(@$video->thumbnail)
        <div class="row">
            <div class="form-group col-md-6">
                <img src="{{ asset('up_data/courses/videos/thumbnails/'.$video->thumbnail) }}" width="80%" />
            </div>
            <div class="form-group col-md-6">
                <iframe
                    src="https://player.vimeo.com/video/{{ $video->video }}?byline=0&portrait=0&badge=0"
                    width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        @endif
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', ((@$video && @$video->status == 'Y') || !@$video) ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$video && @$video->status == 'N') ? true : false, ['required'])
                !!} In-active</label>
        </div>
        <div class="form-group">
            <label for="is_free" class="">
                {!! Form::checkbox('is_free', '1', ((@$video && @$video->is_free == 1)) ? true : false, array('id'=>'is_free') ) !!} Is Free Video
            </label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$video) @lang('Update Video') @else @lang('Create Video') @endif </button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop