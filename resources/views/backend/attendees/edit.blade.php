@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    {!! Form::model($data['attendees'], ['method' => 'PATCH', 'route' => ['admin.attendees.update', $data['attendees']->id], 'files' => true]) !!}
        @include('backend.attendees._form')
        {!! Form::hidden('id', $data['attendees']->id) !!}
    {!! Form::close() !!}
@stop