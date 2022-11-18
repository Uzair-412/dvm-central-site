<div>
    <div class="grid grid-cols-3 min-w-full border rounded">
            
        <div class="col-span-2 bg-white">
            <div class="w-full">
                
                @livewire('event-messages-chat')
                
            </div>
        </div>

        @livewire('event-messages-list')

    </div>
</div>
@push('after-scripts')
    <script>
        setInterval(() => {
            Livewire.emit('messageCentre');
        }, 5000);
    </script>
@endpush