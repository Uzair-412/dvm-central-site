{{-- @php
    dd($event->slug);
@endphp --}}

<div class="max-w-lg mx-auto">
    <div class="bg-white border border-gray-200 max-w-sm mb-5 overflow-hidden rounded-lg shadow-md">
        <a href="/events/{{$event->slug}}/webinars/{{$webinar->id}}">
            <img class="rounded-t-lg" style="height: 197px !important; width: 100% !important;" src="{{ asset('up_data/webiners/images/'.$webinar->image) }}" alt="">
        </a>
        <div class="p-5">
            <a href="/events/{{$event->slug}}/webinars/{{$webinar->id}}">
                <h5 class="font-bold mb-2 text-gray-900 text-lg tracking-tight">{{$webinar->name}}</h5>
            </a>
            <p class="font-normal text-gray-700 mb-3 text-justify">{{ Str::limit($webinar->short_detail, 100) }}</p>
            <div>
                <a class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="/events/{{$event->slug}}/webinars/{{$webinar->id}}">
                    Read more
                </a>
            </div>
        </div>
    </div>
</div>