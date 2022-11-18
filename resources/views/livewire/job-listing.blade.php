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
                                <input class="w-full h-10 rounded text-sm" wire:keydown="refine" wire:model="search" type="search" placeholder="Search" />
                            </div>
                        </div>
                        <div class="filter-category-container flex-col w-full">
                            <p class="text-normal text-gray-800 font-semibold pt-3 pb-2 mr-6">Filters</p>
                            <p class="text-sm text-gray-800 font-semibold pt-3 pb-2 mr-6 primary-color flex justify-between">
                                <span>Categories </span>
                            </p>
                            <div class="filter-category" wire:ignore>
                                @foreach($categories as $category_id => $category_name)
                                <div class="category flex items-center mt-2">
                                    <label><input type="checkbox" class="mr-2" wire:model="categoryIds" value="{{ $category_id }}" />
                                    <span class="text-sm">{{ $category_name }}</span></label> 
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3">
            <div class="pb-5 text-3xl"><h1>Job Listings</h1></div>

            @if(count($jobs) > 0)


    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
        
        @foreach ($jobs as $job)

            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover"
                    style="background-image: url('up_data/{{ $job->image1 }}')">
                    <span wire:click="open_job({{ $job->id }})" class="-mb-4 bg-blue-400 cursor-pointer hover:bg-blue-500 mx-2 rounded text-center text-white w-8 p-1">
                        <i class="fa fa-eye"></i>
                    </span>                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700">{{ $job->name }}</h3>
                    <span class="text-gray-500 mt-2">
                        {{ $categories[$job->category_id] }}
                    </span>
                </div>
            </div>

        @endforeach

    </div>

    

    
    <div class="job-detail-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7); display:none;">

        <div @click.away="closeModal('job-detail-modal')"
            class="md:flex md:mx-auto mx-6 my-40 shadow-lg w-8/12 bg-white rounded">
            <img class="h-full w-full md:w-1/3  object-cover rounded-lg pb-5/6 zoom" src="" alt=""
                id="job_main_image">
            <div class="w-full md:w-2/3 px-4 py-4 bg-white rounded-r-lg">
                <div class="flex items-center">
                    <h2 class="text-xl text-gray-800 font-medium mr-auto" id="job_heading"></h2>
                </div>
                <p class="text-sm text-gray-700 mt-4" id="job_description"></p>
                <p class="text-sm text-gray-700 mt-4" id="job_category"></p>
                <p class="text-sm text-gray-700 mt-4" id="job_link"></p>
            </div>
            <div class="relative">
                <div onclick="closeModal('job-detail-modal');" class="absolute right-0 top-0 cursor-pointer"
                    style="left: -7px; top: -12px;"><i class="fas fa-times-circle text-white"></i></div>
            </div>
        </div>
    </div>

    @else

        <div class="pt-2 text-gray-500 text-sm">Sorry, no job listings found.</div>

    @endif
        </div>
    </div>

    
    
    
    

</div>
