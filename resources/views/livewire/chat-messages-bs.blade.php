<div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height: 400px !important; width:100%;">
    @if($messages)
        @foreach($messages as $message)
        <div class="media media-chat p-2 rounded-xl @if($message->message_type == 'Customer') lite-blue-color bg-blue-100 mr-5 rounded-bl-none @else bg-gray-50 border rounded-tr-none ml-3 mr-2 @endif mb-2">
            <div class="media-body">
                <p class="mb-0">{{ $message->message }}</p>
                <p class="pt-0 mt-0 meta text-gray-500"><small>{{ $message->created_at->format('M d, Y H:i:s') }}</small></p>
            </div>
        </div>
        @endforeach
    @endif

    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px">
        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px"></div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px">
        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px"></div>
    </div>
</div>
