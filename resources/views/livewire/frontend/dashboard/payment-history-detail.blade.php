<div>
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200 mt-2 sm:mt-0">Payment Detail</div>
        <div class="mt-5 w-full">
            <div class="order-detail-container w-full">
                <div class="basic-detail-wrapper mt-2 sm:mt-4 md:mt-6 border border-solid border-gray-200 text-xs sm:text-sm md:text-base">
                    <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-200">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 font-semibold">Title</div>
                        @php
                            $link='';
                            if($payment->ref_type == 'order')
                            {
                                $link = '/dashboard/orders/'.$payment->ref_id;
                            }
                        @endphp
                        <a href="{{ $link }}" class="p-2 sm:p-3 user-order-id w-7/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-200 flex items-center">{{ $payment->title }}</a>
                    </div>

                    <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-200 bg-gray-50">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 font-semibold">Amount</div>
                        <div class="p-2 sm:p-3 user-order-date w-7/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-200 flex items-center break-all">${{ number_format($payment->amount, 2) }}</div>
                    </div>

                    <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-200">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 font-semibold">Card Number</div>
                        <div class="p-2 sm:p-3 user-order-status w-7/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-200 flex items-center break-all">{!! $payment->card_number . ' - <em><strong>' . strtoupper($payment->card_type) . '</strong></em>' !!}</div>
                    </div>

                    <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-200 bg-gray-50">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 font-semibold">Transaction Tag</div>
                        <div class="p-2 sm:p-3 tracking-id w-7/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-200 flex items-center break-all">{{ $payment->transaction_id }}</div>
                    </div>
                    <div class="w-full flex flex-row items-stretch sm:items-center text-left border-b border-solid border-gray-200">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 font-semibold">Authorization Number</div>
                        <div class="p-2 sm:p-3 tracking-id w-7/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-200 flex items-center break-all">{!! $payment->balance_transaction !!}</div>
                    </div>
                    <div class="w-full flex flex-row items-stretch sm:items-center text-left bg-gray-50">
                        <div class="p-2 sm:p-3 w-5/12 sm:w-3/12 font-semibold">Transaction Reference</div>
                        <div class="p-2 sm:p-3 tracking-id w-7/12 sm:w-9/12 text-gray-500 border-l border-solid border-gray-200 flex items-center break-all">{!! $payment->payment_method !!}</div>
                    </div>
                </div>
                {{-- <div class="flex flex-col border border-solid border-gray-200 w-full">
                    <div class="p-4 bg-gray-50 border-b border-solid border-gray-200 font-semibold">Payment Details</div>
                    
                </div> --}}
            </div>
        </div>
    </div>
</div>
