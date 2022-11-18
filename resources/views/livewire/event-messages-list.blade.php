<div class="col-span-1 bg-white border-l border-gray-300">
            
    <ul class="overflow-auto" style="height: 500px;">
        <h2 class="ml-2 mb-2 text-gray-600 text-lg my-2">Chats</h2>
        @if($chats)
        <li>
            @foreach($chats as $chat)
            @php
                $sender_info = \App\Models\Chat::getChatSender($chat->user_ids);                
                $message = $chat->last_message;
                if(strlen($message) > 40)
                    $message = substr($message, 0, 40).' ...';
            @endphp
            <a wire:click="$emit('switchChat', '{{ $chat->channel }}')" onclick="setActiveChat(this);" class="@if($channel == $chat->channel) bg-gray-200 @endif rhs-chats-list hover:bg-gray-200 border-b border-gray-300 px-3 py-2 cursor-pointer flex items-center text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                <img class="h-10 w-10 rounded-full object-cover"
                src="{{ $sender_info->avatar }}"
                alt="{{ $sender_info->name }}" />
                <div class="w-full pb-2">
                    <div class="flex justify-between">
                        <span class="block ml-2 font-semibold text-base text-gray-600 ">{{ $sender_info->name }}</span>
                        <span class="block ml-2 text-sm text-gray-400" title="{{ $chat->updated_at->format('M d, Y H:i:s') }}">{{ $chat->updated_at->format('H:i:s') }}</span>
                    </div>
                    <span class="block ml-2 text-sm text-gray-600">{{ $message }}</span>
                </div>
            </a>
            @endforeach
        </li>
        @endif
    </ul>

</div>