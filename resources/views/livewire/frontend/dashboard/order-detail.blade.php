<style>
    .zoom {
      transition: transform .4s; /* Animation */
    }
    
    .zoom:hover {
      transform: scale(1.03);
      background-color: rgb(240, 234, 234);
    }
    </style>
<div>
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-300 mt-2 sm:mt-0">Order Details # {{ $order->id }}</div>
    <div class="p-4 bg-gray-50 border-b border-solid border-gray-300 font-semibold flex justify-between items-center mt-5 w-full border border-solid border-gray-100">
        <div class="flex flex-col text-left">
            <div>Order # {{ $order->id }}</div>
            <div class="user-order-date text-gray-500 flex items-center text-xs md:text-sm">{{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y H:i:s') }} ({{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }})</div>
        </div>
        <div class="order-total text-base md:text-lg font-semibold">${{ number_format($order->grand_total,2) }}</div>
    </div>
    @php
        $order_item = 1;
    @endphp
    @foreach($order->vendororders as $key => $vendor_order)
   
        <div class="order-detail-container zoom w-full mt-5 border border solid border-gray-300 related-news-img-wrapper p-6">
            <span class="font-bold mb-2">Item # {{$order_item++}}</span>
            <div class="text-base md:text-lg font-semibold p-4 bg-gray-100 border-b border-solid border-gray-300 flex items-center mt-2"><span class="mr-2">Sold By</span> <span class="btn lite-blue-bg-color text-white relative overflow-hidden z-10 inline-block px-1 rounded">{{ $vendor_order->vendor->name }}</span></div>
            <div class="flex flex-col basic-detail-wrapper m-2 sm:m-4 md:m-6 mt-4 border border-solid border-gray-300 text-xs sm:text-sm md:text-base">
                <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-300">
                    <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 font-semibold">Order Status</div>
                    <div class="p-2 sm:p-3 user-order-status w-8/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-300 flex items-center">{{ \App\Models\Order::$statuses[$order->order_status] }}</div>
                </div>
                @if(@$order->ups_tracking_id)
                    <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 font-semibold">Tracking ID</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-300 flex items-center">{{ $order->ups_tracking_id }}</div>
                    </div>
                @endif

                {{-- <div class="w-full flex flex-row items-stretch sm:items-center text-left bg-gray-50 border-b border-solid border-gray-300">
                    <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 font-semibold">Delivered On</div>
                    <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-300 flex items-center">Friday, Jan 12 13:00:00 EST 2020</div>
                </div> --}}

                <div class="w-full flex flex-row items-stretch sm:items-center text-left">
                    <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 font-semibold">Shipping</div>
                    <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-300 flex items-center">{{ $vendor_order->shipping_service }}</div>
                </div>
            </div>

            <div class="order-list-container w-full mt-5">
                @foreach($vendor_order->vendor_items as $key => $item)
                    <div class="flex flex-col w-full">
                        <div class="p-4 bg-gray-50 border-b border-t border-solid border-gray-300 font-semibold">List of Ordered Items</div>
                        <div class="order-list-outer-wrapper overflow-x-scroll overflow-y-hidden lg:overflow-hidden">
                            <div class="order-list-wrapper m-2 sm:m-4 md:m-6 border border-solid border-gray-300">
                                <div class="cart-detail-wrapper">
                                    <div class="grid grid-cols-7 w-full bg-gray-50 p-4 font-bold border-b border-solid border-gray-300 gap-x-2 md:gap-x-4">
                                        <div class="col-span-1 text-center">Image</div>
                                        <div class="col-start-2 col-end-5 text-center">Product</div>
                                        <div class="col-span-1 text-center">Price</div>
                                        <div class="col-span-1 text-center">Quantity</div>
                                        <div class="col-span-1 text-center">Total</div>
                                    </div>

                                    <div class="grid grid-cols-7 w-full p-2 sm:p-4 items-center gap-x-2 md:gap-x-4">
                                        <div class="col-span-1 cart-product-img-wrapper flex items-center justify-center border-gray-300 border-solid border w-full h-full">
                                            @if($item->image != '')
                                                <img class="w-full lg:w-10/12 p-0.5 sm:p-2 lg:p-0 cart-img" src="{{$item->image}}" alt="{{$item->name}}"/>
                                            @else
                                                <img class="w-full lg:w-10/12 p-0.5 sm:p-2 lg:p-0 cart-img" src="https://via.placeholder.com/89X89.png" alt="{{$item->name}}" />
                                            @endif
                                        </div>

                                        <a href="{{ $item->slug }}" class="cart-product-detail flex flex-col justify-center col-start-2 col-end-5 border-gray-300 border-solid border w-full h-full p-2">
                                            <span class="leading-normal font-semibold text-xs sm:text-sm md:text-base">{{ $item->name }}</span>
                                            <span class="cart-product-sku mt-2 text-gray-500 text-xs md:text-sm lite-blue-color">{{ $item->sku }}</span>
                                        </a>

                                        <div class="cart-product-price font-semibold border-gray-300 border-solid border w-full h-full flex justify-center items-center overflow-hidden p-1 text-xs sm:text-sm md:text-base">${{ $item->price }}</div>

                                        <div class="cart-quantity-wrapper border-gray-300 border-solid border w-full h-full flex justify-center items-center overflow-hidden w-full h-full text-xs sm:text-sm md:text-base">{{ $item->quantity }}</div>

                                        <div class="cart-total font-semibold border-gray-300 border-solid border w-full h-full flex justify-center items-center overflow-hidden text-xs sm:text-sm md:text-base">${{ number_format($item->price * $item->quantity,2) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="cart-total-wrapper border border-solid border-gray-300 w-full text-xs sm:text-sm md:text-base mt-5">
        <div class="subtotal flex w-full bg-gray-50 border-b border-solid border-gray-300">
            <div class="w-6/12 text-center p-2 sm:p-3 border-r border-solid border-gray-300 font-semibold">Sub Total</div>
            <div class="w-6/12 text-center p-2 sm:p-3 text-gray-500">{{ '$' . number_format($order->sub_total, 2) }}</div>
        </div>
        <div class="shipping-wrapper flex items-center w-full bg-white border-b border-solid border-gray-300">
            <div class="w-6/12 text-center p-2 sm:p-3 border-r border-solid border-gray-300 font-semibold">Shipping Fee</div>
            <div class="w-6/12 text-center text-gray-500">  {{ '$' . number_format($order->shipping_fee, 2) }}</div>
        </div>
        <div class="shipping-wrapper flex items-center w-full bg-white border-b border-solid border-gray-300">
            <div class="w-6/12 text-center p-2 sm:p-3 border-r border-solid border-gray-300 font-semibold">
            Tax</div>
            <div class="w-6/12 text-center text-gray-500">{{ '$' . number_format($order->tax, 2) }}</div>
        </div>
        <div class="grandtotal flex items-center w-full bg-gray-50 font-semibold">
            <div class="w-6/12 text-center p-2 sm:p-3 border-r border-solid border-gray-300">Grand Total</div>
            <div class="w-6/12 text-center">{{ '$' . number_format($order->grand_total, 2) }}</div>
        </div>
    </div>

    <div class="mt-5 w-full">
        <div class="shipping-detail-container w-full">
            <div class="flex flex-col border border-solid border-gray-300 w-full">
                <div class="p-4 bg-gray-50 border-b border-solid border-gray-300 font-semibold">Shipping Details</div>
                <div class="shipping-detail-wrapper m-2 sm:m-4 md:m-6 border border-solid border-gray-300 text-xs sm:text-sm md:text-base">
                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Customer Name</div>
                        <div class="p-2 sm:p-3 user-order-id w-8/12 sm:w-9/12 text-gray-500">Bryan David</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Email Address</div>
                        <div class="p-2 sm:p-3 user-order-date w-8/12 sm:w-9/12 text-gray-500">{{ $order->email ?? 'N/A' }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Ship to Name</div>
                        <div class="p-2 sm:p-3 user-order-status w-8/12 sm:w-9/12 text-gray-500">{{ $order->first_name . ' ' . $order->last_name }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Company</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->company ?? 'N/A' }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Address Line 1</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->address1 }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Address Line 2</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->address2 ?? 'N/A' }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">City</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->city }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">ZIP / Postal Code</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->zip_code }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">State</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">
                            @if (is_numeric($order->state))
                                {{ \App\Models\State::get_state_name($order->state) }}
                            @else
                                {{ $order->state }}
                            @endif
                        </div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Country</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ \App\Models\Country::get_country_name($order->country) }}</div>
                    </div>

                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Phone</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->phone ?? 'N/A' }}</div>
                    </div>

                    <div class="w-full flex items-center text-left">
                        <div class="p-2 sm:p-3 w-4/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Notes</div>
                        <div class="p-2 sm:p-3 tracking-id w-8/12 sm:w-9/12 text-gray-500">{{ $order->notes ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 w-full">
        <div class="payment-detail-container w-full">
            <div class="flex flex-col border border-solid border-gray-300 w-full">
                <div class="p-4 bg-gray-100 border-b border-solid border-gray-300 font-semibold">Payment Details</div>
                <div class="payment-detail-wrapper m-2 sm:m-4 md:m-6 border border-solid border-gray-300 text-xs sm:text-sm md:text-base">
                    <div class="w-full flex items-center text-left border-b border-solid border-gray-300">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Transaction ID</div>
                        <div class="p-2 sm:p-3 user-order-id w-7/12 sm:w-9/12 text-gray-500">{{ $order->payment_method }}</div>
                    </div>
                    <div class="w-full flex items-center text-left">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 border-r border-solid border-gray-300 font-semibold">Card Number</div>
                        <div class="p-2 sm:p-3 user-order-id w-7/12 sm:w-9/12 text-gray-500">{!! $order->card_number . ' - <em><strong>' . strtoupper($order->card_type) . '</strong></em>' !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 w-full">
        <div class="order-status-detail-container w-full">
            <div class="flex flex-col border border-solid border-gray-300 w-full font-normal leading-snug">
                <div class="p-4 bg-gray-50 border-b border-solid border-gray-300 font-semibold">Order Status Details</div>
                <div class="order-detail-outer-wrapper overflow-x-scroll overflow-y-scroll lg:overflow-hidden">
                    <div class="order-status-detail-wrapper m-2 sm:m-4 md:m-6 border border-solid border-gray-300 grid grid-cols-5 text-xs sm:text-sm md:text-base">
                        <div class="heading border-r border-b border-solid border-gray-300 p-2 sm:p-3 bg-gray-50 font-semibold">Subject</div>
                        <div class="heading border-r border-b border-solid border-gray-300 p-2 sm:p-3 bg-gray-50 font-semibold col-span-2">Message</div>
                        <div class="heading border-r border-b border-solid border-gray-300 p-2 sm:p-3 bg-gray-50 font-semibold text-center">Status</div>
                        <div class="heading p-2 sm:p-3 border-b border-solid border-gray-300 bg-gray-50 font-semibold text-center">Date</div>
                        @foreach ($notifications as $key => $notification)
                            @if($key%2 == 0)
                                <div class="p-2 sm:p-3 text-gray-500 border-r border-solid border-gray-300">{{ $notification->subject }}</div>
                                <div class="p-2 sm:p-3 text-gray-500 border-r border-solid border-gray-300 col-span-2">{{ $notification->message }}</div>
                                <div class="p-2 sm:p-3 text-gray-500 border-r border-solid border-gray-300 text-center">{{ \App\Models\Order::$statuses[$notification->order_status] }}</div>
                                <div class="p-2 sm:p-3 text-gray-500 flex flex-col text-center">
                                    <span class="order-date">{{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y') }}</span>
                                    <span class="order-time mt-1">{{ \Carbon\Carbon::parse($notification->created_at)->format('H:i:s') }}</span>
                                    <span class="order-time-passed mt-1">({{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }})</span>
                                </div>
                            @else
                                <div class="p-2 sm:p-3 border-r border-solid border-gray-300 font-semibold border-t bg-gray-50 font-semibold">{{ $notification->subject }}</div>
                                <div class="p-2 sm:p-3 border-r border-solid border-gray-300 font-semibold border-t bg-gray-50 font-semibold col-span-2">{{ $notification->message }}</div>
                                <div class="p-2 sm:p-3 border-r border-solid border-gray-300 font-semibold border-t bg-gray-50 font-semibold text-center">{{ \App\Models\Order::$statuses[$notification->order_status] }}</div>
                                <div class="p-2 sm:p-3 flex flex-col text-center border-t border-solid border-gray-300 font-semibold bg-gray-50 font-semibold">
                                    <span class="order-date">{{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y') }}</span>
                                    <span class="order-time mt-1">{{ \Carbon\Carbon::parse($notification->created_at)->format('H:i:s') }}</span>
                                    <span class="order-time-passed mt-1">({{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }})</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
