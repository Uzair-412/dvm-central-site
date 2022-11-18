@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
@if(@$post)
    {!! Form::model($post, ['method' => 'PATCH', 'route' => ['admin.news-posts.update',$post->id], 'files' => true]) !!}
@else
    {!! Form::open(array('route' => 'admin.news-posts.store', 'method' => 'POST', 'files' => true)) !!}
@endif
<x-backend.card>
    <x-slot name="header">
        {{ $p_heading }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.news-posts.index')" :text="__('Cancel')" />
    </x-slot>
    <x-slot name="body">
        @include('backend.news.posts._form')
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">@if(@$post) @lang('Update News') @else @lang('Create News') @endif</button>
    </x-slot>
</x-backend.card>
{!! Form::close() !!}
@stop