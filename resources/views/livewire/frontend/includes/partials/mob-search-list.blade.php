<div>
    <form action="/search-results" class="input-wrapper flex items-center relative z-20 border-b border-solid border-gray-300 relative">
        <input type="search" name="s" placeholder="I am shopping for ..." wire:model="mobileSearchInput"
            class="mob-search-bar p-3 focus:outline-none text-gray-500 w-full h-auto" />
        <button type="submit" class="h-10 w-10 absolute right-0 cursor-pointer p-1 lite-blue-bg-color h-full">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 px-1" fill="none"
                viewBox="0 0 26 26" stroke="#fff">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
    </form>

    <!-- search results -->
    <div class="search-results-container mob-search-resutls-container text-sm absolute top-auto left-0 w-full h-auto border border-solid border-gray-200 bg-white z-30 @if (count(@$searchList) == 0) hidden opacity-0 @endif transition-all duration-300 ease-in-out overflow-y-scroll">
        <div class="search-results-wrapper w-full h-full">
            @if (count(@$searchList) > 0)
                @foreach ($searchList as $product)
                    @php
                        $product = (object) $product;
                        $alt = Str::replace('"', ' inch', $product->name);
                        $url = $product->slug;
                        if ($product->type == 'child' && $product->show_individual == 'N') {
                            if ($force_link) {
                                $url = $force_link . '#' . $product->sku;
                            } else {
                                $url = \App\Models\Product::getParentSlug($product->id) . '#' . $product->sku;
                            }
                        } elseif ($product->show_individual == 'Y' && $product->link_type == 'variation') {
                            $url = \App\Models\Product::getParentSlug($product->id) . '#' . $product->sku;
                        }
                        $img_path = 'products/images/thumbnails/' . $product->image;
                        $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                        $product->url = $product->slug;
                        $info = \App\Models\Product::getPriceText($product);
                    @endphp
                    @if ($product->type == 'variation')
                        <a href="{{ $url }}"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center mr-2">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="{{ $path }}" alt="{{ $alt }}">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        {{ $product->name }}
                                    </div>
                                    <div
                                        class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                        Multiple
                                        SKUs, Click for Details</div>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ $url }}"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center mr-2">
                                <div class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="{{ $path }}" alt="{{ $alt }}">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold text-sm md:text-base">
                                        {{ $product->name }}
                                    </div>
                                    <div class="search-result-item-sku text-xs md:text-sm"><span
                                            class="text-gray-500">SKU :
                                        </span><strong
                                            class="sku ml-2 lite-blue-color">{{ $product->sku }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold">
                                ${{ number_format($info['price'] - $info['discount'], 2) }}
                            </div>
                        </a>
                    @endif
                @endforeach
                <a href="/search-results?s={{ $mobileSearchInput }}"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="search-result-item-title font-semibold w-full text-center">View All</div>
                </a>
            @endif
        </div>
    </div>
</div>
