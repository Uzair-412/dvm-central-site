<div class="flex flex-col bg-gray-200 px-2 chat-services overflow-auto">
    @if($messages)
        @foreach($messages as $message)
            <div x-data="{showTime: false}" x-on:click="showTime = !showTime" class="my-2 p-2 rounded-md shadow @if($message->user_id == session()->get('ses_user_id')) message bg-blue-400 text-white self-end ml-3 @else chat bg-white text-gray-700 self-start mr-3 @endif">
                {{ $message->message }}
                <div x-show="showTime" class="text-xs @if($message->user_id == session()->get('ses_user_id')) text-blue-200 @else text-gray-500 @endif">{{ $message->created_at->format('M d, Y H:i:s') }}</div>
            </div>
        @endforeach
    @endif
</div>
