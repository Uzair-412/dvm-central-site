<div>
@push('after-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/user-chat.css') }}" />
@endpush
    <div class="flex justify-between items-center pb-4 border-b border-dashed border-gray-200">
        <div class="user-title text-xl md:text-2xl font-semibold">Start Chatting</div>
    </div>

    <div class="mt-5 w-full">
        <div class="chat-col-container p-2 sm:p-4 bg-white border border-solid border-gray-200 overflow-hidden">
            <div class="flex h-auto text-gray-500">
                <div class="flex flex-row h-full w-full relative">
                    <!-- left-col -->
                    <div class="left-col flex flex-col w-full md:w-4/12 xl:w-64 bg-white flex-shrink-0">
                        @if(@$chatUser)
                            <div class="flex flex-col items-center border border-gray-200 w-full py-6 px-4">
                                <div class="h-28 w-28 overflow-hidde rounded-full border">
                                    @php
                                        $img_path = @$chatUser->logo ? '/up_data/vendors/logo/'.@$chatUser->logo : '';
                                        $path = $img_path!='' && Storage::disk('ds3')->exists($img_path) ? $img_path : '/assets/imgs/avatar.jpg';
                                    @endphp
                                    <img src="{{ @$path }}" alt="{{ @$chatUser->name }}" class="h-full w-full object-contain rounded-full" />
                                </div>
                                <div class="user-name text-sm md:text-base font-semibold mt-2 primary-black-color">{{ @$chatUser->name }}</div>
                                <div class="user-title text-xs text-gray-500">Seller</div>
                            </div>
                        @endif
                        <div class="flex flex-col mt-4 conversation-wrapper">
                            <div class="my-4">
                                <input type="text" placeholder="Search chatting" wire:model="searchInput" class="p-2 border border-gray-200 w-full text-xs md:text-sm" />
                            </div>
                            <div class="flex flex-row items-center justify-between text-sm md:text-base">
                                <span class="font-semibold primary-black-color">Active Conversations</span>
                                <span class="active-chat-no flex items-center justify-center lite-blue-bg-color text-white h-4 w-4 text-xs md:text-sm">{{ count($activeUsers) }}</span>
                            </div>
                            <div class="flex flex-col mt-2 h-full overflow-y-auto border border-solid border-gray-200 chat-with-wrapper">
                                @foreach($activeUsers as $key => $user)
                                    <button wire:click="activeUserChat({{ $user->user->id }})" class="sender-wrapper flex flex-row items-center transition-all duration-300 hover:bg-gray-100 p-2 border-b border-solid border-gray-200">
                                        @if(!empty($user->vendor->name))
                                            <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 text-gray-100">{{ strtoupper(substr($user->vendor->name, 0, 1)) }}</div>
                                        @endif
                                        @if(!empty($user->vendor->name))
                                            <div class="ml-2 text-sm">{{ $user->vendor->name }}</div>
                                        @endif
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- right-col & messages container -->
                    <div class="chat-msgs-container fixed top-0 left-0 w-full h-screen md:relative z-50 md:z-0 md:inline-flex flex-col flex-auto md:h-full md:ml-4">
                        <div class="chat-msgs-wrapper flex flex-col flex-auto flex-shrink-0 bg-gray-100 border border-solid border-gray-200">
                            @if(count($activeUserMessages) > 0)
                                <div class="chat-msgs-inner-wrapper flex flex-col h-full overflow-y-auto mb-4 p-2 md:pr-0 lg:p-4 lg:pr-0 h-screen">
                                    <div class="flex flex-col h-full">
                                        <div class="grid grid-cols-1 gap-4 md:gap-2 relative">
                                            <div class="cursor-pointer inline-block md:hidden rounded-full border border-solid border-black bg-white fixed top-5 right-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="chat-close-btn h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            @foreach($activeUserMessages as $key => $messages)
                                                @if($messages->message_type=='Customer')
                                                    <div class="md:p-3 user-chat-wrapper chat-msg-wrapper">
                                                        <div class="flex flex-row items-center">
                                                            <div class="flex items-center justify-center py-1.5 px-3 lite-blue-bg-color text-white flex-shrink-0">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                                            <div class="relative ml-2 md:ml-3 text-xs md:text-sm bg-white p-2 md:py-2 md:px-4 max-w-md">
                                                                <div class="user-chat">{{ $messages->message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="md:p-3 my-chat-wrapper chat-msg-wrapper">
                                                        <div class="flex items-center justify-start flex-row-reverse">
                                                            <div class="flex items-center justify-center py-1.5 px-3 primary-black-bg text-white flex-shrink-0">{{ substr($messages->vendor->name, 0, 1) }}</div>
                                                            <div class="relative mr-2 md:mr-3 text-xs md:text-sm bg-gray-200 p-2 md:py-2 md:px-4">
                                                                <div class="my-chat">{{ $messages->message }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach 
                                        </div>
                                    </div>
                                </div>
                                <form id="chat-form" class="flex sm:flex-row items-center h-16 bg-gray-100 w-full p-2 md:p-4 border-t border-solid border-gray-200 chat-send-input-btn-wrapper">
                                    <div class="flex-grow">
                                        <div class="relative w-full">
                                            <input type="text" required class="flex w-full border focus:outline-none focus:border-indigo-300 p-2 md:p-4 h-10 text-xs md:text-sm" wire:model="chatInput" placeholder="Type message ..." />
                                        </div>
                                    </div>
                                    <div class="ml-2 md:ml-4 chat-send-btn-wrapper">
                                        <button wire:click="chatSubmit" class="flex items-center justify-center btn blue-btn lite-blue-bg-color relative overflow-hidden z-10 text-white p-2 md:px-4 md:py-2 text-xs md:text-sm">
                                            <span>Send</span>
                                            <span class="ml-2 h-auto hidden md:inline-block">
                                                <svg class="w-4 h-4 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="chat-msgs-inner-wrapper flex flex-col h-full overflow-y-auto mb-4 p-2 md:pr-0 lg:p-4 lg:pr-0 h-screen">
                                    <div class="flex flex-wrap h-screen items-center justify-center text-center">
                                        <div>
                                            <h3 class="w-full text-2xl text-black">Welcome <span class="lite-blue-color capitalize">{{ Auth::user()->name }}</span></h3>
                                            <p class="">Here are some of your's conversations to chat with Seller</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getScrollHeight(selector)
        {
            return document.querySelector(selector).scrollHeight;
        }
    </script>
    @if(@$chatUser)
        <script>
            document.querySelector('.chat-msgs-inner-wrapper').scrollTop = document.querySelector('.chat-msgs-inner-wrapper').scrollHeight;
            
            document.querySelector('#chat-form').addEventListener('submit', async (e) => {
                e.preventDefault();
                await window.Livewire.emit('chatSubmit');
                setTimeout(() => {
                    document.querySelector('.chat-msgs-inner-wrapper').scrollTo(0, document.querySelector('.chat-msgs-inner-wrapper').scrollHeight);
                }, 5000);
            });
            
            document.querySelector('#chat-form').addEventListener('submit', async (e) => {
                window.addEventListener('scroll-chat-to-end', (event) => {
                    scroll_chat_to_bottom();
                });
            });

            setInterval(() => {
                window.Livewire.emit('loadChat');
            }, 4000);

            function scroll_chat_to_bottom() {
                document.querySelector('.chat-msgs-inner-wrapper').scrollTop=document.querySelector('.chat-msgs-inner-wrapper').scrollHeight;
            }
        </script>
    @endif
@push('after-scripts')
<script src="{{ asset('assets/js/user-chat.js') }}"></script>
@endpush
</div>
