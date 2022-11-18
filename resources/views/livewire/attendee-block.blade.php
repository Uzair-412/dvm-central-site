@php
    $link = '/events/'.$event->slug.'/attendees/'.$attendee->id;
    $logo = '/static/img/events_placeholder_logo.jpg';
    if($attendee->image != '')
        $logo = '/up_data/attendees/images/'.$attendee->image;

    // $name = DB::table('users')->where('id' => $attendee->user)->
@endphp
{{-- @dd($attendee->users->first_name) --}}
<div class="shadow-md rounded-md bg-light rounded-lg p-6 flex flex-col justify-center items-center relative">
    <a href="#" class="absolute right-2 top-2 bg-dark rounded-full p-2 cursor-pointer group">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>
        </svg>
    </a>
    <div class="mb-8">
        <img class="object-center object-cover rounded-full h-36 w-36" src="{{ $logo }}" alt="{{ $attendee->image }}">
    </div>
    <div class="text-center mb-4">
        <p class="text-xl text-gray-700 font-bold mb-2"><a href="{{ $link }}"><span class="absolute inset-0"></span>{{ $attendee->first_name.' '.$attendee->last_name }}</a></p>
        <p class="text-base text-gray-400 font-normal mb-2">{{ $attendee->job_title }}</p>
        <p class="text-base text-gray-600 font-normal">{{ $attendee->institute }}</p>
    </div>
</div>