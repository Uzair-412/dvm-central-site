@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    @if(@$course)
        {!! Form::model($course, ['method' => 'PATCH', 'route' => ['admin.manage-courses.courses.update',$course->id], 'files' => true]) !!}
    @else
        {!! Form::open(array('route' => 'admin.manage-courses.courses.store', 'method' => 'POST', 'files' => true)) !!}
    @endif
        <x-backend.card>
            <x-slot name="header">
                {{ $p_heading }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.manage-courses.courses.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div class="form-group">
                    {!! Form::label('user_id', 'Select Instructor:') !!}
                    {!! Form::select('user_id', $users, null,['class'=>'form-control', 'placeholder'=>'Select instructor ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('course_category_id', 'Select Category:') !!}
                    {!! Form::select('course_category_id', $categories, null,['class'=>'form-control', 'placeholder'=>'Select category ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('course_type_id', 'Select Type:') !!}
                    {!! Form::select('course_type_id', $types, null,['class'=>'form-control', 'placeholder'=>'Select type ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', @$course ? $course->title : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter course title ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('short_description', 'Short Description:') !!}
                    {!! Form::textarea('short_description', @$course ? $course->short_description : null,['class'=>'form-control', 'placeholder'=>'Enter short description ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', @$course ? $course->description : null,['class'=>'form-control', 'placeholder'=>'Enter description ...']) !!}
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('price', 'Price:') !!}
                        {!! Form::text('price', @$course ? $course->price : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter price ...']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('price_original', 'Price Original:') !!}
                        {!! Form::text('price_original', @$course ? $course->price_original : null,['class'=>'form-control', 'placeholder'=>'Enter price original ...']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('discount_start_time', 'Discount start time:') !!}
                        {!! Form::date('discount_start_time', @$course ? $course->discount_start_time : null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('discount_end_time', 'Discount end time:') !!}
                        {!! Form::date('discount_end_time', @$course ? $course->discount_end_time : null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('thumbnail', 'Thumbnail:') !!}<br/>
                        {!! Form::file('thumbnail', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('', 'Availibility:') !!}
                        <br>
                        <label for="is_24_7_support_service" class="mx-2 ml-0">
                        {!! Form::checkbox('is_24_7_support_service', '1', ((@$course && @$course->is_24_7_support_service == 1) || !@$course) ? true : false, array('id' => 'is_24_7_support_service')) !!} 24/7 support service
                        </label>

                        <label for="is_videos" class="mx-2">
                        {!! Form::checkbox('is_videos', '1', ((@$course && @$course->is_videos == 1) || !@$course) ? true : false, array('id'=>'is_videos') ) !!} Allow Videos
                        </label>

                        <label for="general_guidance" class="mx-2">
                        {!! Form::checkbox('general_guidance', '1', ((@$course && @$course->general_guidance == 1) || !@$course) ? true : false, array('id'=>'general_guidance') ) !!} General Guidance
                        </label>

                        <label for="is_practice_questions" class="mx-2 mr-0">
                        {!! Form::checkbox('is_practice_questions', '1', ((@$course && @$course->is_practice_questions == 1) || !@$course) ? true : false, array('id'=>'is_practice_questions') ) !!} Practice Questions
                        </label>
                    </div>
                </div>
                @if(@$course->thumbnail)
                    <div class="form-group">
                        <img src="{{ asset('up_data/courses/thumbnails/'.$course->thumbnail) }}" width="20%" />
                    </div>                    
                @endif
                <div class="form-group">
                    {!! Form::label('', 'Status:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('status', 'Y', ((@$course && @$course->status == 'Y') || !@$course) ? true : false, ['required'])
                        !!} Active</label>
                    <label class="radio-inline">{!! Form::radio('status', 'N', (@$course && @$course->status == 'N') ? true : false, ['required'])
                        !!} In-active</label>
                </div>
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$course) @lang('Update Course') @else @lang('Create Course')@endif</button>
            </x-slot>
        </x-backend.card>
    {!! Form::close() !!}
@stop