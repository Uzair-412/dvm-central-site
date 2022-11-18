<article class="mb-5 bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200">
    @if ($event)
    <div class="relative w-full h-80 md:h-64 lg:h-44 p-2">
        <img src="up_data/events/images/{{ $event->image }}" alt="{{ $event->name }}" class="w-full h-full object-contain" />
    </div>
    <div class="px-3 py-4">
        <h3 x-data="{}" class="text-sm text-gray-500 pb-2">
            <a class="card-btn-color py-1 px-2 text-white rounded-lg" href="events/{{ $event->slug }}">
                <span class="absolute inset-0"></span>
                {{ $event->name }}
            </a>
            <span class="pl-10 italic">Dates: {{ Carbon\Carbon::parse($event->start_date)->format('M d, Y') . ' - ' . Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}</span>
        </h3>
    </div>
    @endif
</article>
