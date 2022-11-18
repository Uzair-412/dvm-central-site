@push('after-styles')
    <style>
        tr:nth-child(even) {
            background: rgba(249, 250, 251, var(--tw-bg-opacity));
        }

    </style>
@endpush
<div>
    <div class="md:flex md:justify-between px-6 py-2 md:p-0">
        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">
            <div class="flex rounded-md shadow-sm">
                <input class="border h-10 mb-3 px-3 rounded text-sm w-full" wire:model="search" type="search"
                    placeholder="Search" />
            </div>
        </div>
    </div>
    <table class="border dark:divide-none divide-gray-200 divide-y min-w-full">
        <thead>
            <tr>
                <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                    <button 
                        class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline dark:text-gray-400">
                        <span>Name</span>
                    </button>
                </th>
    
                <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                    <button 
                        class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline dark:text-gray-400">
                        <span>Type</span>
                    </button>
                </th>
    
                <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                    <button 
                        class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline dark:text-gray-400">
                        <span>Attendee Registration Fee</span>
                    </button>
                </th>
    
                <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                    <button 
                        class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline dark:text-gray-400">
                        <span>Start Date</span>
                    </button>
                </th>
    
                <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                    <button 
                        class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline dark:text-gray-400">
                        <span>End Date</span>
                    </button>
                </th>
    
                <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                    <span
                        class="block text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
    
                    </span>
                </th>
            </tr>
        </thead>
        
        <tbody class="bg-white divide-y divide-gray-200 dark:divide-none">
            @foreach ($events as $e)
                <livewire:events-row :e="$e" :key="$e->id" />
            @endforeach
        </tbody>
    
    </table>
    <div>
        {{-- @dd($links) --}}
        {{-- {{ $events->links() }} --}}
    </div>
</div>


