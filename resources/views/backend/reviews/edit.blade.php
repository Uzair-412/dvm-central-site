@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['review'], ['method' => 'PATCH', 'route' => ['admin.reviews.update', $data['review']->id]]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.reviews.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.reviews._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Review')</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['review']->id) !!}
    {!! Form::close() !!}
@stop