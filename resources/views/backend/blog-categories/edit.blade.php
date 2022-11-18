@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['category'], ['method' => 'PATCH', 'route' => ['admin.blog-categories.update', $data['category']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.blog-categories.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.blog-categories._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Category')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['category']->id) !!}
    {!! Form::close() !!}
@stop