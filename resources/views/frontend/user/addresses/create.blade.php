@extends('frontend.layouts.app')
@section('title', appName() . ' | ' . __('navs.frontend.dashboard'))
@section('content')
    <div class="page-section sp-inner-page mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- My Account Tab Menu Start -->
                        @include('frontend.user.account._menu')
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-12 mt-5 mt-lg-0">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Create Address</h3>
                                        {!! Form::open(['route' => ['frontend.user.addresses.store'], 'method' => 'POST']) !!}
                                            @include('includes.partials.messages')
                                            <div class="row">
                                                <div class="col-md-12 order-2 order-sm-1">
                                                    @include('frontend.user.addresses._form')
                                                    <button type="submit" class="ps-btn">Submit</button>
                                                </div>
                                                <!--col-md-8-->
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection