<div wire:ignore>
    <div class="cursor-pointer bottom-24 chat-icon fixed right-2 xl:bottom-10 xl:right-6 z-20">
        @if(auth()->user())
        <div id="chat-box-container" class="w-96 bg-white border hidden">
            <div class="p-4">
                <div class="flex flex-wrap justify-between">
                    <h4 class="card-title"><strong>{{ $recipient_name }}</strong></h4>
                    <svg xmlns="http://www.w3.org/2000/svg" class="chat-close-icon h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="rgb(248,113,113)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                @livewire('chat-messages', ['chat_type' => 'site', 'channel' => $chat_data['chat_channel'], 'vendor_id' => $vendor_id])

            </div>
            <div class="bg-gray-100 flex flex-wrap justify-between p-4">
                <input class="w-5/6 bg-transparent" wire:keydown.enter="send" type="text" wire:model.defer="message" placeholder="Type something ..." />
                <button wire:click="send" class="transform rotate-45" data-abc="true" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#418ffe">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                </button>
            </div>
        </div>
        @endif
        <div class="flex justify-end">
            <svg @if(!auth()->user()) data-toggle="modal" data-target="#loginModal" @endif xmlns="http://www.w3.org/2000/svg" id="chat-icon" class="chat-icon h-10 w-10" viewBox="0 0 20 20" fill="#418ffe">
                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>

@push('after-scripts')
    
    <script>
        document.querySelector('.chat-icon').addEventListener('click', (e) => {
            let user = <?php echo json_encode(auth()->user()); ?>;
           if(!user){
            showAlert(error_message ='Please Login Before Initiating Chat To The Vendor', {
                text: 'Login',
                link: '/login',
                type: 'error'
            });
           }
        });
        
        document.querySelector('.chat-close-icon')?.addEventListener('click', (e) => {
            document.querySelector('#chat-box-container').classList.toggle('hidden');
        });

        document.querySelectorAll('#chat-icon, .chat-btn').forEach((btn) => {
            btn.addEventListener('click', (e) => { 
                document.querySelector('#chat-box-container')?.classList.toggle('hidden');
            });
        });
    </script>
@endpush
