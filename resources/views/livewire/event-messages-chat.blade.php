<div>
    <div class="flex items-center border-b border-gray-300 pl-3 py-3">
        @if($sender)
        <img class="h-10 w-10 rounded-full object-cover"
        src="{{ $sender->avatar }}"
        alt="{{ $sender->name }}" />
        <span class="block ml-2 font-bold text-base text-gray-600">{{ $sender->name }}</span>
        <span class="connected text-green-500 ml-2" >
            <svg width="6" height="6">
                <circle cx="3" cy="3" r="3" fill="currentColor"></circle>
            </svg>
        </span>
        @else
            <img class="h-10 w-10 rounded-full object-cover"
            src="/static/img/users/avatar.png"
            alt="" />            
        @endif
    </div>
    <div id="chat" class="w-full overflow-y-auto p-10 relative chat-services" style="height: 55vh;" ref="toolbarChat">
        <ul>
            <li class="clearfix2">
                @if($messages)
                @foreach($messages as $message)
                    <div x-data="{showTime: false}" x-on:click="showTime = !showTime" class="my-2 p-2 rounded-md shadow w-80 @if($message->user_id == session()->get('ses_user_id')) bg-blue-400 text-white float-right @else bg-gray-200 text-gray-700 float-left @endif">
                        {{ $message->message }}
                        <div x-show="showTime" class="text-xs @if($message->user_id == session()->get('ses_user_id')) text-blue-200 @else text-gray-500 @endif">{{ $message->created_at->format('M d, Y H:i:s') }}</div>
                    </div>
                    <div class="clear-both"></div>
                @endforeach
            @endif
            </li>
        </ul>
    </div>

    <div class="w-full py-3 px-3 flex items-center justify-between border-t border-gray-300">
        <input wire:keydown.enter="send" wire:model.defer="message" aria-placeholder="Type something ..." placeholder="Type something ..."
            class="py-2 mx-3 pl-5 block w-full rounded-full bg-gray-100 outline-none focus:text-gray-700" type="text" name="message" required/>

        <button wire:click="send" class="outline-none focus:outline-none" type="button">
            <svg class="text-gray-400 h-7 w-7 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
        </button>        
    </div>
</div>
