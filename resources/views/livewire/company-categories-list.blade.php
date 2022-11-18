<div class="categories">
    <p class="text-sm text-gray-800 font-semibold pt-3 pb-2 mr-6">Categories
    </p>
    <div class="flex">
        @if($categories)
            @foreach($categories as $category)
                <span class="rounded-full px-4 mr-2 primary-bg text-white p-2 rounded  leading-none flex items-center">
                    {{ $category->name }}
                </span>
            @endforeach
        @endif    
    </div>
</div>