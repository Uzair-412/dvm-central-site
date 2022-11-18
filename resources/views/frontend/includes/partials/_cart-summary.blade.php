<div class="ps-section__footer">
    <div class="row">
        <div class="col-md-12">
            <div class="ps-block--shopping-total">
                <div class="ps-block__header">
                    <p>Subtotal <span> ${{ number_format(product_cart()->getSubTotal(), 2) }}</span></p>
                </div>
                <div class="ps-block__header">
                    <p>Discount <span>${{ number_format(get_vendor_discount(), 2) }}</span></p>
                </div>
                <div class="ps-block__header">
                    <p>Shipping Cost
                        @if($view == 'cart-page') <a href="javascript:;" id="btn_show_calculate_shipping" class="badge badge-info">Calculate</a> @endif <span>${{ number_format( get_shipping_rate(), 2) }}</span></p>
                </div>
                <div class="ps-block__header">
                    <p><strong>Grand Total</strong> <span><strong>${{ number_format(product_cart()->getTotal(), 2) }}</strong></span></p>
                </div>
            </div>
            @foreach($data['cart'] as $vendor_id => $vendor_cart)
                @php
                    $shipping_charges = 0;
                    $shipping_service = '';
                    if(isset($data['cart'][$vendor_id]['shipping_charges']['rate']))
                    {
                        $shipping_charges = $data['cart'][$vendor_id]['shipping_charges']['rate'];
                        $shipping_service = $data['cart'][$vendor_id]['shipping_charges']['service'];
                    }
                @endphp
            @endforeach
            @if($view == 'cart-page')
                <a class="ps-btn ps-btn--fullwidth" href="checkout">Proceed to checkout</a>
            @endif
            @if($view == 'payment-page')
                <button class="btn btn-block btn-primary btn-lg p-3 font-weight-bold" @isset($data['v_shipping_details']) id="btn_stripe_pay" @else  onclick="$('#cart_shipping_addresses').modal('show');" @endisset type="button">Confirm Order</button>
            @endif
        </div>
    </div>
    {{-- @if($show_coupon)
        <div class="row pt-5">
            <div class="col-md-12">
                <form action="{{ route('frontend.cart.recalculate') }}" method="post" class="">
                    @csrf
                    <figure>
                        <figcaption>Coupon Discount</figcaption>
                        <div class="form-group">
                            <input class="form-control" type="text" name="coupon_code" id="coupon_code" value="" placeholder="Coupon Code">
                        </div>
                        <div class="form-group">
                            <button class="ps-btn ps-btn--outline" type="submit" name="update_cart" value="Apply Coupon">Apply</button>
                        </div>
                    </figure>
                </form>
            </div>
        </div>
    @endif --}}
</div>
{{-- @if($shipping_charges > 0)
@else
    <div class="modal fade" id="cart_shipping_calculates" tabindex="-1" role="dialog" aria-labelledby="Cart Shipping Calculates" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <span class="text-muted">Please Calculate The Shipping Cost First !</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif --}}
@isset($data['v_shipping_details'])
@else
    <div class="modal fade" id="cart_shipping_addresses" tabindex="-1" role="dialog" aria-labelledby="Cart Shipping Addresses" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <span class="text-muted">Please Add The Shipping Method First !</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endisset
