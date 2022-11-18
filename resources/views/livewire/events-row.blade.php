<tr class="bg-white dark:bg-gray-700 dark:text-white">
    <td class="px-3 py-2 md:px-6 md:py-3">
        <p>{{ $e->name }}</p>
    </td>
    <td class="px-3 py-2 md:px-6 md:py-3">
        <p class="capitalize">{{ $e->type }}</p>

    </td>
    <td class="px-3 py-2 md:px-6 md:py-3">
        <p>{{ $e->attendee_registration_fee }}</p>
    </td>
    <td class="px-3 py-2 md:px-6 md:py-3">
        {{ Carbon\Carbon::parse($e->start_date)->format('M d, Y') }}
        @if (Carbon\Carbon::parse($e->start_date)->format('H:i') != '00:00')
            {{ Carbon\Carbon::parse($e->start_date)->format('H:i') }}
        @endif
    </td>
    <td class="px-3 py-2 md:px-6 md:py-3">
        {{ Carbon\Carbon::parse($e->end_date)->format('M d, Y') }}
        @if (Carbon\Carbon::parse($e->end_date)->format('H:i') != '00:00')
            {{ Carbon\Carbon::parse($e->end_date)->format('H:i') }}
        @endif
    </td>

    <td class="px-3 py-2 md:px-6 md:py-3">
        <div class="inline-flex">
            @if ($e->type != 'live')
                <div class="inline-flex">
                    @if ($e->attendee_participated())
                        <a target="_blank"
                            href="{{ config('app.client_url') . 'events/' . $e->slug . $e->attendee_participated() }}"
                            class="bg-blue-600 text-white uppercase text-xs py-2 px-3 rounded focus:outline-none">
                            Access Portal
                        </a>
                    @else
                        <button wire:click="participate({{$e->id}},{{ session()->get('ses_attendee')['attendee_user']['id'] }})"
                            class="bg-pink-600 text-white uppercase text-xs py-2 px-3 rounded focus:outline-none">
                            Participate
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </td>
</tr>
