<div class="flex flex-col py-2">
    <div class="flex space-x-3">
        @foreach($socials as $social)
            @php
                $sm_link = $social->prefix.$social->pivot->link;
                if($social->name != 'Skype')
                    $sm_link = 'https://'.$sm_link;
            @endphp
            <a 
            class="rounded-full h-8 w-8 flex items-center justify-center text-white" 
            style="background-color: {{ $social->color_code }}" 
            href="{{ $sm_link }}" 
            target="_blank">
                <i class="{{ $social->icon_code }}"></i>
            </a>
        @endforeach
    </div>
</div>