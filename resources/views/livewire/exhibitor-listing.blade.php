<div class="flex flex-wrap">
    
    <div class="grid grid-cols-4 gap-4">
        <div>
            <div class="left-side w-full pb-8 md:pb-0 md:pr-6">
                <div class="bg-white shadow p-4 rounded">
                    <div class="flex flex-wrap">
                        <div class="w-full mb-4 flex-c items-center pb-4 border-b">
                            <p class="text-sm mb-2">Refine the list (min. 2 characters)</p>
                            <div class="search-input-wrapper flex border items-center w-full">
                                <span class="mr-4 pl-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input class="w-full h-10 rounded text-sm" wire:model="search" type="search" placeholder="Search" />
                            </div>
                        </div>
                        <div class="filter-category-container flex-col w-full">
                            <p class="text-normal text-gray-800 font-semibold pt-3 pb-2 mr-6">Filters</p>
                            
                            <p class="text-sm text-gray-800 font-semibold pt-3 pb-2 mr-6 primary-color flex justify-between">
                                <span>Categories</span>
                            </p>
                            <div class="filter-category" wire:ignore>
                                @foreach($categories as $category)
                                <div class="category flex items-center mt-2">
                                    <label><input type="checkbox" class="mr-2" wire:model="categoryIds" value="{{ $category->id }}" />
                                    <span class="text-sm">{{ $category->name }}</span></label> 
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3">

            <div class="pb-5 text-3xl"><h1>Exhibitors</h1></div>
            
            @if(count($exhibitors) > 0)

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    
                    @foreach($exhibitors as $exhibitor)
                        <livewire:exhibitor-block :exhibitor="$exhibitor" :event="$event" :key="$exhibitor->id" />
                    @endforeach

                </div>

            @else

        <div class="pt-2 text-gray-500 text-sm">Sorry, no exhibitors found.</div>

        @endif
        </div>
    </div>

</div>
