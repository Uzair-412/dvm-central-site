@extends('frontend.layouts.app')
@section('title', 'VetandTech | Marketplace for Veterinary Instruments and Supplies')
@section('meta_keywords', 'VetandTech')
@section('meta_description', 'VetandTech International a reliable marketplace for buying and selling veterinary medical equipment and supplies for veterinarians worldwide. Get started!')
@section('content')
    <div class="width content-container pt-6 mx-auto xl:px-10 pb-10">
        @livewire('speaker-listing', ['event' => $event, 'speakers' => $speakers, 'type' => 'main'])
    </div>
@endsection