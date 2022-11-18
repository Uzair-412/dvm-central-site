@extends('frontend.layouts.virtual')

@section('content')

<!-- hero section with video-->
<section id="hero-video" class="bg-transparent w-full">
	<video autoplay loop muted class="w-full">
		<source src="/up_data/events/videos/{{ $event->video }}" type="video/mp4" />
	</video>
</section> 

@if(trim(strip_tags($event->full_description)) != null)
	<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 mt-12 mb-12">
		{!! $event->full_description !!}
	</section>
@endif

<!-- Exhibitors section-->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 mt-12 mb-12 shadow p-10">
	<article>
		<h2 class="text-2xl font-extrabold text-gray-900">Exhibitors</h2>
		<div class="mt-6 grid md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
			
			@foreach($data['exhibitors'] as $exhibitor)
				<livewire:exhibitor-block :exhibitor="$exhibitor" :event="$event" />
			@endforeach

		</div>
	</article>
</section>
  
@endsection