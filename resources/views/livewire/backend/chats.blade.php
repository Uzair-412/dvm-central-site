<div>
    @push('after-styles')
        <link href="{{ asset('css/backend/chats.css') }}" rel="stylesheet" />
    @endpush
    <select wire:model="VendorConversation"
        class="p-1 mb-2 border border-solid border-gray-200 focus:outline-none rounded" id="Conversations"
        name="conversations">
        <option value="">Select vendor</option>
        @foreach ($vendors as $key => $vendor)
            <option value="{{ $vendor->user }}">{{ $vendor->contact_name }}</option>
        @endforeach
    </select>
    <div class="border border-solid border-gray-300 p-2 rounded mt-10 max-w-full ">
        <div class="conversation-container">
            <div class="conversation-list">
                <h3 class="text-xl text-center mb-2 text-black width:20%;">Conversations</h3>
                @if (count($chatList) > 0)
                    <ul class="list-none mr-2">
                        @foreach ($chatList as $key => $selected_users)
                            <li id="user-chat"
                                class="border p-2 rounded mb-2 user-chat
                                @if (@$chatCustomer->id == $selected_users->customer->id) active @endif"
                                wire:click="activeUserChat({{ $selected_users->customer->id }},{{ $selected_users->resp_user_id }})">
                                <div class="vendor-chat ">
                                    <span
                                        class="title-word rounded-full bg-facebook text-white capitalize rounded-circle">
                                        {{ strtoupper(substr($selected_users->customer->name, 0, 1)) }}</span>
                                    <span class="capitalize mx-2">{{ $selected_users->customer->name }}</span>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>


            <div class="chat-list bg-gray-100 rounded p-2  min-vh-100">

                @if (count($activeCustomerMessages) > 0)
                    <div class="mb-2 overflow-auto w-full chat-box min-vh-100" style="min-height: 70vh; height: 70vh;">

                        @foreach ($activeCustomerMessages as $messages)
                            @php
                                $time = @$messages->created_at;
                                $time = date('d-M-y,  g:i a', strtotime($time));
                            @endphp
                            @if ($messages['message_type'] == 'Customer')
                                <div class="customer-chat w-full mt-3 text-right mt-3">
                                    <span
                                        class="title-word rounded-full bg-facebook text-white capitalize rounded-circle">
                                        {{ strtoupper(substr(@$selected_users->customer->name, 0, 1)) }}</span>
                                    <span class="text-body border mx-2 py-2 px-3 rounded text-area relative bg-white"
                                        style="max-width: 75%;">{{ $messages['message'] }}</span>
                                </div>
                                <div class="pl-12 pt-0 text-sm text-gray-500 text-right mr-5">{{ $time}}
                                </div>
                            @else
                                <div class="vendor-chat mt-3 w-full">
                                    <span
                                        class="title-word bg-gray-900 text-white rounded-circle">{{ substr($vendor->contact_name, 0, 1) }}</span>
                                    <div class="relative">
                                        <span
                                            class="text-body border ml-2 py-2 px-3 rounded text-area relative bg-white"
                                            style="max-width: 75%;">{{ $messages['message'] }}</span>
                                    </div>
                                </div>
                                <div class="pl-12 pt-0 text-sm text-sm text-gray-500 ml-5 my-1">{{ $time}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- <form id="chat-form" class="flex flex-wrap justify-between">
                            <input type="text" name="" class="w-11/12 border border-gray-300 rounded"
                                placeholder="Type message ..." wire:model="chatInput" />
                            <div class="w-1/12">
                                <input type="submit" value="Send" class="w-full p-2 rounded bg-blue-700 text-white ml-1" />
                            </div>
                        </form> --}}
                @else
                    <div class="flex flex-wrap h-100 justify-center content-center">
                        <h5 class="pt-4"> Here are some of Vendor's
                            conversations with their Customers
                        </h5>
                    </div>
                @endif
            </div>

        </div>
    </div>
    @if (@$chatCustomer)
        <script>
            // function getScrollHeight(selector)
            // {
            //     return document.querySelector(selector).scrollHeight
            // }

            document.querySelector(".chat-box").onscroll = function(ev) {
                if (document.querySelector(".chat-box").scrollTop == 0) {
                    window.Livewire.emit('loadChat', 'onscroll');
                }
            }
            // document.querySelector('#chat-form').addEventListener('submit', async (e) => {
            //     e.preventDefault();
            //     await window.Livewire.emit('chatSubmit');
            //     document.querySelector(".chat-box").scrollTop = await getScrollHeight(".chat-box");
            // });

            document.querySelector(".chat-box").scrollTop = document.querySelector(".chat-box").scrollHeight;

            setInterval(() => {
                window.Livewire.emit('loadChat');
            }, 3000);
        </script>
    @endif

</div>
