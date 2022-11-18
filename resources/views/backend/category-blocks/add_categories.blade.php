@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    
    {!! Form::open(array('route' => 'admin.category-blocks.store-categories', 'method' => 'POST')) !!}
    <x-backend.card>
        <x-slot name="header">
            {{ $data['p_heading'] }} of <strong>{{ $data['block']->name }}</strong>
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.category-blocks.index')" :text="__('Cancel')" />
        </x-slot>
        <x-slot name="body">
                {!! Form::hidden('block_id', $data['block_id']) !!}
                <div class="form-group">
                    {!! Form::label('category_id', 'Select categories:') !!}
                    {!! Form::select('category_id', $data['categories'], $data['selected_categories'], ['multiple'=>'multiple', 'name'=>'category_ids[]','class'=>'form-control select2']) !!}
                </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Add Category')</button>
        </x-slot>
    </x-backend.card>
    {!! Form::close() !!}
@stop
@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush