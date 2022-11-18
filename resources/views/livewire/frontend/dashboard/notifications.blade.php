<div>   
    <div class="uploading-section">
         <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200">Notifications</div>
        @include('includes.partials.messages')
        @if(isset($notifications) && $notifications->count() > 0)
            @foreach ($notifications as $notification)
                <a href="/dashboard/notifications/{{$notification->id}}">
                    <div class="notification-title-container cursor cursor-pointer @if($notification->seen == 0) text-blue-600 @endif">
                        <div class="bg-white border relative border-gray-200 border-solid db-detail db-links grid grid-cols-5 items-center mt-5 overflow-hidden px-4 py-2  z-10">
                            <div class="notification-title col-span-4 relative">{{ $notification->title }}
                                @if($notification->seen == 0)
                                <span class="absolute animate-pulse bg-white border border-2 lite-blue-bg-color ml-2 mt-1 px-1 text-center text-white text-xs">
                                    New
                                </span>
                                @endif
                            </div>
                            <div class="notification-time ml-8">{{  $notification->created_at }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
        <div class="mt-4 text-blue-400 text-center">You have no notifications yet</div>    
        @endif
    </div>
</div>
