<div wire:ignore class="fixed bottom-0 right-0 flex flex-col items-end ml-6 w-full">
    <div class="fixed bottom-0 right-0 flex flex-col items-end ml-6 w-40">
        <div class="chat-modal mr-5 flex flex-col mb-5 shadow-lg">
            <!-- close button -->
            <div
                class="close-chat primary-bg text-white mb-1 w-10 flex justify-center items-center px-2 py-1 rounded self-end cursor-pointer">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                    <path fill-rule="evenodd"
                        d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
                </svg>
            </div>
            <!-- user profile -->
            <div class="flex justify-between items-center text-white p-2 primary-bg border shadow-lg mr-5 w-full">
                <div class="flex items-center">
                    <img src="{{ $avatar }}"
                        alt="{{ $recipient_name }}" class="rounded-full w-8 h-8 mr-1">
                    <h2 class="font-semibold tracking-wider">{{ $recipient_name }}</h2>
                </div>
                <div class="flex items-center justify-center">
                    <small class="mr-1">online</small>
                    <div class="rounded-full w-2 h-2 bg-green-300"></div>
                </div>
            </div>


            <!-- Chat Start -->
            
            @livewire('chat-messages', ['channel' => $chat_data['chat_channel']])

            <!-- send message -->
            <div class="relative bg-white">
                <input wire:keydown.enter="send" type="text" wire:model.defer="message" placeholder="Type something ..."
                    class="pl-4 pr-16 py-2 border border-blue-400 focus:outline-none w-full">
                <button wire:click="send"
                    class="absolute right-0 bottom-0 text-blue-500 bg-white  hover:text-blue-500 m-1 px-3 py-1 w-auto transistion-color duration-100 focus:outline-none">Send</button>
            </div>


            <!-- Chat End -->


        </div>
        <div
            class="show-chat mx-10 mb-6 mt-4 text-green-500 hover:text-green-600 flex justify-center items-center cursor-pointer ">
            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-chat-text-fill" fill="#4BA5DA"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
            </svg>
        </div>
    </div>
</div>
