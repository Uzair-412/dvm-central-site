@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Basic Details</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th width="30%">Order ID</th>
                                    <td width="70%">{{ $data['order']->id }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($data['order']->created_at)->format('M d, Y H:i:s') }}
                                        &nbsp;
                                        ({{ \Carbon\Carbon::parse($data['order']->created_at)->diffForHumans() }})
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{{ \App\Models\Order::$statuses[$data['order']->order_status] }}</td>
                                </tr>
                                <tr>
                                    <th>Checkout Type</th>
                                    <td>
                                        @if($data['order']->customer_id > 0)
                                            Checkout by Registered Customer
                                        @else
                                            Guest Checkout
                                        @endif
                                    </td>
                                </tr>
                                @if($data['order']->ups_tracking_id != '')
                                    <tr>
                                        <th>Tracking ID</th>
                                        <td>{{ $data['order']->ups_tracking_id }}</td>
                                    </tr>
                                @endif
                                @if($data['order']->utm_code != '')
                                    <tr>
                                        <th>UTM Code</th>
                                        <td>
                                            {{ $data['order']->utm_code }}
                                            @if(isset($data['utm']->description))
                                                ({{ $data['utm']->description or '' }})
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <strong>List of Ordered Items</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th width="10%">Image</th>
                                    <th width="45%">Product</th>
                                    <th width="15%" class="text-right">Price</th>
                                    <th width="15%" class="text-right">Quantity</th>
                                    <th width="15%" class="text-right">Total</th>
                                </tr>
                                @foreach($data['product_list'] as $vendor_id => $vendor_item)
                                    <tr>
                                        <td colspan="5" class="text-left">
                                            @php
                                                $vendor = \App\Models\Vendor::get_vendor($vendor_id);
                                            @endphp
                                            <div class="pull-left">
                                                <h3><a href="{{ asset($vendor->slug) }}">{{ $vendor->name }}</a></h3>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach($vendor_item as $item)
                                        @php
                                            $total_price = $item->price * $item->quantity;
                                            $bogo = null;
                                            if(trim($item->bogo) != null)
                                                $bogo = json_decode($item->bogo);
                                        @endphp
                                        <tr>
                                            <td><img src="{{ $item->image != 'up_data/na.webp' ? $item->image : '../../'.$item->image }}" class="img-thumbnail" alt="{{ $item->name }}"></td>
                                            <td>{{ $item->name }}
                                                <br><em>&bull; {{ $item->sku }}</em>
                                            </td>
                                            <td class="text-right">
                                                @if(!is_null($bogo) && isset($bogo->is_free))
                                                    <div style="color: #FF0000;">Free Product</div>
                                                @else
                                                    @if($item->price_original > $item->price)
                                                        <div class="discounted-price">{{ '$'.number_format($item->price_original, 2) }}</div>
                                                    @endif
                                                    {{ '$'.number_format($item->price, 2) }}
                                                @endif
                                            </td>
                                            <td class="text-right">{{ $item->quantity }}</td>
                                            <td class="text-right">
                                                @if(!is_null($bogo) && isset($bogo->is_free))
                                                    <div style="color: #FF0000;">Free Product</div>
                                                @else
                                                    @if($item->price_original > $item->price)
                                                        <div class="discounted-price">{{ '$'.number_format($item->price_original * $item->quantity, 2) }}</div>
                                                    @endif
                                                    @if(!is_null($bogo))
                                                        @php
                                                            echo '<span !class="discounted-price">$'.number_format($total_price - $bogo->discount_amount, 2).'</span>';
                                                            if(isset($bogo->bogo_free))
                                                                echo  '<br><small>'.$bogo->bogo_free . ' free item(s)</small>';
                                                            else
                                                                echo  '<br><small>'.$bogo->bogod_percent.'% discount on ' . $bogo->bogod_count . ' item(s)</small>';
                                                        @endphp
                                                    @else
                                                        {{ '$'.number_format($total_price, 2) }}
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th width="75%" class="text-right">Sub Total</th>
                                    <td width="25%" class="text-right">{{ '$'.number_format($data['order']->sub_total, 2) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-right">Shipping Fee</th>
                                    <td class="text-right"><em>({{ $data['order']->shipping_service }})</em> &nbsp; {{ '$'.number_format($data['order']->shipping_fee, 2) }}</td>
                                </tr>
                                @if($data['order']->discount > 0)
                                    <tr>
                                        <th class="text-right">Discount</th>
                                        <td class="text-right">{{ '$'.number_format($data['order']->discount, 2) }}</td>
                                    </tr>
                                @endif
                                @if($data['order']->tax > 0)
                                    <tr>
                                        <th class="text-right">Tax</th>
                                        <td class="text-right">{{ '$'.number_format($data['order']->tax, 2) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th class="text-right">Grand Total</th>
                                    <td class="text-right"><strong>{{ '$'.number_format($data['order']->grand_total, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <strong>Shipping Details</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                @if($data['order']->customer_id > 0)
                                    <tr>
                                        <th width="30%">Customer Name</th>
                                        <td width="70%">{{ \App\Models\Customer::getCustomerName($data['order']->customer_id) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th width="30%">Email Address</th>
                                    <td width="70%"><a href="mailto:{{ $data['order']->email ?? 'N/A' }}">{{ $data['order']->email ?? 'N/A' }}</a></td>
                                </tr>
                                <tr>
                                    <th>Ship-to Name</th>
                                    <td>{{ $data['order']->first_name . ' ' . $data['order']->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td>{{ $data['order']->company ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Address Line 1</th>
                                    <td>{{ $data['order']->address1 }}</td>
                                </tr>
                                <tr>
                                    <th>Address Line 2</th>
                                    <td>{{ $data['order']->address2 ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $data['order']->city }}</td>
                                </tr>
                                <tr>
                                    <th>Zip / Postal Code</th>
                                    <td>{{ $data['order']->zip_code }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>
                                        @if(is_numeric($data['order']->state))
                                            {{ \App\Models\State::get_state_name($data['order']->state) }}
                                        @else
                                            {{ $data['order']->state }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ \App\Models\Country::get_country_name($data['order']->country) }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><a href="tel:{{ $data['order']->phone ?? 'N/A' }}">{{ $data['order']->phone ?? 'N/A' }}</a></td>
                                </tr>
                                <tr>
                                    <th>Notes</th>
                                    <td>{{ $data['order']->notes ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->
            @if($data['order']->order_status == 3)
                <div class="card">
                    <div class="card-header">
                        <strong>Followup Emails</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <tr>
                                    <th width="70%">Subject</th>
                                    <th width="30%">Date Sent</th>
                                </tr>
                                @foreach($data['messages'] as $message)
                                    <tr>
                                        <td><a href="javascript:;" onclick="show_message({{ $message->id }});">{{ $message->subject }}</a></td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($message->created_at)->format('M d, Y H:i:s') }} ({{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }})
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @if($data['order']->ac_emails > 2)
                            <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#modal_send_followup_messages">Send Followup Email</a>
                        @endif
                        <!-- START MODAL FOR SENT FOLLOWUP MESSAGES -->
                        <div class="modal fade" id="modal_send_followup_messages" tabindex="-1" role="dialog" aria-labelledby="modal_send_followup_messages_label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    {!! Form::open(array('route' => 'admin.orders.send-followup-email', 'method' => 'POST')) !!}
                                        <div class="modal-header">
                                            <h5 class="modal-title">Send Followup Message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                if($data['order']->country == 233 || $data['order']->country == 39)
                                                {
                                                    $messages = \App\Models\Messages::$subjects1;
                                                }
                                                else
                                                {
                                                    $messages = \App\Models\Messages::$subjects2;
                                                }
                                            @endphp
                                            {!! Form::select('ac_message', $messages, null,['class'=>'form-control', 'required', 'placeholder'=>'Please Select ...']) !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </div>
                                        {!! Form::hidden('order_id', $data['order']->id) !!}
                                        {!! Form::hidden('customer_id', $data['order']->customer_id) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL FOR SENT FOLLOWUP MESSAGES -->
                    </div>
                </div> <!-- end card -->
                <!-- START MODAL FOR SENT FOLLOWUP MESSAGES -->
                <div class="modal fade" id="modal_followup_messages" tabindex="-1" role="dialog" aria-labelledby="modal_followup_messages_label" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_followup_messages_subject"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modal_followup_messages_text">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL FOR SENT FOLLOWUP MESSAGES -->
            @else
                <div class="card">
                    <div class="card-header">
                        <strong>Payment Details</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <tr>
                                    <th width="30%">Transaction Tag</th>
                                    <td width="70%">{{ $data['order']->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Authorization Number</th>
                                    <td>{!! $data['order']->balance_transaction !!}</td>
                                </tr>
                                <tr>
                                    <th>Transaction Reference</th>
                                    <td>{!! $data['order']->payment_method !!}</td>
                                </tr>
                                <tr>
                                    <th>Card Number</th>
                                    <td>{!! $data['order']->card_number . ' - <em><strong>'. strtoupper($data['order']->card_type) .'</strong></em>' !!}</td>
                                </tr>
                                <tr>
                                    <th>Transaction Record</th>
                                    <td><a href="javascript:;" data-toggle="modal" data-target="#modal_transaction_record">Click to View</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> <!-- end card -->
                <!-- START MODAL FOR TRANSACTION RECORD -->
                <div class="modal fade" id="modal_transaction_record" tabindex="-1" role="dialog" aria-labelledby="modal_transaction_record_label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_transaction_record_label">Transaction Record</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body overflow-auto">
                                {!! nl2br($data['order']->receipt_url) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL FOR TRANSACTION RECORD -->
            @endif
            <div class="card">
                <div class="card-header">
                    <strong>Order Status Updates</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th width="10%">Subject</th>
                                    <th width="45%">Message</th>
                                    <th width="15%">Status</th>
                                    <th width="15%">Customer Notified</th>
                                    <th width="15%">Date</th>
                                </tr>
                                @foreach($data['notifications'] as $notification)
                                    <tr>
                                        <td>{{ $notification->subject }}</td>
                                        <td>{{ $notification->message }}</td>
                                        <td>{{ \App\Models\Order::$statuses[$notification->order_status] }}</td>
                                        <td>{{ ($notification->email_sent == 'Y') ? 'Yes' : 'No' }}</td>
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
            <div class="card">
                <div class="card-header">
                    <strong>Update Order Status</strong>
                </div>
                <div class="card-body">
                    {!! Form::open(array('route' => 'admin.orders.save-status', 'method' => 'POST')) !!}
                        <div class="form-group">
                            {!! Form::label('order_status', 'Status') !!}
                            {!! Form::select('order_status', \App\Models\Order::$statuses, null,['class'=>'form-control', 'required', 'placeholder'=>'Please Select ...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('ups_tracking_id', 'Shipping Tracking ID') !!}
                            {!! Form::text('ups_tracking_id', null,['class'=>'form-control', 'placeholder'=>'Please enter tracking ID ...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subject', 'Subject') !!}
                            {!! Form::text('subject', null,['class'=>'form-control', 'required', 'placeholder'=>'Please enter subject ...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('message', 'Message') !!}
                            {!! Form::textarea('message', null,['class'=>'form-control', 'required', 'placeholder'=>'Please enter message ...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email_sent', 'Notify Customer') !!}
                            <br>
                            {!! Form::checkbox('email_sent', 'Y', ['class'=>'form-control', 'placeholder'=>'Please Select ...']) !!} Yes, Send email to customer with status update
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        {!! Form::hidden('order_id', $data['order']->id) !!}
                        {!! Form::hidden('customer_id', $data['order']->customer_id) !!}
                    {!! Form::close() !!}
                </div>
            </div> <!-- end card -->
        </div>
    </div>
@stop