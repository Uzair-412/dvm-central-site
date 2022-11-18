<div>
    <main id="cart-page" class="relative">
        <div class="cart-page-container mt-20">
            @if(@$address1)
                <div class="change-address-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center bg-black bg-opacity-70 hidden opacity-0">
                    <div class="change-address-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 transform scale-125 transition-all duration-300 ease-in-out opacity-0">
                        <div class="change-address-popup-msg text-gray-500 mt-2 text-sm md:text-base font-bold primary-black-color">
                            Change Shipping Address.</div>
                        {!! Form::open(['route' => ['frontend.user.addresses.stores'], 'method' => 'POST']) !!}
                        <label for="address1" class="py-2 md:py-4 relative block">
                            Select Shipping Address:
                            {!! Form::select('address1', $address1, $v_shipping_details['id'] ?? null, ['class'=>'w-full
                            mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none', 'required' =>
                            'required', 'placeholder'=>'Select Shipping Address ...']) !!}
                        </label>
                        <div class="change-address-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-4">
                            <button type="button" class="change-addr-cancel-btn btn red-bg red-btn text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Cancel</button>
                            <button type="submit" class="change-addr-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max text-center sm:ml-4">
                                Update </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif
            <div class="cart-page-wrapper width">
                
                @include('includes.partials.messages')
                @if(@$checkout)
                    <h1 class="font-semibold text-2xl">Delivery Information</h1>
                @elseif(@$processToPay)
                    <h1 class="font-semibold text-2xl">Process to pay</h1>
                @else
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                @endif
                <div class="cart-wrapper flex flex-col lg:flex-row w-full">
                    <div class="cart-items-wrapper lg:w-8/12 mt-6">

                        {{-- When in Process to pay page --}}
                        
                        <div class="payment-detail-container bg-white border border-solid border-gray-200 @if(!@$processToPay) hidden @endif">
                            <h3 class="p-2 md:p-4 text-lg font-semibold border-b border-solid border-gray-200 flex items-center">
                                Payment Details
                            </h3>
                            <div class="payment-detail detail-wrapper">
                                <form name="frm_payment" id="frm_payment" class="mt-4" method="POST" action="/order/payment-details" publishable-key="{{ env('STRIPE_KEY') }}">
                                    @csrf
                                    <input type="hidden" name="tax" value="{{get_tax()}}" />
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="name" class="p-2 md:p-4 relative block">
                                                Name On Card:
                                                <input type="text" name="bl_name" id="bl_name" required
                                                    placeholder="Name on card ..."
                                                    class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                            </label>
                                        </div>
                                        <div>
                                            <label for="bl_email" class="p-2 md:p-4 relative block">
                                                Email:
                                                <input type="text" name="bl_email" id="bl_email" required
                                                    placeholder="Email ..."
                                                    class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                            </label>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="bl_phone" class="p-2 md:p-4 relative block">
                                                Phone no:
                                                <input type="text" name="bl_phone" id="bl_phone" required
                                                    placeholder="Phone no ..."
                                                    class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
                                            </label>
                                        </div>

                                        {{-- <div id="card-element"></div> --}}
                                        <label for="number" class="p-2 md:p-4 relative block col-span-2">
                                            Card Number:
                                            <div class="card-number-input-wrapper flex border border-solid border-gray-200 mt-2 p-2 md:p-3 relative">
                                                <input type="text" required="" name="cardnumber" placeholder="Card number ..." class="w-11/12 focus:outline-none input-credit-card">
                                                <div class="card-icon-wrapper inline bg-gray-100 w-max h-full absolute right-0 top-0 p-2 md:p-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -mt-1" fill="none" viewBox="0 0 24 24" stroke="#333">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="card-expiry-detail-wrapper px-2 sm:px-4 mt-4 flex flex-col sm:flex-row">
                                        <label for="card-expire-month" class="relative block w-full">
                                            Expiry Month:
                                            <select required
                                                class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none"
                                                name="month">
                                                <option selected>Please Select ...</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </label>

                                        <label for="card-expire-year"
                                            class="sm:px-4 relative block mt-4 sm:mt-0 w-full">
                                            Expiry Year:
                                            <select required
                                                class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none"
                                                name="year">
                                                <option selected>Please Select ...</option>
                                                @php
                                                    $time = date('Y')
                                                @endphp
                                                @for ($i=0; $i < 10; $i++)
                                                    <option value="{{ (int)$time + (int)$i }}">{{ (int)$time + (int)$i }}</option>
                                                @endfor
                                            </select>
                                        </label>

                                        <label for="text" class="relative block mt-4 sm:mt-0 w-full">
                                            CVC:
                                            <input type="text" name="cvc" minlength="3" maxlength="4" required placeholder="Enter CVC ..."
                                                class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" autocomplete="new-text" />
                                        </label>
                                    </div>

                                    <div class="terms-acceptance-wrapper p-2 md:p-4 mt-4 leading-snug">
                                        <label for="agree_terms_conditions"
                                            class="terms block relative flex items-center">
                                            <input type="checkbox" id="agree_terms_conditions" class="mr-2" />
                                            <span class="text-gray-500">I’ve read and accept the </span><span
                                                class="lite-blue-color">&nbsp;<a
                                                    class="underline-anchors inline-flex relative overflow-hidden w-max"
                                                    href="/terms-and-conditions">terms & conditions.</a></span>
                                        </label>
                                    </div>

                                    <button type="submit" id="disable-button"
                                        class="place-order-btn btn blue-btn inline-block overflow-hidden relative py-2 md:py-3 px-4 md:px-6 lite-blue-bg-color text-white overflow-hidden relative ml-4 mt-4 z-10">Place
                                        Order</button>
                                </form>

                                <div
                                    class="secure-payment-img flex justify-center items-center m-4 mt-8 pt-4 border-t border-solid border-gray-200">
                                    <img class="secure-payment"
                                        src="assets/imgs/stripe5.jpg"
                                        alt="Secure Payment" />
                                </div>
                            </div>
                        </div>

                        @if($isCart)
                        <div
                            class="preferred-delivery-options-container bg-white p-2 sm:p-4 border border-solid border-gray-200">
                            <p class="text-gray-500 text-sm">
                                <strong>Sorry!</strong>, your cart is empty, <a
                                    class="lite-blue-color relative inline-flex overflow-hidden underline-anchors"
                                    href="{{ route('frontend.index') }}">click here to go back to the home page</a>
                            </p>
                        </div>
                        @else
                        {{-- @isset($address1)<a class="text-blue change_shipping_address"
                            href="javascript:;">Change</a> / @endisset<a class="text-blue main_image_link"
                            href="javascript:;">Add</a>
                    </div> --}}
                    @if(@$checkout)
                        @if($v_shipping_details)
                            <div class="preferred-delivery-options-container bg-white p-2 sm:p-4 border border-solid border-gray-200 mb-6"
                                id="select_address_container">
                                <div class="flex flex-wrap justify-between">
                                    @if(!@$processToPay)
                                    <p class="text-gray-500">Add Delivery Address</p>
                                    <a id="add_new_address" class="cursor-pointer text-blue-500">Add</a>
                                    @else
                                    <p class="text-gray-500">Delivery Address</p>
                                    @endif
                                </div>
                                <div class="flex flex-wrap justify-between mt-4">
                                    <div class="preferred-delivery-options-wrapper bg-gray-50 p-2 sm:p-4 border border-solid border-gray-200 w-full sm:w-max">
                                        <p>Address</p>
                                        <p class="text-gray-500 text-sm">
                                            {{ $v_shipping_details['address1'] }},
                                            @if(trim($v_shipping_details['address2']) != null)
                                            {{ $v_shipping_details['address2'] }},
                                            @endif
                                            {{ $v_shipping_details['city'] }}, {{ $v_shipping_details['zip'] }},
                                            @if(is_numeric($v_shipping_details['state']))
                                            {{ \App\Models\State::get_state_name($v_shipping_details['state']) }},
                                            @else
                                            {{ $v_shipping_details['state'] }},
                                            @endif
                                            {{ \App\Models\Country::get_country_name($v_shipping_details['country']) }}
                                        </p>
                                    </div>
                                    @if(!@$processToPay)
                                    <div class="">
                                        <a id="change_address" class="cursor-pointer text-red-500">Change</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="shipping-address-detail p-2 md:p-4 bg-white border border-solid border-gray-200 @if(@$v_shipping_details) hidden @endif"
                            id="shipping_address_detail_container">
                            <form method="POST" id="shipping-address" action="/dashboard/addresses">
                                @csrf
                                @livewire('frontend.cart-form',['countries'=>$countries])
                                <input type="hidden" name="latitude" id="latitude" />
                                <input type="hidden" name="longitude" id="longitude" />
                                <button type="submit" class="btn blue-btn inline-block py-2 md:py-3 px-4 md:px-6 lite-blue-bg-color text-white overflow-hidden relative z-10">Add</button>
                                <button type="button" class="btn blue-btn inline-block py-2 md:py-3 px-4 md:px-6 bg-red-500 text-white overflow-hidden relative z-10" id="cancel_new_address">Cancel</button>
                            </form>
                            <script>
                                setTimeout(async () => {
                                    let address_form = document.querySelector('#shipping-address');
                                    address_form.addEventListener('submit', (e)=>{
                                        e.preventDefault();
                                        let address_1 = e.target.querySelector('input[name=address1]').value;
                                        let address_2 = e.target.querySelector('input[name=address2]').value;
                                        
                                        let address = address_1;
                                        if(address_2!=null && address_2!='')
                                        {
                                            address += ', '+address_2;
                                        }
                                        address +=`, ${e.target.querySelector('input[name=city]').value}, ${e.target.querySelector('select[name=state]').value}, ${e.target.querySelector('input[name=zip]').value}`;
                                        let geocoder = new google.maps.Geocoder();
                                        geocoder.geocode({'address': address}, function(results, status) {
                                            if (status == 'OK') {
                                                e.target.querySelector('input[name=latitude]').value = results[0].geometry.location.lat();
                                                e.target.querySelector('input[name=longitude]').value = results[0].geometry.location.lng();
                                                e.target.submit();
                                            } else {
                                                console.log('Geocode was not successful for the following reason: ' + status);
                                            }
                                        });
                                    });
                                }, 300);
                            </script>
                        </div>
                    @elseif(!@$checkout && !@$processToPay)
                        <div
                            class="preferred-delivery-options-container bg-white p-2 sm:p-4 border border-solid border-gray-200">
                            <p class="text-gray-500">Preffered Delivery Options</p>
                            <div
                                class="preferred-delivery-options-wrapper bg-gray-50 p-2 sm:p-4 border border-solid border-gray-200 mt-4 w-full sm:w-max">
                                <p>Please select Item(s)</p>
                                <p class="text-gray-500 text-sm">Availability and promotions will be shown here</p>
                            </div>
                        </div>
                    @endif

                    <div class="select-all-wrapper bg-white p-2 sm:p-4 border border-solid border-gray-200 mt-6 flex justify-between">
                        <div class="select-all-items flex items-center text-sm text-gray-500">
                            {{-- When not in Payment Page --}}
                            @if(!@$processToPay)
                                <input id="select-all-cart" class="mr-2" type="checkbox" wire:click="selectAllItems({{ (int)$selectAll }})" @if($selectAll==true) checked
                                @endif /> Select All
                            @endif
                            <p><span
                                    class="total-items font-semibold lite-blue-bg-color px-1 rounded-full text-white mx-1">{{
                                    $selectedItems }}</span>Item(s)
                            </p>
                        </div>
                        {{-- When not in Payment Page --}}
                        @if(!@$processToPay)
                        <div class="remove-all-cart-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center hidden opacity-0 bg-black bg-opacity-70">
                            <div class="remove-all-cart-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 opacity-0 transition-all duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none"
                                    viewBox="0 0 24 24" stroke="#EF4444">
                                    <path class="path" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="remove-all-cart-popup-msg">All Item will be removed from your cart.</div>
                                <div
                                    class="remove-all-cart-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-6">
                                    <button
                                        class="cancel-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max text-center">
                                        Cancel </button>
                                    <button type="submit" wire:click="clearCart"
                                        class="remove-btn btn red-bg red-btn text-white z-10 py-2 md:py-3 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Remove
                                        All</button>
                                </div>
                            </div>
                        </div>
                        <div class="all-delete-wrapper flex items-center text-xs sm:text-sm text-red-600 w-max cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 all-delete-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span>Delete</span>
                        </div>
                        @endif
                    </div>

                    {{-- Vendor cart list --}}
                    <div class="all-vendor-container">
                        @php
                            $sub_total = 0;
                            $bogo_discount = 0;
                            $total_tax = 0;
                        @endphp
                        @foreach($cartItem as $vendor_id => $vendor_cart)
                            @php
                                $vendor = \App\Models\Vendor::get_vendor($vendor_id);
                            @endphp
                            @if(!@$processToPay || (@$processToPay && $vendor_cart['selected']==true))
                                <div class="vendor-container mt-6 p-2 sm:p-4 bg-white border border-solid border-gray-200">
                                    <div class="vendor-title-container border-b border-solid border-gray-200 pb-2 sm:pb-4 flex flex-wrap justify-between">
                                        <div class="vendor-title-wrapper flex flex-col">
                                            <div class="flex items-center">
                                                {{-- When not in Payment Page --}}
                                                @if(!@$processToPay)
                                                <input class="select-vendor" type="checkbox"
                                                    wire:click="selectVendor({{ $vendor_id }}, {{ (int)@$vendor_cart['selected'] }})"
                                                    @if((int)@$vendor_cart['selected']==1) checked @endif />
                                                @endif
                                                <a href="{{ @$vendor->slug }}" class="vendor-name flex items-center w-max">
                                                    <span class="ml-4 mr-0.5">{{ $vendor->name }}</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                                        viewBox="0 0 24 24" stroke="#333">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M9 5l7 7-7 7" />
                                                    </svg>
                                                    @if($vendor_cart['selected']==true)
                                                        @php
                                                            $total_tax += (float)$vendor_cart['tax'];
                                                        @endphp
                                                        <span>Tax: <span>{{number_format($vendor_cart['tax'],2)}}</span></span>
                                                    @endif
                                                </a>
                                            </div>
                                            {{-- When not in Payment Page --}}
                                            @if(!@$processToPay)
                                            @php
                                            $discount = get_vendor_discount('full',$vendor_id);
                                            @endphp
                                            @if($discount==0)
                                            <form class="flex mt-2" method="POST">
                                                @csrf
                                                <input type="hidden" name="vendor_id" value="{{ $vendor_id }}" />
                                                <input class="bg-white p-2 text-xs border border-solid border-gray-200 w-full"
                                                    type="text" name="couponCode" id="coupon_code-{{ $vendor_id }}" value=""
                                                    placeholder="Coupon Code" />
                                                <button type="submit"
                                                    class="btn black-btn relative overflow-hidden primary-black-bg text-white px-2 py-2 inline-block w-full z-10 text-xs"
                                                    vendor-id="{{ $vendor_id }}" style="height: auto !important;">Apply
                                                    coupon</button>
                                            </form>
                                            @else
                                            <div class="flex mt-2">
                                                <span>Discount: ${{ number_format($discount, 2) }}</span>
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="promotion-detail-wrapper flex flex-col justify-center text-sm text-gray-500 items-center">
                                            @if(@$vendor_cart['shipping_charges'])
                                            <div class="vendor-est-delivery-time lite-blue-color text-xs sm:text-sm"> Select Shipping Service </div>
                                            
                                            <div class="mt-2 px-1">
                                                <span class="bg-blue-500 cursor-pointer open-vendor-shipping-container px-2 py-1 text-white" vendor-id={{
                                                    $vendor_id }}>
                                                    {{ $vendor_cart['shipping_charges']['service'] }}: <span
                                                        class="font-semibold">${{
                                                        $vendor_cart['shipping_charges']['rate'] }}</span>
                                                </span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Vendor Shipping charges list --}}
                                    @if(@$vendor_cart['shipping_charges_list'])
                                        <div class="vendor-shipping-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center hidden opacity-0 bg-black bg-opacity-70"
                                            id="shipping-container-{{ $vendor_id }}">
                                            <div class="vendor-shipping-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 opacity-0 border border-solid border-gray-200"
                                                style="width: 400px; max-widht:95vw;">
                                                <div class="remove-from-cart-popup-msg pb-2">Shipping Charges from {{ $vendor->name }}.</div>
                                                <ul class="w-full charges_list" id="div-vendor-shipping-charges-{{ $vendor_id }}">
                                                    @foreach (@$vendor_cart['shipping_charges_list'] as $shipping)
                                                        <li class="mt-1 flex flex-wrap justify-between">
                                                            <label class="text-gray-500 text-xs sm:text-sm lg:text-base">
                                                                <input type="radio" value="{{ $shipping['enc'] }}" name="service_{{ $vendor_id }}" @if($vendor_cart['shipping_charges']['service']==$shipping['service']) checked @endif /> {{ $shipping['service'] }}
                                                            </label>
                                                            <span class="primary-black-color text-sm sm:text-base">
                                                                ${{ $shipping['rate'] }}
                                                            </span>
                                                            <input type="hidden" value="{{ $vendor_id }}" id="vendor_{{ $vendor_id }}">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="remove-shipping-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-6">
                                                    <button class="cancel-btn btn black-btn bg-black text-white z-10 py-2 px-4 overflow-hidden relative block w-max text-center" vendor-id={{ $vendor_id }}> Cancel </button>
                                                    <button class="select-btn btn lite-blue-bg-color blue-btn text-white z-10 py-2 px-4 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0" onclick="set_selected_shipping_service({{ $vendor_id }});">Select</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Vendor cart items list --}}
                                    @foreach($vendor_cart['list'] as $cart)
                                    @if(!@$processToPay || (@$processToPay && @$cart['selected']==true))
                                        @php
                                        if(!is_object($cart))
                                        {
                                            continue;
                                        }

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
                                            $item_price = $cart->attributes->discount ? $cart->attributes->price_discounted :
                                            $cart->attributes->price_catalog;
                                            $total_price = $item_price * $cart->quantity;
                                        }
                                        // if($cart->bogo_free)
                                        // {
                                        //     $total_price_discount = $cart->bogo_free * $item_price;
                                        //     $bogo_discount += $total_price_discount;
                                        //     $talal_price_after_bogo = $total_price - $total_price_discount;
                                        // }
                                        // if($cart->bogod_count)
                                        // {
                                        //     $discounted_price = ($item_price * $cart->bogod_percent) / 100;
                                        //     $total_price_discount = $cart->bogod_count * $discounted_price;
                                        //     $bogo_discount += $total_price_discount;
                                        //     $talal_price_after_bogo = $total_price - $total_price_discount;
                                        // }
                                        $wishlist = 0;
                                        if(Auth::user())
                                        {
                                            $wishlist = \App\Models\Wishlist::where([['product_id',$cart->id],['customer_id',Auth::user()->id]])->count();
                                        }
                                        $product_shipping = \App\Models\Product::where('id',$cart->id)->select('shipping_type')->first();
                                        @endphp
                                        <div class="vendor-cart-item flex items-center mt-4 justify-between">
                                            {{-- When not in Payment Page --}}
                                            @if(!@$processToPay)
                                            <input class="select-vendor-item" class="mr-2" type="checkbox"
                                                wire:click="selectItem({{ $cart->id }}, {{ (int)@$cart['selected'] }})"
                                                @if(@$cart['selected']) checked @endif />
                                            @endif

                                            <a href="{{ $cart->attributes->link }}"
                                                class="cart-img-wrapper sm:p-2 border border-solid border-gray-200 w-max ml-2 sm:ml-4">
                                                <img class="cart-img" src="{{$cart->attributes->image}}" />
                                            </a>
                                            <div class="cart-item-detail flex flex-col sm:flex-row mx-2 sm:mx-4 w-9/12">
                                                
                                                <div class="cart-item-detail flex flex-col w-full mr-2">
                                                    @if(session()->has('ses_shipping_details') && !$cart->available_for_shipping['success'])
                                                        <small class="text-red-500">{{$cart->available_for_shipping['message']}}</small>
                                                    @endif
                                                    <a href="{{ $cart->attributes->link }}"
                                                        class="cart-item-title lite-blue-color text-sm sm:text-base">{{ $cart->name
                                                        }}</a>
                                                    <div class="cart-item-sku mt-1 text-xs sm:text-sm text-gray-500">{{
                                                        $cart->attributes->sku }}</div>
                                                </div>
                                                <div class="vendor-item-quantity-wrapper flex items-center mt-2 sm:mt-0 h-max">
                                                    @if(!@$processToPay)
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline cursor-pointer vendor-item-quantity-add" fill="none" viewBox="0 0 24 24" stroke="#333" wire:click="cartItemUpdateQty({{ $cart->id }}, 'add')">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <input name="vendor-item-quantity" type="text" size="4" 
                                                            class="vendor-item-quantity h-max mx-2 border-gray-200 border-solid border text-center inline-block sm:py-1"
                                                            value="{{ $cart->quantity }}" disabled/>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline cursor-pointer vendor-item-quantity-less" fill="none" viewBox="0 0 24 24" stroke="#333" wire:click="cartItemUpdateQty({{ $cart->id }}, 'sub')">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    @else
                                                        <span class="vendor-item-quantity h-max mx-2 border-gray-200 border-solid border text-center inline-block sm:py-1">
                                                            {{ $cart->quantity }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="vendor-item-price-col flex flex-col w-max mx-2 text-right">
                                                <div class="vendor-item-new-price-wrapper font-semibold flex justify-end items-end">
                                                    <span class="currency mr-1">$</span>
                                                    <span class="vendor-item-new-price">{{number_format($cart->price,2)}}</span>
                                                </div>
                                                @if($cart->attributes->discount > 0)
                                                    <div class="vendor-cart-item-old-price text-xs sm:text-sm text-red-600 mt-2 line-through">
                                                    ${{ number_format($cart->attributes->price_catalog,2) }}</div>
                                                <div class="vendor-cart-item-disc text-xs sm:text-sm text-gray-500 text-xs mt-2">${{ $cart->attributes->discount }} Off</div>
                                                @endif
                                                @if(!@$processToPay)
                                                <div class="vendor-icon-wrapper flex mt-2 justify-end">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 cursor-pointer vendor-item-delete-icon mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="#333" cart-id={{ $cart->id }} >
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    @if(@$wishlist==0)
                                                    <form class="frm_add_to_wishlist" id="add-wishlist-form" method="post"
                                                        action="{{ url('dashboard/wishlist/store') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="product_id" class="product_id"
                                                            value="{{ $cart->id }}" />
                                                        <button type="submit" style="display: contents;">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6 cursor-pointer vendor-item-fav-icon" fill="none"
                                                                viewBox="0 0 24 24" stroke="#333">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1"
                                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer vendor-item-fav-icon" viewBox="0 0 24 24"
                                                        stroke="#dc2626" fill="#dc2626">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                    
                                    <div class="text-red-500">
                                        {{ $quantity_error }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        
                    </div>
                    @endif
                </div>
                <div
                    class="cart-summary-container lg:w-4/12 h-max mt-12 lg:mt-6 lg:ml-6 text-gray-500 lg:sticky lg:top-24">
                    @if(@$processToPay )
                        @php
                            if(!isset($v_shipping_detail ))
                            $v_shipping_detail = session()->get('ses_shipping_details');
                        @endphp
                    <div class="user-address-wrapper bg-white border border-solid border-gray-200 p-2 sm:p-4 mb-3">
                        <div class="mt-2 font-semibold primary-black-color flex justify-between items-center">
                            <span>Shipping Address</span>
                            <a id="change_address"
                                class="cursor-pointer text-red-500 font-normal inline underline-anchors relative overflow-hidden">Edit</a>
                        </div>
                        <div class="mt-2 user-name-wrapper flex items-center text-sm sm:text-base">
                            <span class="w-max inline-block">Name : </span>
                            <span class="user-name ml-1">{{ $v_shipping_details['first_name'] . ' '.
                                $v_shipping_details['last_name'] }}</span>
                        </div>

                        <div class="mt-2 user-address-wrapper flex  text-sm sm:text-base">
                            <span class="inline-block">Address : </span>
                            <span class="user-address ml-1">{{ $v_shipping_details['address1'] . ' ' .
                                $v_shipping_details['address2']. ' ' . $v_shipping_details['city']. ', '.
                                $v_shipping_details['state'] . ' '. $v_shipping_details['zip'] }}</span>
                        </div>

                        <div class="mt-2 user-contact-wrapper flex items-center text-sm sm:text-sm">
                            <span class="w-max inline-block">Contact : </span>
                            <span class="user-contact ml-1">{{ $v_shipping_details['phone'] }}</span>
                        </div>

                        <div class="mt-2 mb-2 user-email-wrapper flex items-center text-sm sm:text-sm">
                            <span class="w-max inline-block">Email : </span>
                            <span class="user-email ml-1">{{ $v_shipping_details['email'] }}</span>
                        </div>
                    </div>
                    @endif
                    
                    <div class="cart-summary-wrapper bg-white border border-solid border-gray-200 p-2 sm:p-4">
                        <div
                            class="subtotal-wrapper flex justify-between items-center border-b border-solid border-gray-200 py-3">
                            <div>Subtotal</div>
                            <div class="font-semibold primary-black-color">
                                <span class="currency">$</span>
                                <span class="subtotal">{{ number_format($subtotal, 2) }}</span>
                            </div>
                        </div>

                        <div
                            class="discount-wrapper flex justify-between items-center border-b border-solid border-gray-200 py-3">
                            <div>Discount</div>
                            <div>
                                <span class="currency">$</span>
                                <span class="discount">{{ number_format($discount, 2) }}</span>
                            </div>
                        </div>

                        <div
                            class="shipping-cost-wrapper flex justify-between items-center border-b border-solid border-gray-200 py-3">
                            <div>
                                <span>Shipping Cost</span>
                                @if(!@$processToPay)
                                <span class="shipping-cost-calculater text-xs p-0.5 text-white lite-blue-bg-color cursor-pointer blue-btn btn relative overflow-hidden inline-block z-10 w-max">Calculate</span>
                                @endif
                            </div>
                            <div>
                                <span class="currency">$</span>
                                <span class="shipping-cost">{{ number_format( $shipping_cost, 2) }}
                            </div>
                        </div>

                        <div class="shipping-cost-wrapper flex justify-between items-center border-b border-solid border-gray-200 py-3">
                            <div>
                                <span>Tax</span>
                            </div>
                            <div>
                                <span class="currency">$</span>
                                <span class="shipping-cost">{{ number_format( @$total_tax, 2) }}
                            </div>
                        </div>

                        <div class="grand-total-wrapper flex justify-between items-center py-3">
                            <div class="font-semibold primary-black-color">Grand Total</div>
                            <div class="font-semibold primary-black-color">
                                <span class="currency">$</span>
                                <span class="grand-total">{{ number_format($total + @$total_tax, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    @if(!@session()->get('ses_shipping_available'))
                        <p class="text-red-500 text-center mt-4">Please add shipping cost before proceed to pay!</p>
                    @elseif(!auth()->user())
                        <p class="text-red-500 text-center mt-4">Please <a href="/checkout" class="lite-blue-color">login</a> before move to checkout!</p>
                    @elseif($shipping_for_products == false && auth()->user())
                        <p class="text-red-500 text-center mt-4">Some of these products shippment not available for your provided address!</p>
                    @elseif(@$checkout && @$subtotal>0 && !$processToPay)
                        @if($v_shipping_details)
                            <a wire:click="activeProcessToPay()" id="proceed-to-pay"
                                class="cursor-pointer btn blue-btn relative overflow-hidden lite-blue-bg-color text-white px-4 md:px-6 py-2 md:py-3 inline-block w-max z-10 mt-4">
                                <span>Proceed To Pay</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                                    stroke="#fff">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @else
                            <p class="text-red-500 text-center mt-4">Please add delivery information before going to process!</p>
                        @endif
                    @elseif(!@$checkbox && !@$processToPay && $subtotal>0)
                        <button onclick="window.location.href='/checkout'" {{ $buttonCLass }}
                            class="btn blue-btn relative overflow-hidden lite-blue-bg-color text-white px-4 md:px-6 py-2 md:py-3 inline-block w-max z-10 mt-4">
                            <span>Proceed To Checkout</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                                stroke="#fff">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    @elseif((float)$subtotal==0)
                        <p class="text-red-500 text-center mt-4">Please select atleast one item to process your order!</p>
                    @endif
                    {{-- <div class="discount-coupon-container mt-12 w-full">
                        <div class="discount-coupon-wrapper">
                            <div class="text-lg primary-black-color font-semibold">Discount Coupon</div>

                            <input type="text" placeholder="Enter Coupon Code ..."
                                class="bg-white p-3 border border-solid border-gray-200 w-full mt-2 text-sm" />

                            <button
                                class="btn black-btn relative overflow-hidden primary-black-bg text-white px-4 md:px-6 py-2 md:py-3 inline-block w-max z-10 mt-4">Apply
                                Coupon</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        @if(\Request::getRequestUri() == '/order/payment-details?payment-details')
           loadCardPage();
        @endif
    </main>
    @push('after-scripts')
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHOn1pUHE2ctZTKuN_s49A9rt0wAtqGFI" ></script>
        <script defer src="{{ asset('assets/js/cart.js?v=0.02') }}"></script>
    @endpush
</div>