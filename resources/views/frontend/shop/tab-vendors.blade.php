@forelse ($data['list-products'] as $deals)
    <div class="ps-shopping-product">
        <div class="ps-product ps-product--wide">
            <div class="ps-product__thumbnail d-flex align-items-center">
                <a href="{{url($deals->slug)}}">
                    @if($deals->image != '' || $deals->image != NULL )
                        @php
                            $path = 'products/images/thumbnails/' . $deals->image;
                        @endphp
                        <img class="lazyload w-100" data-src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/189X189.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{ $deals->name }}">
                    @else
                        <img class="lazyload w-100" data-src="{{url('up_data/na.webp')}}" alt="">
                    @endif
                </a>
            </div>
            <div class="p-5">
                <div class="ps-product__content"><a class="ps-product__title" href="{{url($deals->slug)}}">{{$deals->name}}</a>
                    <div class="row">
                        <div class="col">
                            <div class="ps-product__rating">
                                @php
                                    $rating = App\Models\Review::where(['status'=> 'Y','product_id'=> $deals->id])->get();
                                    $ratingcount = round($rating->avg('rating'));
                                @endphp
                                <select class="ps-rating" data-read-only="true">
                                    @for ($i=1; $i <= $ratingcount; $i++ )
                                        <option value="1">{{$i}}</option>
                                    @endfor 
                                    @for ($i=5; $i>$ratingcount; $i--)
                                        <option value="0">{{$i}}</option>
                                        <option value="2">{{$i}}</option>
                                    @endfor
                                </select><span>{{ $rating->avg('rating') == NULL ? '0.00' : round($rating->avg('rating'), 2) }} Star </span>
                            </div>
                            <p class="ps-product__vendor">Sold by: <a href="{{url($deals->vendor->slug)}}">{{$deals->vendor->name}}</a></p>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end w-100 mb-2">
                                @auth
                                    <form class="frm_add_to_wishlist" method="post" action="{{url('dashboard/wishlist/store')}}">
                                        @csrf
                                        <input type="hidden" name="product_id" class="product_id" value="{{$deals->id}}" />
                                        <button class="btn py-0" type="submit" data-placement="top" title="Add to Wishlist"><i class="icon-heart" style="font-size : 30px"></i></button>
                                    </form>
                                @endauth
                                @guest
                                    <a href="/login" data-placement="top" title="Add to Wishlist"><i class="icon-heart" style="font-size : 30px"></i></a>
                                @endguest
                                <form method="post" action="comparison-search">
                                    @csrf
                                    <input type="hidden" name="name" value="{{$deals->name}}" />
                                    <button class="btn py-0" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars" style="font-size : 30px"></i></a>
                                </form>   
                            </div>
                        </div>
                    </div>
                    @if ($deals->type == "variation")
                        <div class="ps-product__shopping mt-3">
                            <a class="ps-btn" href="{{url($deals->slug)}}" aria-label="Product Link">Details</a>
                        </div>
                    @else
                        <div class="ps-product__shopping">
                            @if ($deals->price_discounted_end < date('Y-m-d'))
                                <h4 class="ps-product__price sale"><span>$ {{$deals->price_catalog}}</span> </h4>
                            @else
                                <h4 class="ps-product__price sale"><span>$ {{$deals->price}}</span> <del>${{$deals->price_catalog}}</del> <small>(-{{round((($deals->price_catalog-$deals->price)/$deals->price_catalog)*100,2)}}%)</small> </h4>
                            @endif
                            <form class="frm_add_to_cart" method="POST" action="cart">
                                @csrf
                                <div class="ps-product__shopping d-flex">
                                    <input type="hidden" name="product_id" class="product_id" value="{{$deals->id}}">
                                    <button type="submit" class="ps-btn ps-btn--black btn_add_to_cart mr-3" onclick="this.form.cmd.value='add2cart';">Add to cart</button>
                                    <button type="submit" class="ps-btn" onclick="this.form.cmd.value='buynow';">Buy Now</button>
                                </div>
                                <input type="hidden" name="cmd" id="cmd" value="add2cart">
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@empty
    <h3>Sreach Not Found</h3>
@endforelse