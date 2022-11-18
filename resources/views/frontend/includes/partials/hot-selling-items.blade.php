{{-- <div class="ps-product-list ps-clothings">
    <div class="ps-container">
        <div class="ps-section__header">
            <h3>Hot Selling Items</h3>
            <a class="pb-2 border-bottom border-dark" href="{{ url('products/hot-selling') }}">View all</a>
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($data['hot_products'] as $product)
                    {!! \App\Models\Product::productBlock($product,'hot_products') !!}
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
<section class="hot-selling-items pt-20">
    <div class="hot-selling-items-wrapper width">
        <div class="hot-selling-items-title-wrapper flex gap-4 justify-between items-end">
            <h1 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color w-max">Hot Selling
                Items</h1>
            <a href="{{ url('products/hot-selling') }}" class="bubble-anchors relative text-xs sm:text-base text-white self-end text-center">View
                All</a>
        </div>
        <div class="hot-selling-item-imgs-wrapper pt-6 pb-12 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($hot_products as $product)
                @php
                    $alt = Str::replace('"', ' inch', $product->name);
                    $url = $product->slug;
                    
                    if($product->type == 'child' && $product->show_individual == 'N')
                    {
                        if($force_link)
                            $url = $force_link.'#'.$product->sku;
                        else
                            $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                    }
                    else if($product->show_individual == 'Y' && $product->link_type == 'variation')
                    {
                        $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                    }
                    $img_path = 'products/images/thumbnails/'.$product->image;
                    $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                @endphp
                <div class="hot-selling-item flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <a href="{{ $url }}" class="hot-selling-item-img-wrapper overflow-hidden inline-block relative">
                        <div class="sale-notify absolute top-0 left-0 text-xs bg-red-500 w-max text-white px-2 py-1">Hot
                        </div>
                        <img class="lazyload hot-selling-item-img absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 w-full h-full" data-src="{{ $path }}"
                            alt="{{ $alt }}" />
                    </a>
                    <div class="hot-selling-item-icons-container carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-between">
                        <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                            
                            <form class="frm_add_to_cart" action="/cart" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                <button type="submit" style="display: contents;"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg></button>
                            </form>
                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                        </div>

                        <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-eye-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" onclick="productQuickViews({{ $product->id }})">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
                        </div>

                        <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            @if(Auth::user())
                            <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post" action="{{ url('dashboard/wishlist/store') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                            </form>
                            @else
                            <form method="get" action="/login" id="add-wishlist-form">
                            </form>
                            @endif
                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Wishlist
                            </div>
                        </div>

                        <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-compare-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <form method="post" action="comparison-search">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="name" value="{{ $product->name }}" />
                            </form>
                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>