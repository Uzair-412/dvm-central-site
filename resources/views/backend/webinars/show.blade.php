@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <x-backend.card>
        <x-slot name="header">
            <h3>Webinar Name: <span>{{ $data['p_heading'] }}</span> </h3>
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped">
                <tr class="row">
                    <th class="col-3">Webinar Name</th>
                    <td class="col-9">{{$data['webiner']->name}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Webinar Name</th>
                    <td class="col-9">{{$data['webiner']->events->name}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Speakers Name</th>
                    <td class="col-9">
                        @foreach ($data['webiner']->speaker as $item) 
                            {{$item->first_name}} {{$item->last_name}},
                        @endforeach
                    </td>
                </tr>
                <tr class="row">
                    <th class="col-3">Image</th>
                    <td class="col-9"><img src="{{(!file_exists('/up_data/webiners/images/'.$data['webiner']->image)) ? ('/up_data/webiners/images/'.$data['webiner']->image) : ('/up_data/na.webp')}}" width="200" alt=""></td>
                </tr>
                <tr class="row">
                    <th class="col-3">Start Date</th>
                    <td class="col-9">{{$data['webiner']->start_date}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">End Date</th>
                    <td class="col-9">{{$data['webiner']->end_date}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Location</th>
                    <td class="col-9">{{$data['webiner']->location}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Zoom Link</th>
                    <td class="col-9">{{$data['webiner']->zoom_link}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Zoom Meeting ID</th>
                    <td class="col-9">{{$data['webiner']->zoom_meeting_id}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Zoom Meeting Password</th>
                    <td class="col-9">{{$data['webiner']->zoom_password}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Short Description</th>
                    <td class="col-9">{{$data['webiner']->short_detail}}</td>
                </tr>
                <tr class="row">
                    <th class="col-3">Full Description</th>
                    <td class="col-9">{!!$data['webiner']->full_detail!!}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@stop