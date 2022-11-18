@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['post'], ['method' => 'PATCH', 'route' => ['admin.blog-posts.update', $data['post']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.blog-posts.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.blog-posts._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Post')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['post']->id) !!}
    {!! Form::close() !!}
@stop