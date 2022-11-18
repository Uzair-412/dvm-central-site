@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['faqs'], ['method' => 'PATCH', 'route' => ['admin.faqs.update', $data['faqs']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.faqs.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.faqs._form')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang("Update FAQ's")</button>
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['faqs']->id) !!}
    {!! Form::close() !!}
@stop