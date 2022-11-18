@extends('frontend.layouts.app')
@section('title', 'Checkout')
@section('content')
    <main class="ps-page--my-account">
        <section class="ps-section--account ps-checkout">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>Checkout Information</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-form__content">
                        @include('includes.partials.messages')
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div>
                                    <div class="card mb-5">
                                        <div class="card-header" id="acc_shipping_address">
                                            <h3 class="ps-form__billing-info mb-0 font-weight-normal">
                                                <i class="fa fa-home" aria-hidden="true"></i> Shipping Address
                                            </h3>
                                        </div>
                                        <div id="acc_body_shipping_address" aria-labelledby="acc_shipping_address" data-parent="#accordion">
                                            <div class="card-body">
                                                {!! Form::open(array('method' => 'POST', 'id' => 'frm_checkout_address')) !!}
                                                    <div class="ps-form__billing-info">
                                                        <div class="form-group">
                                                            @if(!$data['customer'])
                                                                {!! Form::label('email', 'Email Address:') !!}
                                                                {!! Form::text('email', @$data['v_shipping_details']['email'], ['type' => 'email', 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Enter email address ...', 'id' => 'sp_email']) !!}
                                                                <div id="div_sp_email" class="alert alert-info d-none mt--10" role="alert"></div>
                                                            @endif
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <div class="ps-checkbox">
                                                                <input class="form-control" type="checkbox" id="keep-update" placeholder="">
                                                                <label for="keep-update">Keep me up to date on news and exclusive offers?</label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('first_name', 'First Name:') !!}
                                                                    {!! Form::text('first_name', @$data['v_shipping_details']['first_name'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter first name ...']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('last_name', 'Last Name:') !!}
                                                                    {!! Form::text('last_name', @$data['v_shipping_details']['last_name'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter last name ...']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('company', 'Company:') !!}
                                                                    {!! Form::text('company', @$data['v_shipping_details']['company'],['class'=>'form-control', 'placeholder'=>'Enter company name ...']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('address1', 'Address *') !!}
                                                                    {!! Form::text('address1', @$data['v_shipping_details']['address1'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter address line 1...', 'id' => 'address1']) !!}
                                                                    <div class="mt-5">{!! Form::text('address2', @$data['v_shipping_details']['address2'],['class'=>'form-control', 'placeholder'=>'Enter address line 2 ...', 'id' => 'address2']) !!}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    {!! Form::label('country', 'Country:') !!}
                                                                    {!! Form::select('country', $data['countries'], @$data['v_shipping_details']['country'],['class'=>'form-control', 'required' => 'required', 'onchange="get_states(this.value);"', 'placeholder'=>'Select country ...']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('state', 'State:') !!}
                                                                    <div id="div_state">
                                                                        @php
                                                                            $show_text_field = true;
                                                                            if(isset($data['address']))
                                                                            {
                                                                                if(is_numeric($data['address']->state))
                                                                                    $show_text_field = false;
                                                                            }
                                                                        @endphp
                                                                        @if($show_text_field)
                                                                            {!! Form::text('state', @$data['v_shipping_details']['state'], ['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter state ...']) !!}
                                                                        @else
                                                                            {!! Form::select('state', $data['states'], @$data['v_shipping_details']['state'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter state ...']) !!}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('city', 'City:') !!}
                                                                    {!! Form::text('city', @$data['v_shipping_details']['city'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter city ...']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('zip', 'Zip / Post Code:') !!}
                                                                    {!! Form::text('zip', @$data['v_shipping_details']['zip'],['maxlength' => '9', 'class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter zip / post code ...']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    {!! Form::label('phone', 'Phone:') !!}
                                                                    {!! Form::text('phone', @$data['v_shipping_details']['phone'],['class'=>'form-control', 'required' => 'required', 'placeholder'=>'Enter phone ...']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <div class="ps-checkbox">
                                                                <input class="form-control" type="checkbox" id="save-next-time" placeholder="">
                                                                <label for="save-next-time">Keep me up to date on news and exclusive offers?</label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <button type="submit" class="ps-btn">Continue</button>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="card mt-5">
                                        <div class="card-header" id="acc_shipping_method">
                                            <h3 class="ps-form__billing-info mb-0">
                                                <a href="javascript:;" class="checkout-headers" disabled="disabled" data-toggle="collapse" data-target="#acc_body_shipping_method" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fa fa-truck" aria-hidden="true"></i> Shipping Method
                                                </a>
                                            </h3>
                                        </div>
                                        @php
                                            if((!empty($data['shipping_details']['email']) && !isset($data['shipping_rate'])) || $data['checkout_step'] == '2')
                                                $css = '';
                                            else
                                                $css = 'class="collapse"';
                                        @endphp
                                        <div id="acc_body_shipping_method" {!! $css !!} aria-labelledby="acc_shipping_method" data-parent="#accordion">
                                            <div class="card-body">
                                                {!! Form::open(array('route' => 'frontend.save-order', 'method' => 'POST', 'id' => 'frm_checkout_shipping')) !!}
                                                    <div class="alert alert-warning d-none" role="alert" id="shipping_alert">
                                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please select the shipping service to continue.
                                                    </div>
                                                    <div id="div_shipping_rates">
                                                        @if(isset($data['rates']) && !isset($data['rates']['status']))
                                                            @foreach($data['rates'] as $service)
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="shipping_service" value="{{ $service['enc'] }}" @if($service['selected']) checked="checked" @endif> {{ $service['service'] }} (${{ $service['rate'] }})
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @elseif(isset($data['rates']) && isset($data['rates']['status']) && $data['rates']['status'] == 0)
                                                            <div class="alert alert-warning" role="alert">{{ $data['rates']['message'] }}</div>
                                                        @else
                                                            <strong>Sorry, no quotes are available for this order at this time.</strong><br><br>
                                                        @endif
                                                    </div>
                                                    @php
                                                        $notes = '';
                                                        if(isset($data['shipping_details']['notes']))
                                                            $notes = $data['shipping_details']['notes'];
                                                    @endphp
                                                    <div id="div_shipping_notes" class="form-group">
                                                        {!! Form::label('notes', 'Shipping / Order Notes:') !!}<br>
                                                        {!! Form::textarea('notes', $notes, ['rows' => 4, 'placeholder'=>'Notes about your order, e.g. special notes for delivery ...', 'class' => 'form-control']) !!}
                                                    </div>
                                                    <div class="pt-1 form_group group_3 checkout-buttons" id="btn_checkout_shipping">
                                                        <button type="button" class="ps-btn" id="btn-submit-shipping">Continue</button>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                @include('frontend.includes.partials._cart-summary', ['view' => 'checkout', 'show_coupon' => false])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @push('head-area')
        <script src="https://js.stripe.com/v3/"></script>
    @endpush
    @push('after-scripts')
        <script>
            @if($data['v_shipping_details']['country'] != '')
                $(function(){
                    get_states($('#country').val(), '{{ $data['v_shipping_details']['state'] }}');
                });
            @endif
            @if(session()->get('move_to'))
                move_page_to('{{ session()->get('move_to') }}');
            @endif
        </script>
        <script src="static/js/stripe.js"></script>
    @endpush
@endsection