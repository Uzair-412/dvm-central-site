@php
$logo = '/static/img/events_placeholder_logo.jpg';
if ($exhibitor_data->image_logo != '') {
    $logo = '/up_data/' . $exhibitor_data->image_logo;
}
$cover = '/static/img/events_placeholder_cover.jpg';
if ($exhibitor_data->image_cover != '') {
    $cover = '/up_data/' . $exhibitor_data->image_cover;
}
@endphp
<div class="relative">
    <img class="hero-img shadow rounded-t w-full object-cover object-center" src="{{ $cover }}"
        alt="{{ $exhibitor_data->display_name }}" />
    <div class="inset-0 m-auto w-24 h-24 absolute bottom-0 -mb-12 sm:ml-10 rounded border-2 shadow border-white">
        <img class="w-full h-full overflow-hidden object-contain bg-white" src="{{ $logo }}"
            alt="{{ $exhibitor_data->display_name }}" />
    </div>
</div>
<div class="px-5 xl:px-10">
    <div class="pt-3 xl:pt-5 flex flex-col sm:flex-row items-start xl:items-center justify-between">
        <div
            class="mt-4 text-center w-full sm:w-auto sm:text-left xl:text-left sm:mb-3 xl:mb-0 items-center justify-between xl:justify-start">
            <h2 class="mt-10 text-lg text-gray-800 tracking-normal">{{ $exhibitor_data->display_name }}</h2>
        </div>

        @if ($edit_mode)
            <p @click="sb_open('edit_company_logos')" class="cursor-pointer text-sm primary-color">Edit</p>
        @else
            <button
                class="primary-bg flex self-center sm:self-end mt-8 transition focus:outline-none duration-150 ease-in-out rounded text-white px-8 py-2 text-sm uppercase">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                    </svg>
                </span>
                Connect
            </button>
        @endif
    </div>
</div>
