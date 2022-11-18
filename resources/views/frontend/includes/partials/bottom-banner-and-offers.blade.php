<section class="special-offers pt-10">
    <div class="special-offers-wrapper width">
        <div class="imgs-wrapper flex flex-col lg:flex-row justify-center items-center pb-12">
            <div class="img-wrapper border border-solid border-gray-200 overflow-hidden relative w-full lg:w-8/12 lg:mr-4">
                @php
                    $banner = \App\Models\Banner::where(['area_id' => 7, 'status' => 'Y'])->inRandomOrder()->first();
                    $image = 'banners/'.$banner->image;
                    if($banner->image != '' && Storage::disk('ds3')->exists($image)){
                        $path = Storage::disk('ds3')->url($image);
                    } else {
                        $path = 'https://via.placeholder.com/1090x245';
                    }
                @endphp
                <img class="lazyload img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full" data-src="{{ $path }}" alt="{{ $banner->name }}" />
            </div>
            <div class="img-wrapper border border-solid border-gray-200 overflow-hidden relative mt-4 w-2/4 lg:w-4/12 lg:mt-0">
                @php
                $banner = \App\Models\Banner::where(['area_id' => 8, 'status' => 'Y'])->inRandomOrder()->first();
                $image = 'banners/'.$banner->image;
                if($banner->image != '' && Storage::disk('ds3')->exists($image)){
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/1090x245';
                }
                @endphp
                <img class="lazyload img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full" data-src="{{ $path }}" alt="{{ $banner->name }}" />
            </div>
        </div>
    </div>
</section>
{{-- <div class="ps-home-ads">
    <div class="ps-container">
        <div class="row">
            {!! \App\Models\Banner::showBanner(7, 'shadow') !!}
            {!! \App\Models\Banner::showBanner(8, 'shadow') !!}
        </div>
    </div>
</div><br><br> --}}

<section class="hot-new-arrivals pt-10">
    <div class="hot-new-arrivals-wrapper width">
        <div class="hot-new-arrivals-title-wrapper flex justify-between items-end gap-4">
            <h3 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color">Hot New Arrivals</h3>
            <a href="{{ url('products/new-arrivals') }}" class="bubble-anchors relative text-xs sm:text-base text-white text-center">View All</a>
        </div>
        <div class="hot-new-arrivals-imgs-wrapper grid sm:grid-cols-2 xl:grid-cols-3 pt-6 gap-4">
            @foreach($data['new_products'] as $product)
            @php
                $alt = Str::replace('"', ' inch', $product->name);
                $url = $product->slug;
                if($product->type == 'child' && $product->show_individual == 'N')
                {
                    if($force_link)
                        $url = $force_link.'#'.$product->sku;
                    else
                        $url = self::getParentSlug($product->id).'#'.$product->sku;
                }
                else if($product->show_individual == 'Y' && $product->link_type == 'variation')
                {
                    $url = self::getParentSlug($product->id).'#'.$product->sku;
                }
                $img_path = 'products/images/thumbnails/'.$product->image;
                $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';

                $info = \App\Models\Product::getPriceText($product);
            @endphp
                <a href="{{ $url }}" class="hot-new-arrival flex flex-col z-10 text-center sm:text-left sm:flex-row justify-center items-center sm:justify-start bg-white p-4 card relative overflow-hidden border border-solid border-gray-200">
                    <span
                        class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span
                        class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span
                        class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span
                        class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    <img class="lazyload hot-new-arrival-img w-20 lg:w-28 h-20 lg:h-28 mr-4 lg:mr-6" data-src="{{ $path }}" alt="{{ $alt }}" />
                    <div class="hot-new-arrival-detail flex flex-col items-center sm:items-start">
                        <h3 class="how-new-arrival-title lite-blue-color leading-snug transition duration-300 ease-in-out">{{ $product->name }}</h3>
                        <div class="multiple-sku text-red-400 text-sm mt-2 leading-snug">
                            @if(auth()->user())
                                {!! $info['price_text'] !!}
                            @else
                                <span class="text-sm mb-1"><span class="inline-block">Login</span> to see price and order.</span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
{{-- <div class="ps-product-list ps-new-arrivals">
    <div class="ps-container">
        <div class="ps-section__header">
            <h3>Hot New Arrivals</h3>
            <a class="pb-2 border-bottom border-dark" aria-label="Hot New Arrivals" href="{{ url('products/new-arrivals') }}">View all</a>
        </div>
        <div class="ps-section__content">
            <div class="row">
                @foreach($data['new_products'] as $product)
                    {!! \App\Models\Product::productBlock($product, 'large') !!}
                @endforeach
            </div>
        </div>
    </div>
</div> --}}