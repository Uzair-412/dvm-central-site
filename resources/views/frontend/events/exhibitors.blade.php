@extends('frontend.layouts.virtual')
@section('content')
    <div class="container content-container pt-6 mx-auto xl:px-10 pb-10">
        @livewire('exhibitor-listing', ['event' => $event])
    </div>
@endsection