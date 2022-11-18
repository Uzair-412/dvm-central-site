@php 
    if (session()->has('ses_exhibitor') || session()->has('ses_attendee')) {
        // if (session()->has('ses_exhibitor') && $exhibitor->vendor_id == session()->get('ses_exhibitor')['vendor_event']->vendor_id) {
        //     $link = session()->get('ses_exhibitor')['link'] ? session()->get('ses_exhibitor')['link'] : App\Models\EventVendors::getLink($exhibitor, $event, 'edit');
        // }else{
        //     $link = App\Models\EventVendors::getLink($exhibitor, $event);
        // }
        $link = App\Models\EventVendors::getLink($exhibitor, $event);
    }else{
        $link = 'javascript:;';
    }
    $categories = App\Models\EventsCategories::getExhibitorCategoriesById($exhibitor->id);
    $logo = '/static/img/events_placeholder_logo.jpg';
    if($exhibitor->image_logo != '')
        $logo = '/up_data/'.$exhibitor->image_logo;
@endphp
{{-- @dd($exhibitor->vendor_id) --}}
{{-- @dd(session()->get('ses_exhibitor')['link']) --}}
<article class="bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200">
    <div class="relative w-full h-80 md:h-64 lg:h-44 p-2">
        <img src="{{ $logo }}" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="w-full h-full object-contain" />
    </div>
    <div class="px-3 py-4">
        <h3 x-data="{}" class="text-sm text-gray-500 pb-2">
            <a class="card-btn-color py-1 px-2 text-white rounded-lg" href="{{ $link }}" @if(session()->has('ses_exhibitor') || session()->has('ses_attendee')) @else @click="$dispatch('open-login', 'y')" @endif>
                <span class="absolute inset-0"></span>
                {{ $exhibitor->display_name }}
            </a>
        </h3>
        <p class="text-base text-gray-900">
            @if($categories)
                @php
                    $index = 0;
                @endphp
                @foreach($categories as $category)
                    @php
                        $index++;
                    @endphp
                    {{ $category->name }}@if(count($categories) > $index), @endif
                @endforeach
            @endif    
        </p>
        @if(session()->has('ses_exhibitor') && $exhibitor->vendor_id == session()->get('ses_exhibitor')['vendor_event']->vendor_id)
        @else
            <a href="#" class="absolute bottom-2 right-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        @endif
    </div>
</article>