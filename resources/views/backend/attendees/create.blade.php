@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::open(array('route' => 'admin.attendees.store', 'method' => 'POST', 'files' => true)) !!}
        @include('backend.attendees._form')
    {!! Form::close() !!}
@stop