@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::open(array('route' => 'admin.webinars.store', 'method' => 'POST', 'files' => true)) !!}
        @include('backend.webinars._form')
    {!! Form::close() !!}
@stop