@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/product">Manage Products</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $data['breadcrumbs'] }}
    </li>
</ol>
@endsection
    {!! Form::model($data['product'], ['method' => 'PATCH', 'route' => ['admin.product.update', $data['product']->id], 'files' => true]) !!}
        <x-backend.card>
            <x-slot name="header">
                {{ $data['p_heading'] }}
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                @include('backend.product._form')
            </x-slot>
            <x-slot name="footer">
                <button type="submit" class="btn btn-sm btn-primary float-right mx-2">Submit</button>
                <a href="{{ route('admin.product.edit.details', $data['product']->id) }}" class="btn btn-sm btn-danger float-right mx-2">Update Details</a>
                <a href="{{ route('admin.product.edit.files', $data['product']->id) }}" class="btn btn-sm btn-danger float-right mx-2">Manage Images / Files</a>
                @if($data['product']->type == 'variation')
                    <a href="{{ route('admin.product.edit.variations', $data['product']->id) }}" class="btn btn-sm btn-danger float-right mx-2">Manage Variations</a>
                @endif
                @if($data['product']->is_set == 'Y')
                    <a href="{{ route('admin.product.edit.set-items', $data['product']->id) }}" class="btn btn-sm btn-danger float-right mx-2">Set Items</a>
                @endif
            </x-slot>
        </x-backend.card>
        {!! Form::hidden('id', $data['product']->id) !!}
    {!! Form::close() !!}
@stop