@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['webinars'], ['method' => 'PUT', 'route' => ['admin.webinars.update', $data['webinars']->id], 'files' => true]) !!}
        @include('backend.webinars._form')
        {!! Form::hidden('id', $data['webinars']->id) !!}
    {!! Form::close() !!}
@stop