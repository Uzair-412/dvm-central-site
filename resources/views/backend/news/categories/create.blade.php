@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
@if(@$news_category)
    {!! Form::model($news_category, ['method' => 'PATCH', 'route' => ['admin.news-categories.update',$news_category->id], 'files' => true]) !!}
@else
    {!! Form::open(array('route' => 'admin.news-categories.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.news-categories.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', @$news_category ? $news_category->name : null,['class'=>'form-control', 'required', 'placeholder'=>'Enter news category name ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', ((@$news_category && @$news_category->status == 'Y') || (@$status == 'Y')) ? true : false, ['required'])
                !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$news_category && @$news_category->status == 'N') ? true : false, ['required'])
                !!} In-active</label>
        </div>
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$news_category) @lang('Update News Category') @else @lang('Create News Category') @endif </button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop