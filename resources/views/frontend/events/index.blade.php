@extends('frontend.layouts.virtual')
@section('title', 'Virtual Event Platform | Webinars | Veterinary Nurse | Vet Tech')
@section('meta_description', 'Earn CE credits with free access to webinars providing information and updates on the latest veterinary practices and protocols. Stay here for live webinars.')
@section('meta_keywords', 'Live Webinars, Virtual Event Platform, Veterinary Nurses, Earn CE Credits, CE Points, Vet Tech')
@section('content')

<!-- Exhibitors section-->
<div class="pt-14">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 mt-12 mb-12 shadow p-5">
        <article>
            <h2 class="text-2xl font-extrabold text-gray-900">Events</h2>
            <div class="mt-6 gap-x-6 gap-y-8">
                
                @foreach($data['events'] as $event)
                    <livewire:event-block :event="$event" />
                @endforeach

            </div>
        </article>
    </section>
</div>
@endsection
