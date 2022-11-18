<style>
    .vendor-coupon-wrapper button {
        height: max-content;
        padding: 4px 20px !important;
        border-radius: 6px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 400;
    }
    .vendor-coupon-wrapper button:hover {
        background: #131921;
        color: #ffffff;
    }
    .vendor-coupon-wrapper input[type=text] {
        height: 36px;
    }
    .addcouponlink a {
        font-size: 14px !important;
        color: #007bff;
    }
    .addcouponlink span {
        background: #007bff;
        color: #fff;
        padding: 1px 3px;
        border-radius: 3px;
        font-size: 11px;
    }
</style>
<div class="ps-section__content">
    <form action="{{ route('frontend.cart.recalculate') }}" method="post" class="">
        @csrf
        <div class="table-responsive">
            <table class="table ps-table--shopping-cart ps-table--responsive">
                <tbody>
                    @php
                        $sub_total = 0;
                        $bogo_discount = 0;
                    @endphp
                    @foreach($data['cart'] as $vendor_id => $vendor_cart)
                        <tr>
                            <td @if($view == 'cart-page') colspan="5" @else colspan="2" @endif class="text-left">
                                @php
                                    $vendor = \App\Models\Vendor::get_vendor($vendor_id);
                                @endphp
                                <div class="align-items-center d-flex pull-left">
                                    <a class="mr-3" href="{{ $vendor->slug }}">{{ $vendor->name }}</a>
                                    <div class="addcouponlink" id="coupon-add-link{{ $vendor_id }}">
                                        @php
                                            $discount = get_vendor_discount('full',$vendor_id);
                                        @endphp
                                        @if($discount==0)
                                            <a href="javascript:void(0)" vendor-id="{{ $vendor_id }}">Apply coupon</a>
                                        @else
                                            <span>Discount: ${{ number_format($discount, 2) }}</span>
                                        @endif
                                    </div>
                                    <div class="vendor-coupon-wrapper" id="coupon-form{{ $vendor_id }}" style="display: none;">
                                        <input class="form-control mr-3" type="text" name="coupon_code_input" id="coupon_code-{{ $vendor_id }}" style="max-width: 180px;" value="" placeholder="Coupon Code" />
                                        <button class="ps-btn--outline" type="button" name="update_cart" id="update_cartbtn-{{ $vendor_id }}">Apply</button>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    @include('frontend.includes.partials._vendor-shipping-charges')
                                </div>
                            </td>
                        </tr>
                        @foreach($vendor_cart as $cart)
                            @php
                                if(!is_object($cart)) continue;
                                // $path = 'products/images/thumbnails/'.$cart->attributes->image;
                                $is_freebie = false;
                                $freebie_qty = 0;
                                if($cart->attributes->freebie)
                                {
                                    $is_freebie = true;
                                    $freebie_qty = $cart->attributes->freebie_qty;
                                    $item_price = 0;
                                    $total_price = 0;
                                }
                                else
                                {
                                    $item_price = $cart->getPriceWithConditions();
                                    $total_price = $cart->getPriceSumWithConditions();
                                }
                                if($cart->bogo_free)
                                {
                                    $total_price_discount = $cart->bogo_free * $item_price;
                                    $bogo_discount += $total_price_discount;
                                    $talal_price_after_bogo = $total_price - $total_price_discount;
                                }
                                if($cart->bogod_count)
                                {
                                    $discounted_price = ($item_price * $cart->bogod_percent) / 100;
                                    $total_price_discount = $cart->bogod_count * $discounted_price;
                                    $bogo_discount += $total_price_discount;
                                    $talal_price_after_bogo = $total_price - $total_price_discount;
                                }
                            @endphp
                            <tr class="cart_row_{{ $cart->id }}">
                                <td data-label="Product">
                                    <div class="ps-product--cart">
                                        {{--<input type="checkbox" style="flex-basis: auto;">--}}
                                        <div class="ps-product__thumbnail"><a href="{{ $cart->attributes->link }}"><img src="{{$cart->attributes->image}}" class="img-thumbnail" alt="{{ $cart->name }}"></a></div>
                                        <div class="ps-product__content"><a href="{{ $cart->attributes->link }}">{{ $cart->name }}</a>
                                            <br>&bull; <em>{{ $cart->attributes->sku }}</em>@if($is_freebie) <div class="text-red"><em>1 {{ $cart->name }} Per Order</em></div> @endif
                                            @if($view == 'order-review')
                                                <br> <small>Quantity: {{ $cart->quantity }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                @if($view == 'cart-page')
                                    <td class="price" data-label="Price">
                                        @if($is_freebie)
                                            <div class="red-text">Free Product</div>
                                        @else
                                            @if($cart->attributes->discount == 0)
                                                <span>${{ number_format($cart->price, 2) }}</span>
                                            @else
                                                <span class="old-price">${{ number_format($cart->price, 2) }}</span>
                                                <br>
                                                <span>${{ number_format($item_price, 2) }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td data-label="Quantity">
                                        <div class="form-group--number">
                                            {{-- <button class="up">+</button>
                                            <button class="down">-</button>
                                            <input class="form-control" type="text" placeholder="1" value="1"> --}}
                                            @if($is_freebie)
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1
                                            @elseif($view == 'cart-page')
                                                <input type="number" name="qty[]" style="width: 80px;" id="qty_{{ $cart->id }}" class="form-control text-center txt-product-qty" value="{{ $cart->quantity }}">
                                                <input type="hidden" name="id[]" value="{{ $cart->id }}">
                                            @endif
                                        </div>
                                    </td>
                                @endif
                                <td data-label="Total">
                                    @if($is_freebie)
                                        <div class="red-text">Free Product</div>
                                    @else
                                        @if($cart->attributes->discount == 0)
                                            <span @if($cart->bogo_free || $cart->bogod_count) class="old-price" @endif>${{ number_format($cart->getPriceSum(), 2) }}</span>
                                        @else
                                            <span class="old-price">${{ number_format($cart->getPriceSum(), 2) }}</span><br>
                                            <span @if($cart->bogo_free || $cart->bogod_count) class="old-price" @endif>${{ number_format($total_price, 2) }}</span>
                                        @endif
                                        @if($cart->bogo_free || $cart->bogod_count)
                                            <span>${{ number_format($talal_price_after_bogo, 2) }}</span>
                                            <small class="red-text">
                                                @if($cart->bogod_count)
                                                    {{ $cart->bogod_percent }}% discount <br>on {{ $cart->bogod_count }} @if($cart->bogod_count > 1) items @else item @endif
                                                @else
                                                    {{ $cart->bogo_free }} free @if($cart->bogo_free > 1) items @else item @endif
                                                @endif
                                            </small>
                                        @endif
                                    @endif
                                </td>
                                @if($view == 'cart-page')
                                    <td data-label="Actions">
                                        @if(!$is_freebie)
                                            <a href="javascript:;" onclick="remove_cart_item({{ $cart->id }});"><i class="icon-cross"></i></a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                            @php
                                $sub_total += $total_price;
                                //echo '<h1>'.$sub_total.'</hr>';
                            @endphp
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($view == 'cart-page')
            <div class="ps-section__cart-actions">
                <a class="ps-btn" href="/"><i class="icon-arrow-left"></i> Back to Shop</a>
                <button class="ps-btn ps-btn--outline" type="submit" name="update_cart" id="btn_update_cart" value="Update Cart"><i class="icon-sync"></i> Update Cart</button>
            </div>
        @endif
    </form>
</div>
<script>
    couponForms = document.body.querySelectorAll('.vendor-coupon-wrapper button');
    couponForms.forEach((couponForm) => {
        couponForm.addEventListener('click', addCoupon);
    })
    addCouponBtns = document.body.querySelectorAll('.addcouponlink a');
    addCouponBtns.forEach((link) => {
        link.addEventListener('click', viewCoupon);
    })
    function viewCoupon() {
        let vendor_id = $(this).attr('vendor-id');
        document.body.querySelector('#coupon-form'+vendor_id).classList.toggle('d-flex');
        document.body.querySelector('#coupon-add-link'+vendor_id).classList.toggle('d-none');
    }
    function addCoupon() {
        let btn_id_split = $(this).attr('id').split('-');
        let vendor_id = btn_id_split[1];
        let couponCode = $(`#coupon_code-${vendor_id}`).val();
        $.ajax({
            type: 'POST',
            url: '/cart/vendor-coupon',
            data: {
                couponCode:couponCode,
                vendor_id:vendor_id
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if(response.error!=undefined)
                {
                    $(`#coupon_code-${vendor_id}`).val('');
                    window.location.reload();
                }
                else
                {
                    window.location.reload();
                }
            }
        })
    }
</script>