<div class="contact-detail-wrapper">
    @if (trim($exhibitor_data->mobile) != null)
        <div class="call flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="#333">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <p class="text-sm"><a href="tel:{{ $exhibitor_data->mobile }}">{{ $exhibitor_data->mobile }}</a>
            </p>
        </div>
    @endif

    @if (trim($exhibitor_data->phone) != null)
        <div class="call flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="#333">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 3l-6 6m0 0V4m0 5h5M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
            </svg>
            <p class="text-sm"><a href="tel:{{ $exhibitor_data->phone }}">{{ $exhibitor_data->phone }}</a></p>
        </div>
    @endif

    @if (trim($exhibitor_data->email) != null)
        <div class="email flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="#333">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <p class="text-sm"><a href="mailto:{{ $exhibitor_data->email }}">{{ $exhibitor_data->email }}</a>
            </p>
        </div>
    @endif

    @if (trim($exhibitor_data->website) != null)
        <div class="web flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                stroke="#333">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
            </svg>
            <p class="text-sm"><a href="{{ $exhibitor_data->website }}">{{ $exhibitor_data->website }}</a>
            </p>
        </div>
    @endif

    @if (trim($exhibitor_data->address) != null)
        <div class="location flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                stroke="#333">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <p class="text-sm">
                {{ $exhibitor_data->address . ', ' . $exhibitor_data->street . ', ' . $exhibitor_data->city . ', ' . $exhibitor_data->zip . ', ' . $exhibitor_data->state . ', ' . $exhibitor_data->country }}
            </p>
        </div>
    @endif
</div>
