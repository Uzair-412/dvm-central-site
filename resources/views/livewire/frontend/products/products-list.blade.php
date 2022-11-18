<div>
    @if($type=='carousel' || $type=='carousel-detail')
        @if(count(@$products)>0)
            {{-- <div class="swiper-buton-wrapper h-8 w-16">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-next" fill="none" viewBox="0 0 24 24"
                    stroke="#418ffe">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-prev" fill="none" viewBox="0 0 24 24"
                    stroke="#418ffe">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div> --}}

            <div class="related-products-imgs-container swiper mySwiper mt-6 w-full">
                <div class="related-products-img-wrapper swiper-wrapper w-full">
                    @forelse($products as $key => $product)
                        @if($product!='')
                            @php
                                $product = (object)$product;
                                $name = $product->name;
                                if (strlen(trim($product->short_description)) > 100)
                                $description = strip_tags(substr(trim($product->short_description), 0, 100)) . ' ...';
                                else
                                $description = strip_tags(trim($product->short_description));
                                
                                $alt = Str::replace('"', ' inch', $name);
                                
                                $url = $product->slug;
                                
                                if($product->type == 'child' && $product->show_individual == 'N')
                                {
                                if(isset($force_link))
                                $url = $force_link.'#'.$product->sku;
                                else
                                $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                                }
                                else if($product->show_individual == 'Y' && $product->link_type == 'variation')
                                {
                                $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                                }
                                
                                $product->url = $url;
                                
                                $img_path = 'products/images/thumbnails/'.$product->image;
                                $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) :
                                'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                                
                                $product->on_sale = false;
                                
                                $info = \App\Models\Product::getPriceText($product);
                                
                                $caption = '';
                                
                                if ($product->new == 'Y')
                                $caption = 'New!';
                                else if ($product->hot == 'Y')
                                $caption = 'Hot!';
                                else if ($product->featured == 'Y')
                                $caption = 'Featured!';
                                else if ($product->deals_of_the_day == 'Y')
                                $caption = 'Deals Of The Day!';
                                else if ($product->related_products == 'Y')
                                $caption = 'Deals Of The Day!';
                                
                                if ($product->on_sale)
                                $caption = 'Sale!';
                                $reviews = \App\Models\Product::getReviews($product->id);
                            @endphp
                            @if($type=='carousel-detail')
                                <div class="hs swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white">
                                    <div class="sale-notify absolute top-0 right-0 text-xs bg-red-500 w-max text-white px-2 py-1 z-10">Hot</div>
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    
                                    <div class="hs-img-container relative overflow-hidden flex justify-center xl:w-full">
                                        <a href="{{ $product->url }}" class="hs-img-wrapper overflow-hidden flex justify-center p-2 w-full">
                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                            <img class="hs-img xl:w-full swiper-lazy" src="{{ $path }}" alt="{{ $alt }}"/>
                                        </a>
                                        <div class="carasoul-icons-container lite-blue-color carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                @if($product->type != "variation")
                                                    <form wire:submit.prevent="add_to_cart({{ $product->id }})">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                                        <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                                        <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}" />
                                                        <button type="submit" style="display: contents;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                                                stroke="#fff">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ $url }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                                            stroke="#fff">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                                            </div>
                                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-eye-icon" fill="none" viewBox="0 0 24 24" stroke="#fff" onclick="productQuickViews({{ $product->id }}, {{ session()->get('rand_num') }})">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
                                            </div>
                                            <div wire:ignore class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                {{-- <form method="post" action="/comparison-search">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="name" value="{{ $product->name }}" />
                                                <button type="submit" style="display: contents;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none" viewBox="0 0 24 24" stroke="#fff">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                                </button>
                                                </form> --}}
                                                
                                                @if(Auth::user())
                                                    <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post" action="{{ url('dashboard/wishlist/store') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                                        <button type="submit" style="display: contents;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none" viewBox="0 0 24 24"
                                                                stroke="#fff">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="/login">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none" viewBox="0 0 24 24"
                                                            stroke="#fff">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Wishlist</div>
                                            </div>
                                            {{-- <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-compare-icon" fill="none" viewBox="0 0 24 24" stroke="#fff">
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                                    />
                                                </svg>
                                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <a href="{{$product->vendor['slug']}}" class="sold-by mx-2 py-2 border-b border-solid border-gray-200">{{$product->vendor['name']}}</a>
                                    <div class="old-star-ratings flex p-2 pb-0">
                                        @php
                                            $j = 0;
                                        @endphp
                                        @for($i = 0; $i < 5; $i++)
                                            @if($i < (int)$reviews)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            @else
                                                @php
                                                    $decimal = ($reviews - (int)$reviews) * 100;
                                                @endphp
                                                @if($decimal > 0 && $j==0)
                                                    @php
                                                        $j=1;
                                                    @endphp
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="none">
                                                        <defs>
                                                            <linearGradient id="grad1">
                                                                <stop offset="0%" stop-color="#418ffe" />
                                                                <stop offset="{{ $decimal }}%" stop-color="#418ffe" />
                                                                <stop offset="{{ $decimal }}%" stop-color="white" />
                                                                <stop offset="100%" stop-color="white" />
                                                            </linearGradient>
                                                        </defs>
                                                        <path d="M0 0h24v24H0z" fill="none"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            fill="url(#grad1)"
                                                            stroke="#418ffe"
                                                            stroke-width="1"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                                        />
                                                        <path d="M0 0h24v24H0z" fill="none"/>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#ffffff" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                    </svg>
                                                @endif
                                            @endif
                                        @endfor
                                    </div>
                                    <a href="{{$url}}" class="p-2">
                                        <div class="hs-title lite-blue-color leading-snug">{{$product->name}}</div>
                                        {{-- if user loggedin then show price --}}
                                        @if(auth()->user())
                                            @if($product->type != "variation")
                                                <div class="hs-price font-semibold mt-1 text-lg">${{$product->price_discounted}}</div>
                                            @else
                                                <div class="multiple-sku text-red-400 mt-2 leading-snug">Multiple SKUs, Click for Details</div>
                                            @endif
                                        @else
                                            <p class="text-sm mb-1"><a href="/login" class="text-red-500">Login</a> to see price and order.</p>
                                        @endif
                                    </a>
                                </div>
                            @else
                                <div class="related-product swiper-slide relative flex flex-col justify-center items-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                    <a href="{{ $product->url }}" class="related-product-img-wrapper overflow-hidden inline-block">
                                        <img class="related-product-img swiper-lazy" data-src="{{ $path }}" alt="{{ $alt }}" />
                                    </a>
                                    <div class="related-product-icons-container carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-between">
                                        <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            @if($product->type != "variation")
                                                <form wire:submit.prevent="add_to_cart({{ $product->id }})">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                                    <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                                    <input type="hidden" name="session_num" id="session_num" value="{{ session()->get('rand_num') }}" />
                                                    <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}" />
                                                    <button type="submit" style="display: contents;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ $url }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                    </svg>
                                                </a>
                                            @endif
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                                        </div>
                                        <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-eye-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" onclick="productQuickViews({{ $product->id }}, {{ session()->get('rand_num') }})">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
                                        </div>
                                        <div wire:ignore class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            @if(Auth::user())
                                                <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post" action="{{ url('dashboard/wishlist/store') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                                    <button type="submit" style="display: contents;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none" viewBox="0 0 24 24"
                                                            stroke="#fff">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <a href="/login">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-heart-icon" fill="none" viewBox="0 0 24 24"
                                                        stroke="#fff">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                </a>
                                            @endif
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Wishlist</div>
                                        </div>
                                        {{-- <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                            <form method="post" action="/comparison-search">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="name" value="{{ $product->name }}" />
                                                <button type="submit" style="display: contents;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-compare-icon" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                                        </div> --}}
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="swiper-scrollbar mt-4"></div>
        @endif
    @elseif($type == 'hotselling' || $type == 'landscape' || $type == 'portrate')
        <div class="hot-selling-item-imgs-wrapper pt-6 pb-12 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($products as $product)
                @php
                    $product = (object)$product;
                    $alt = Str::replace('"', ' inch', $product->name);
                    $url = $product->slug;

                    if($product->type == 'child' && $product->show_individual == 'N')
                    {
                        if(@$force_link){
                            $url = $force_link.'#'.$product->sku;
                        }
                        else{
                            $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                        }
                    }
                    else if($product->show_individual == 'Y' && $product->link_type == 'variation')
                    {
                    $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                    }
                    $img_path = 'products/images/thumbnails/'.$product->image;
                    $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ?
                    Storage::disk('ds3')->url($img_path) :
                    'up_data/na.jpg') : 'up_data/na.jpg';

                    if($allowCaption)
                    {
                        $caption = '';
                        if ($product->new == 'Y')
                        $caption = 'New!';
                        if ($product->hot == 'Y')
                        $caption = 'Hot!';
                        if ($product->featured == 'Y')
                        $caption = 'Featured!';
                        if ($product->deals_of_the_day == 'Y')
                        $caption = 'Deals Of The Day!';
                        if ($product->related_products == 'Y')
                        $caption = 'Deals Of The Day!';
                        if (@$product->on_sale)
                        $caption = 'Sale!';
                    }
                    $reviews = \App\Models\Product::getReviews($product->id);
                    $Range = \App\Models\Product::getSubItemsPriceRange($product->id);
                @endphp
                <div class="z-10 hot-selling-item flex flex-col justify-center relative text-center card border border-solid border-gray-200 overflow-hidden bg-white border border-solid border-gray-200">
                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    @if($allowCaption)
                                <div class="sale-notify absolute top-0 left-0 text-xs bg-red-500 w-max text-white px-2 py-1 z-10">{{ $caption }}</div>
                            @endif
                    <div class="hot-selling-item-img-container relative overflow-hidden flex justify-center xl:w-full">
                        @if($type == 'landscape' || $type == 'hotselling')
                            <a href="{{ $url }}" class="hot-selling-item-title-wrapper absolute top-0 left-0 inline-flex items-center p-2 w-full h-full bg-black bg-opacity-70 text-white">
                                <div class="hot-selling-item-title w-9/12 text-left text-sm">
                                    {{$product->name}}
                                </div>
                            </a>
                        @endif 
                        <a href="{{ $url }}" class="hot-selling-item-img-wrapper overflow-hidden inline-block p-2 relative">
                            
                            <img class="hs-img xl:w-full swiper-lazy swiper-lazy-loaded" src="{{ $path }}" alt="{{ $alt }}" />
                        </a>
                        <div class="hot-selling-item-icons-container carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-between">
                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                @if($product->type != "variation")
                                <form wire:submit.prevent="add_to_cart({{ $product->id }})">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                    <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                    <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}" />
                                    <button type="submit" style="display: contents;"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg></button>
                                </form>
                                @else
                                <a href="{{ $url }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </a>
                                @endif
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                            </div>

                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-eye-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" onclick="productQuickViews({{ $product->id }}, {{ session()->get('rand_num') }})">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
                            </div>

                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                @if(Auth::user())
                                <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post"
                                    action="{{ url('dashboard/wishlist/store') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                    <button type="submit" style="display: contents;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>
                                @else
                                <a href="/login">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </a>
                                @endif
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Wishlist
                                </div>
                            </div>

                            {{-- <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                <form method="post" action="/comparison-search">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="name" value="{{ $product->name }}" />
                                    <button type="submit" style="display: contents;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-compare-icon" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </button>
                                </form>
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                            </div> --}}
                        </div>
                    </div>
                    @if($type == 'portrate')
                        <a href="{{$product->vendor['slug']}}" class="sold-by mx-2 py-2 border-b border-solid border-gray-200 text-left">{{$product->vendor['name']}}</a>
                        <div class="old-star-ratings flex p-2 pb-0">
                            @php
                                $j = 0;
                            @endphp
                            @for($i = 0; $i < 5; $i++)
                                @if($i < (int)$reviews)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                @else
                                    @php
                                        $decimal = ($reviews - (int)$reviews) * 100;
                                    @endphp
                                    @if($decimal > 0 && $j==0)
                                        @php
                                            $j=1;
                                        @endphp
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="none">
                                            <defs>
                                                <linearGradient id="grad1">
                                                    <stop offset="0%" stop-color="#418ffe" />
                                                    <stop offset="{{ $decimal }}%" stop-color="#418ffe" />
                                                    <stop offset="{{ $decimal }}%" stop-color="white" />
                                                    <stop offset="100%" stop-color="white" />
                                                </linearGradient>
                                            </defs>
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                fill="url(#grad1)"
                                                stroke="#418ffe"
                                                stroke-width="1"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                            />
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#ffffff" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    @endif
                                @endif
                            @endfor
                        </div>
                        <a href="{{ $url }}" class="p-2">
                            <div class="item-title lite-blue-color leading-snug text-left">{{$product->name}}</div>
                            {{-- if user loggedin then show price --}}
                            @if(auth()->user())
                                @if($product->type != "variation")
                                    @if($product->price_discounted == '' || $product->price_discounted == null)
                                        <div class="item-price font-semibold mt-1 text-lg text-left">${{$product->price}}</div>
                                    @else
                                        <div class="item-price font-semibold mt-1 text-lg text-left">${{$product->price_discounted}}</div>
                                    @endif
                                @else
                                    <div class="multiple-sku text-red-400 mt-2 leading-snug text-left">{{ $Range }}</div>
                                @endif
                            @else
                                <p class="text-sm mb-1"><a href="/login" class="text-red-500">Login</a> to see price and order.</p>
                            @endif
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
    
    <div class="product-listing-wrapper grid mt-11">
        @forelse($products as $key => $product)
        {{-- {{ dd($product->vendor['slug']) }} --}}
            @if($product)
                @php
                    $product = (object)$product;
                    $name = $product->name;
                    if (strlen(trim($product->short_description)) > 100)
                        $description = strip_tags(substr(trim($product->short_description), 0, 100)) . ' ...';
                    else
                        $description = strip_tags(trim($product->short_description));
                    
                    $alt = Str::replace('"', ' inch', $name);
                    
                    $url = $product->slug;
                    
                    if($product->type == 'child' && $product->show_individual == 'N')
                    {
                        if(@$force_link)
                            $url = $force_link.'#'.$product->sku;
                        else
                            $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                    }
                    else if($product->show_individual == 'Y' && $product->link_type == 'variation')
                    {
                        $url = \App\Models\Product::getParentSlug($product->id).'#'.$product->sku;
                    }
                    
                    $product->url = $url;
                    
                    $img_path = 'products/images/thumbnails/'.$product->image;
                    $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) :
                    'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                    
                    $product->on_sale = false;
                    
                    $info = \App\Models\Product::getPriceText($product);
                    
                    $caption = '';
                    
                    if ($product->new == 'Y')
                        $caption = 'New!';
                    else if ($product->hot == 'Y')
                        $caption = 'Hot!';
                    else if ($product->featured == 'Y')
                        $caption = 'Featured!';
                    else if ($product->deals_of_the_day == 'Y')
                        $caption = 'Deals Of The Day!';
                    else if ($product->related_products == 'Y')
                        $caption = 'Deals Of The Day!';
                    
                    if ($product->on_sale)
                    $caption = 'Sale!';
                    $reviews = \App\Models\Product::getReviews($product->id);
                @endphp
                <div class="product-listing w-auto flex flex-col relative border border-solid border-gray-200 overflow-hidden card bg-white z-10">
                    <div class="span-wrapper absolute top-0 left-0 w-full h-full">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                    </div>
                    <div class="product-listing-img-container relative overflow-hidden flex justify-center z-20">
                        <a href="{{ $product->url }}" class="product-listing-img-wrapper relative overflow-hidden p-4 bg-white bg-white border-solid border-gray-100 inline-flex justify-center">
                            <img class="product-listing-img lazyload w-auto asbolute top-0 left-0 w-full h-full" data-src="{{ $path }}" alt="{{ $product->name }}" />
                        </a>
                        <div class="product-listing-icons-container lite-blue-color carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                @if($product->type != "variation")
                                <form wire:submit.prevent="add_to_cart({{ $product->id }})">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                    <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                    <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}" />
                                    <button type="submit" style="display: contents;"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 carasoul-cart-icon text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg></button>
                                </form>
                                @else
                                <a href="{{ $url }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </a>
                                @endif
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
                            </div>

                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-eye-icon text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" onclick="productQuickViews({{ $product->id }}, {{ session()->get('rand_num') }})">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
                            </div>

                            <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                @if(Auth::user())
                                <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post"
                                    action="{{ url('dashboard/wishlist/store') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                    <button type="submit" style="display: contents;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>
                                @else
                                <a href="/login">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </a>
                                @endif
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Wishlist
                                </div>
                            </div>
                            
                            {{-- <div class="carasoul-icon-wrapper lite-blue-bg-color relative hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 carasoul-compare-icon" fill="none" viewBox="0 0 24 24" stroke="#fff">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                                <div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Compare</div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="product-listing-detail-wrapper flex flex-col z-20">
                        <div class="seller-rating-wrapper-grid flex flex-col">
                            <a href="{{ @$product->vendor['slug'] }}" class="sold-by mx-2 py-2 border-b border-solid border-gray-200">{{ @$product->vendor['name'] }}</a>
                            <div class="old-star-ratings flex p-2 pb-0">
                                @php
                                    $j = 0;
                                @endphp
                                @for($i = 0; $i < 5; $i++)
                                    @if($i < (int)$reviews)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    @else
                                        @php
                                            $decimal = ($reviews - (int)$reviews) * 100;
                                        @endphp
                                        @if($decimal > 0 && $j==0)
                                            @php
                                                $j=1;
                                            @endphp
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="none">
                                                <defs>
                                                    <linearGradient id="grad1">
                                                        <stop offset="0%" stop-color="#418ffe" />
                                                        <stop offset="{{ $decimal }}%" stop-color="#418ffe" />
                                                        <stop offset="{{ $decimal }}%" stop-color="white" />
                                                        <stop offset="100%" stop-color="white" />
                                                    </linearGradient>
                                                </defs>
                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    fill="url(#grad1)"
                                                    stroke="#418ffe"
                                                    stroke-width="1"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                                />
                                                <path d="M0 0h24v24H0z" fill="none"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#ffffff" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endif
                                @endfor
                            </div>
                        </div>

                        <div class="product-listing-detail p-2">
                            <a href="{{ $product->url }}" class="product-listing-title lite-blue-color leading-snug text-sm md:text-base">{{ $product->name }}</a>
                            <div class="product-listing-description mt-4 leading-snug text-gray-500 w-full text-sm md:text-base hidden">
                                GV Style Compression Plate provides support to the fractured bone and restores stability. GV Style Compression Plate provides support to the fractured bone and restores stability...
                            </div>
                            @if($product->type != 'variation')
                                <div class="popup-product-price flex items-center mt-2">
                                    {{-- if user loggedin then show price --}}
                                    @if(auth()->user())
                                        <div class="product-listing-price font-semibold text-base">
                                            <span>${{ $info['discount'] > 0 ? number_format($info['sale_price'],2) : number_format($info['price'],2) }}</span>
                                            @if($info['discount'] > 0)
                                                <span class="old-price text-red-400 text-sm mx-2 line-through">${{ number_format($product->price_catalog,2) }}</span>
                                                <span class="discounted-percent">(-{{ number_format(100 * ((float)$info['price'] - (float)$info['sale_price']) / (float)$info['price'],2) }}%)</span>
                                            @endif
                                        </div>
                                    @else
                                        <p class="text-sm"><a href="/login" class="text-red-500">Login</a> to see price and order.</p>
                                    @endif
                                </div>
                            @endif
                            <div class="seller-rating-wrapper-flex flex flex-wrap items-center justify-between hidden mt-4">
                                <div class="old-star-ratings flex mr-4">
                                    @php
                                        $j = 0;
                                    @endphp
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < (int)$reviews)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @else
                                            @php
                                                $decimal = ($reviews - (int)$reviews) * 100;
                                            @endphp
                                            @if($decimal > 0 && $j==0)
                                                @php
                                                    $j=1;
                                                @endphp
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#418ffe" viewBox="0 0 24 24" stroke="none">
                                                    <defs>
                                                        <linearGradient id="grad1">
                                                            <stop offset="0%" stop-color="#418ffe" />
                                                            <stop offset="{{ $decimal }}%" stop-color="#418ffe" />
                                                            <stop offset="{{ $decimal }}%" stop-color="white" />
                                                            <stop offset="100%" stop-color="white" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        fill="url(#grad1)"
                                                        stroke="#418ffe"
                                                        stroke-width="1"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                                    />
                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 star" fill="#ffffff" viewBox="0 0 24 24" stroke="#418ffe" data-value="1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            @endif
                                        @endif
                                    @endfor
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-500">Sold By : </span>
                                    <strong class="underline-anchors relative overflow-hidden inline-block ml-1"><a href="{{ @$product->vendor['slug'] }}" rel="noopener" rel="noreferrer" class="sold-by">{{ @$product->vendor['name'] }}</a></strong>
                                </div>
                            </div> 
                            <div class="product-listing-button-sec flex flex-col xl:flex-row xl:justify-between xl:items-center hidden">
                                <div class="product-listing-button-wrapper buttons-wrapper flex flex-wrap">
                                    @if($product->type != 'variation')
                                        <form wire:submit.prevent="add_to_cart({{ $product->id }})">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}" />
                                            <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                            <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user() ? auth()->user()->id : '' }}" />
                                            <button type="submit" class="btn blue-btn add-cart-btn relative overflow-hidden lite-blue-bg-color text-white px-4 md:px-6 py-2 md:py-3 inline-block mt-4 w-max z-10 mr-4">
                                                Add To Cart
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ $product->url }}" class="btn black-btn relative overflow-hidden primary-black-bg text-white px-4 md:px-6 py-2 md:py-3 inline-block mt-4 w-max z-10">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <h3 class="text-gray-500 mt-2">Search Not Found</h3>
        @endforelse
    </div>
    @endif
    <script>
        window.addEventListener('error_add_to_cart', function(e){
            if(e.detail.status==0)
            {
                showAlert(e.detail.error, {
					text: 'Login',
					link: '/login',
					type: 'error'
				});
            }
            else
            {
                showAlert(e.detail.error, {
					text: '',
					link: '',
					type: 'error'
				});
            }
        });
    </script>
</div>
@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/blowup.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/product.js?version=0.2') }}"></script>
    {{-- @livewireScripts --}}
    {{-- @livewire('chat-box', ['chat_type' => 'site', 'chat_data' => $data['chat_data'], 'vendor_id' => $data['vendor_id']]) --}}
@endpush