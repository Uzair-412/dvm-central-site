<div>
    <div class="notification-body-container cursor cursor-pointer">
        <div class="bg-white border border-gray-200 border-solid db-detail db-links grid grid-cols-5 items-center mt-5 overflow-hidden px-4 py-2 relative z-10">
            <div class="col-span-4 font-semibold mb-2 notification-body text-xl">{{ $details['title'] }}</div>
            <div class="notification-body col-span-4">{{ $details['body'] }}</div>
            <a href="/dashboard/notifications" class="go-back-button border border-2 bg-blue-500 text-white rounded px-2 py-1 w-1/3 ml-auto text-center">Back</a>
        </div>
    </div>
</div>
