@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    {!! Form::model($category, ['method' => 'PATCH', 'route' => ['admin.manage-jobs.category.update', $category->id], 'files' => true]) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $p_heading }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.manage-jobs.category.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
            <div class="form-group">
                {!! Form::label('name', 'Categorys Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter category name ...']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">update</button>
        </x-slot>
    </x-backend.card>
    {!! Form::hidden('id', $category->id) !!}
    {!! Form::close() !!}
@stop
