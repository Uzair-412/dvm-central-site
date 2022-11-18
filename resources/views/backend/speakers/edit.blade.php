@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['speakers'], ['method' => 'PATCH', 'route' => ['admin.speakers.update', $data['speakers']->id], 'files' => true]) !!}
        @include('backend.speakers._form')
        {!! Form::hidden('id', $data['speakers']->id) !!}
    {!! Form::close() !!}
@stop