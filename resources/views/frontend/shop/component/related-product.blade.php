<div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="{{$related->slug}}">
            @if ($related->image != NULL || $related->image != '')
                @php
                    $path = 'products/images/thumbnails/' . $related->image;
                @endphp
                <img class="lazyload w-100" data-src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/189x189.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{ $related->name }}">
            @else
                <img class="lazyload w-100" data-src="up_data/na.jpg" alt="{{$related->name}}">
            @endif
        </a>
        <ul class="ps-product__actions">
            <form class="frm_add_to_cart" method="post" action="cart">
                @csrf
                <input type="hidden" name="product_id" class="product_id" value="{{$related->id}}" />
                <li><button type="submit" class="btn_add_to_cart" data-placement="top" aria-label="Add To Cart" onclick="this.form.cmd.value='add2cart';" title="Add To Cart"><i class="icon-bag2"></i></button></li>
                <input type="hidden" name="cmd" id="cmd" value="add2cart">
            </form>
            <li><button data-placement="top" title="Quick View" aria-label="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews({{$related->id}})"><i class="icon-eye"></i></button></li>
            @auth
                <form class="frm_add_to_wishlist" method="post" action="{{url('dashboard/wishlist/store')}}">
                    @csrf
                    <input type="hidden" name="product_id" class="product_id" value="{{$related->id}}" />
                    <li><button type="submit" data-placement="top" aria-label="Add to Wishlist" title="Add to Wishlist"><i class="icon-heart"></i></button></li>
                </form>
            @endauth
            @guest
                <li><a href="/login" data-placement="top" aria-label="Add to Wishlist" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
            @endguest
            <form method="post" action="comparison-search">
                @csrf
                <input type="hidden" name="name" value="{{$related->name}}" />
                <li><button type="submit" data-placement="top" title="Compare" aria-label="Compare" data-original-title="Compare"><i class="icon-chart-bars"></i></button></li>
            </form>   
        </ul>
    </div>
    <div class="ps-product__container"><a class="ps-product__vendor" href="{{ $related->vendor->slug }}"  aria-label="Add to Wishlist">{{ $related->vendor->name }}</a>
        <div class="ps-product__content"><a class="ps-product__title" href="{{ $related->slug }}">{{ $related->name }}</a>
            @if ($related->type != 'variation')
                @if (($related->price_discounted != 0 || $related->price_discounted != NULL) && ($related->price_discounted_end > date('Y-m-d')))
                    <h4 class="price sale">$ {{$related->price}} <del>${{$related->price_catalog}}</del> <small>(-{{round((($related->price_catalog-$related->price)/$related->price_catalog)*100,2)}}%)</small> </h4>
                @else
                    <h4 class="price">$ {{$related->price_catalog}} </h4>
                @endif
            @else
                <p class="ps-product__price"><a aria-label="{{$related->name}}" href="{{$related->slug}}">Multiple SKUs, Click for Details</a></p>
            @endif
            
        </div>
    </div>
</div>