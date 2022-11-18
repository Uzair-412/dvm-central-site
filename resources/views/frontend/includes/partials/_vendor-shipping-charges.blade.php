@php
    $shipping_charges = 0;
    $shipping_service = '';
    if(isset($data['cart'][$vendor_id]['shipping_charges']['rate']))
    {
        $shipping_charges = $data['cart'][$vendor_id]['shipping_charges']['rate'];
        $shipping_service = $data['cart'][$vendor_id]['shipping_charges']['service'];
    }
@endphp
@if($shipping_charges > 0)
    <div id="div-vendor-shipping-charges-{{ $vendor_id }}" title="{{ $data['cart'][$vendor_id]['shipping_charges']['service'] }}">
        <a href="javascript:;" onclick="$('#cart_vendor_rates_{{ $vendor_id }}').modal('show');">
            <small>
                <i class="fa fa-truck" aria-hidden="true"></i>
                <img class="lazyload" data-src="static/img/icons/ups_icon.png" width="16">
                {{ $shipping_service . ' ($'.number_format($shipping_charges, 2).')' }}
            </small>
        </a>
        <div class="modal fade" id="cart_vendor_rates_{{ $vendor_id }}" tabindex="-1" role="dialog" aria-labelledby="cart_vendor_rates_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cart_vendor_rates_title">Shipping Charges from {{ $vendor->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        @foreach($data['cart'][$vendor_id]['shipping_charges_list'] as $shipping)
                            <div class="pl-5">
                                <label>
                                    <input value="{{ $shipping['enc'] }}" @if($shipping['selected']) checked @endif class="form-check-input" type="radio" name="shipping_service_{{ $vendor_id }}" id="shipping_service_{{ $vendor_id }}">
                                    &nbsp;{{ $shipping['service'] }} (${{ $shipping['rate'] }})
                                </label>
                            </div>
                        @endforeach
                        <input type="hidden" value="{{ $vendor_id }}" id="vendor_{{ $vendor_id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-lg btn-primary" onclick="set_selected_shipping_service({{ $vendor_id }});">Use Selected Service</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif