@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::open(array('route' => 'admin.speakers.store', 'method' => 'POST', 'files' => true)) !!}
        @include('backend.speakers._form')
    {!! Form::close() !!}
@stop