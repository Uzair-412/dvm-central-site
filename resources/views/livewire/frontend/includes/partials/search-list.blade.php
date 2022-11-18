<div>
    <div class="header-input-bg fixed w-screen h-screen top-0 left-0 z-30 @if ($scollHeader == true || strlen($searchInput) == 0) hidden opacity-0 @endif transition duration-500 ease-in-out">
    </div>
    <form action="/search-results"
        class="input-wrapper my-1 flex justify-between items-center relative z-40 border border-solid border-gray-300 overflow-hidden bg-white">
        <input type="search" name="s" placeholder="I am shopping for ..." wire:model="searchInput"
            class="desktop-search-bar p-3 focus:outline-none text-gray-500 w-full h-auto"
            autocomplete="off" />
        <button type="submit"
            class="btn blue-btn px-6 py-3 w-max  lite-blue-bg-color text-white relative overflow-hidden h-full z-10">Search</button>
    </form>
    <!-- search results -->
    <div class="search-results-container desk-search-resutls-container absolute top-auto left-0 w-full h-auto border border-solid border-gray-200 bg-white z-30 @if ($scollHeader == true || strlen($searchInput) == 0) hidden opacity-0 @endif transition-all duration-300 ease-in-out overflow-y-scroll">
        <div class="search-results-wrapper w-full">
            @if ($searchList != null && count(@$searchList) > 0)
                @foreach ($searchList as $product)
                    @php
                        $product = (object) $product;
                        $alt = Str::replace('"', ' inch', $product->name);
                        $url = $product->slug;

                        if ($product->type == 'child' && $product->show_individual == 'N') {
                            if (isset($force_link)) {
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
                            <div class="flex items-center">
                                <div
                                    class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="{{ $path }}" alt="{{ $product->name }}">
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        {{ $product->name }}
                                    </div>
                                    <div
                                        class="search-result-item-multiple-sku text-red-500 leading-snug mt-2 text-sm">
                                        Multiple SKUs, Click for Details</div>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ $url }}"
                            class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                            <div class="flex items-center">
                                <div
                                    class="search-result-item-img border border-solid border-gray-200 mr-2">
                                    <img src="{{ $path }}" alt="{{ $product->name }}" />
                                </div>
                                <div class="search-result-item-detail flex flex-col">
                                    <div class="search-result-item-title font-semibold">
                                        {{ $product->name }}</div>
                                    <div class="search-result-item-sku text-sm">
                                        <span class="text-gray-500">SKU : </span>
                                        <strong
                                            class="sku ml-2 lite-blue-color">{{ $product->sku }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="search-result-item-price font-semibold text-lg">
                                ${{ number_format($info['price'] - $info['discount'], 2) }}
                            </div>
                        </a>
                    @endif
                @endforeach
                <a href="/search-results?s={{ $searchInput }}"
                    class="search-result-item flex w-full items-center justify-between border-b border-solid border-gray-200 p-2 hover:bg-gray-100 transition-all duration-200 ease-in-out">
                    <div class="search-result-item-title font-semibold w-full text-center">View All</div>
                </a>
            @endif
        </div>
    </div>
</div>
