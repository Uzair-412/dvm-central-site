<div>
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200">Your Orders</div>
    <div class="mt-5 w-full overflow-x-scroll sm:overflow-x-hidden">
        <div class="table-heading-container">
            <div class="table-heading-wrapper grid grid-cols-7 lg:grid-cols-8 bg-gray-50 p-4 border border-solid border-gray-200 font-semibold text-sm md:text-base">
                <div class="table-heading">Order ID</div>
                <div class="table-heading col-span-2 lg:col-span-3">Ship To Name</div>
                <div class="table-heading text-center">Amount</div>
                <div class="table-heading text-center col-span-2">Purchase Date</div>
                <div class="table-heading text-center">Status</div>
            </div>
            @if(count($orders)>0)
                @foreach ($orders as $order)
                    <div class="db-detail-wrapper text-gray-500 text-xs md:text-sm">
                        <a href="{{ route('frontend.user.dashboard.orders.detail', $order->id) }}" class="db-detail grid grid-cols-7 lg:grid-cols-8 mt-5 p-4 bg-white border border-solid border-gray-200 db-links relative overflow-hidden z-10">
                            <div id="product-id">{{ $order->id }}</div>
                            <div id="user-provided-name" class="col-span-2 lg:col-span-3">{{ $order->first_name . ' ' . $order->last_name }}</div>
                            <div class="text-center">$<span id="user-order-amount">{{ number_format($order->grand_total, 2) }}</span></div>
                            <div id="purchased-date" class="col-span-2 text-center">{{ timezone()->convertToLocal($order->created_at, 'F jS, Y H:i') }}</div>
                            <div id="status" class="text-center bg-red-500 text-white text-xs w-max p-1 justify-self-center">{{ \App\Models\Order::$statuses[$order->order_status] }}</div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="text-center mt-2 text-blue-500">
                    <strong class="text-blue-500">Sorry!</strong>, no order found.
                </div>
            @endif
        </div>
    </div>
</div>