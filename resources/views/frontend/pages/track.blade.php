@extends('frontend.layouts.app')
@section('title', 'Track Your Order')
@php
    $url = URL::current();
@endphp
@push('head-area')
    <link rel="canonical" href="{{ $url }}" />
@endpush
@section('content')
<main id="tranck-order-page" class="relative">
    <div class="tranck-order-container">
        <div class="header-img w-full h-full relative overflow-hidden">
            <h1 class="text-3xl md:text-5xl absolute top-2/4 left-2/4 text-white z-20 text-center w-full md:w-auto px-2">Track Your Order</h1>
            <img
                class="absolute top-0 left-0 w-full h-full object-cover"
                src="assets/imgs/track-order/track-orderx1440.jpg"
                srcset="
                    assets/imgs/track-order/track-orderx1920.jpg 1920w,
                    assets/imgs/track-order/track-orderx1440.jpg 1440w,
                    assets/imgs/track-order/track-orderx1024.jpg 1024w,
                    assets/imgs/track-order/track-orderx768.jpg   768w,
                    assets/imgs/track-order/track-orderx576.jpg   576w
                "
                sizes="100%"
                alt="Track Your Order"
            />
        </div>

        <div class="track-order-wrapper sm-width mt-20">
            @if(isset($data['search']) && !is_null($data['order']))
                <div class="grid grid-cols-1 border border-solid border-gray-200 bg-white">
                    <div class="grid grid-cols-3 border-b border-solid border-gray-200 font-semibold text-sm md:text-base">
                        <div class="border-r border-solid border-gray-200 p-2">Message</div>
                        <div class="border-r border-solid border-gray-200 p-2">Status</div>
                        <div class="p-2">Date</div>
                    </div>
                    <div class="grid grid-cols-3 text-xs md:text-sm text-gray-500">
                        @foreach($data['order']->notifications as $notification)
                            <div class="border-r border-solid border-gray-200 p-2">{{ $notification->message }}</div>
                            <div class="border-r border-solid border-gray-200 p-2">{{ \App\Models\Order::$statuses[$notification->order_status] }}</div>
                            <div class="p-2">
                                {{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y H:i:s') }}
                                <br>
                                <em>({{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }})</em>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <h1 class="leading-snug text-xl font-semibold">Order Tracking</h1>
                <p class="mt-4 text-gray-500">To track your order please enter your Order ID in the box below and press the "Track Your Order" button.</p>
                @if(isset($data['search']) && is_null($data['order']))
                    <div class="text-green-700 bg-green-100 text-sm py-1 px-3">
                        Sorry!, we could not find any matching order.
                    </div>
                @endif
                {!! Form::open(array('method' => 'POST', 'name' => 'frm_track', 'id' => 'track-order-form', 'onsubmit' => 'show_overlay();', 'class' => 'ps-form--order-tracking')) !!}
                    <label for="track-order" class="font-semibold mt-4 flex flex-col leading-snug">
                        Order ID or UPS Shipping Number :
                        <input type="text" name="tracking_code" id="tracking_code" placeholder="Enter Your Order ID or Shipping Tracking Number..." class="border border-solid border-gray-200 p-2 sm:p-3 mt-4 text-sm focus:outline-none" />
                    </label>

                    <button type="submit" value="Track Your Order" class="mt-6 btn blue-btn px-4 md:px-6 py-2 md:py-3 lite-blue-bg-color text-white z-10 relative overflow-hidden">Track Your Order</button>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
</main>
    {{-- <div class="ps-page--simple">
        <div class="ps-order-tracking">
            <div class="container">
                @if(isset($data['search']) && !is_null($data['order']))
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Status Updates for Order # {{ $data['order']->id }}</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th width="60%">Message</th>
                                                <th width="15%">Status</th>
                                                <th width="25%">Date</th>
                                            </tr>
                                            @foreach($data['order']->notifications as $notification)
                                                <tr>
                                                    <td>{{ $notification->message }}</td>
                                                    <td>{{ \App\Models\Order::$statuses[$notification->order_status] }}</td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($notification->created_at)->format('M d, Y H:i:s') }}
                                                        <br>
                                                        <em>({{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }})</em>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                @else
                    <div class="ps-section__header">
                        <h3>Order Tracking</h3>
                        <p>To track your order please enter your Order ID in the box below and press the "Track Your Order" button.</p>
                    </div>
                    @if(isset($data['search']) && is_null($data['order']))
                        <div class="alert alert-info" role="alert">
                            Sorry!, we could not find any matching order.
                        </div>
                    @endif
                    <div class="ps-section__content">
                        {!! Form::open(array('method' => 'POST', 'name' => 'frm_track', 'id' => 'frm_track', 'onsubmit' => 'show_overlay();', 'class' => 'ps-form--order-tracking')) !!}
                            <div class="form-group">
                                <label for="tracking_code">Order ID or UPS Shipping Number:</label>
                                <input class="form-control" type="text" name="tracking_code" id="tracking_code" required placeholder="Enter Your Order ID or Shipping Tracking Number">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Track Your Order</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
    </div> --}}
@endsection