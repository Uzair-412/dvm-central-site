@php
if($type=='main')
{
    $link = '/speaker/'.$speaker->id;
}
else {
    $link = '/events/'.$event->slug.'/speakers/'.$speaker->id;
}
    $logo = '/static/img/events_placeholder_logo.jpg';
    if($speaker->profile != '')
        $logo = '/up_data/speakers/'.$speaker->profile;
@endphp
@if($type=='main')
    <div class="w-72 card relative overflow-hidden bg-white p-4 shadow flex flex-col justify-center items-center">
    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
@else
    <div class="w-72 shadow-md rounded-md bg-light rounded-lg p-6 flex flex-col justify-center items-center relative">
    <a href="#" class="absolute right-2 top-2 bg-dark rounded-full p-2 cursor-pointer group">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>
        </svg>
    </a>
@endif

    <div class="mb-8">
        <img class="object-center object-cover rounded-full h-36 w-36" src="{{ $logo }}" alt="{{ $speaker->first_name.' '.$speaker->last_name }}">
    </div>
    <div class="text-center mb-4">
        <p class="text-lg text-gray-700 font-bold mb-2"><a href="{{ $link }}"><span class="absolute inset-0"></span>{{ $speaker->first_name.' '.$speaker->last_name }}</a></p>
        <p class="text-base text-gray-400 font-normal mb-2">{{ $speaker->job_title }}</p>
        <p class="text-base text-gray-600 font-normal">{{ $speaker->institute }}</p>
    </div>
</div>