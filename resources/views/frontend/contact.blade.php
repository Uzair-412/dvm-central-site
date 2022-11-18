@extends('frontend.layouts.app')
@section('title', __('Contact'))
@push('head-area')
    {{-- <link rel="canonical" href="{{ URL::to('/contact') }}" /> --}}
@endpush
@push('after-styles')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
@endpush
@section('content')
    <main id="contact-page" class="relative">
        <div class="contact-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.634839085011!2d-75.5467527!3d39.747852699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6fd3f6ad3ffff%3A0x7b2664056869f6f8!2s1201%20N%20Market%20St%20Suite%20111-A%2C%20Wilmington%2C%20DE%2019801%2C%20USA!5e0!3m2!1sen!2s!4v1654783216078!5m2!1sen!2s"
                width="100%" height="500"  allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="contact-wrapper width mt-20">
                <div class="mt-6 grid lg:grid-cols-2 gap-6">
                    <div class="contact-form-wrapper">
                        <h2 class="text-xl font-semibold">Get Office Info</h2>
                        <div class="font-semibold mb-6 py-4 text-gray-600">
                            {!! @$data['page']->content !!}
                        </div>
                        <h2 class="text-xl font-semibold mb-1">Send Us A Message</h2>
                        {{-- @include('includes.partials.messages') --}}
                        <span class="bg-green-100 border border-green-200 form-submitting-alert py-1 px-3 text-green-700 hidden"></span>
                        {!! Form::open([ 'id' => 'frm_contact', 'method' => 'POST','class' => 'p-4 border border-solid border-gray-200 bg-white mt-6']) !!}
                        @csrf
                        <label class="py-2 md:py-4 relative block" for="name">Name:
                            {!! Form::text('name', null, ['class' => 'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none', 'id' => 'name', 'required', 'autofocus', 'maxlength' => 191, 'placeholder' => 'Enter name ...']) !!}
                        </label>

                        <label class="py-2 md:py-4 relative block" for="email">Email:
                            {!! Form::text('email', null, ['class' => 'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none', 'id' => 'email', 'required', 'maxlength' => 191, 'placeholder' => 'Enter email ...']) !!}
                        </label>

                        <label class="py-2 md:py-4 relative block" for="phone">Phone:
                            {!! Form::text('phone', null, ['class' => 'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none', 'id' => 'phone', 'required', 'maxlength' => 191, 'placeholder' => 'Enter phone ...']) !!}
                        </label>

                        <label class="py-2 md:py-4 relative block" for="message">Message:
                            {!! Form::textarea('message', null, ['class' => 'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none','id' => 'message',  'required', 'row' => 3, 'cols' => '50', 'rows' => '5', 'placeholder' => 'Enter message ...']) !!}
                        </label>

                        @if (config('access.captcha.contact'))
                            @captcha
                            {!! Form::hidden('captcha_status', 'true') !!}
                        @endif

                        <button id="contact-us-button" class="btn blue-btn relative overflow-hidden lite-blue-bg-color text-white cursor-pointer z-10 px-4 md:px-6 py-2 md:py-3 inline my-2 sm:my-4">Send Information</button>
                        {!! Form::close() !!}
                    </div>

                    <div class="contact-details-wrapper mt-12 lg:mt-0">
                        <h2 class="text-xl font-semibold">Information</h2>
                        <p class="text-gray-500 text-sm sm:text-base mt-6">One-Stop-Resource For Your Veterinary Practices, Committed To Promote The Culture Of Direct Buying From Leading Manufacturers And Help Veterinary Practitioners Further Their Career To Reach New Heights Of Growth And Success!</p>
                        <div class="flex items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="font-semibold">Our Address</div>
                        </div>
                        <address class="text-gray-500 text-sm sm:text-base mt-2">1201 North Market Street, Suite 111, Wilmington, DE 19801</address>

                        <div class="flex items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <div class="font-semibold">Phone Number</div>
                        </div>

                        <p class="text-gray-500 text-sm sm:text-base mt-2">Office: <a href="tel:+13024097530">302-409-7530</a></p>

                        {{-- <div class="flex items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <div class="font-semibold">Email Address</div>
                        </div> --}}

                        {{-- <div class="text-gray-500 text-sm sm:text-base mt-2 flex items-center">
                            <span>Email :</span>
                            <a class="underline-anchors relative overflow-hidden inline-block ml-2"
                                href="mailto:info@gervetusa.com">info@gervetusa.com</a>
                        </div>

                        <div class="text-gray-500 text-sm sm:text-base mt-2 flex items-center">
                            <span>Support :</span>
                            <a class="underline-anchors relative overflow-hidden inline-block ml-2"
                                href="mailto:sales@gervetusa.com">sales@gervetusa.com</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- <div class="ps-page--single" id="contact-us">
        <div class="ps-contact-map shadow-lg">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d755.7139012381332!2d-73.66010864584585!3d40.74320270342025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c262ac07afaee5%3A0x3a8f888e638a0c2b!2sGerMedUSA%20Inc!5e0!3m2!1sen!2s!4v1625052270569!5m2!1sen!2s" height="500" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="ps-contact-form">
            <div class="ps-container">
                <div class="row">
                    <div class="col-md-8 card">
                        <div class="card-header">
                            <h4 class="card-title">SEND US A MESSAGE</h4>
                        </div>
                        <div class="card-body">
                            @include('includes.partials.messages')
                            {!! Form::open(array('route' => 'frontend.contact.send', 'method' => 'POST', 'files' => true, 'id' => 'frm_contact')) !!}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name:') !!}
                                            {!! Form::text('name', null,['class'=>'form-control shadow', 'required', 'autofocus', 'maxlength'=>191, 'placeholder'=>'Enter name ...']) !!}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email:') !!}
                                            {!! Form::text('email', null,['class'=>'form-control shadow', 'required', 'maxlength'=>191, 'placeholder'=>'Enter email ...']) !!}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('phone', 'Phone:') !!}
                                            {!! Form::text('phone', null,['class'=>'form-control shadow', 'required', 'maxlength'=>191, 'placeholder'=>'Enter phone ...']) !!}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {!! Form::label('message', 'Message:') !!}
                                            {!! Form::textarea('message', null,['class'=>'form-control shadow', 'required', 'row'=>3, 'placeholder'=>'Enter message ...']) !!}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                                @if (config('access.captcha.contact'))
                                    <div class="row">
                                        <div class="col">
                                            @captcha
                                            {!! Form::hidden('captcha_status', 'true') !!}
                                        </div><!--col-->
                                    </div><!--row-->
                                @endif
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-0 text-right clearfix">
                                            {!! Form::submit('Send Information', ['class'=>'ps-btn shadow']) !!}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                            {!! Form::close() !!}
                        </div><!--card-body-->
                    </div>
                    <div class="col-md-4 ps-section__header"><h4>GET OFFICE INFO.</h4>{!! @$data['page']->content  !!}</div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('after-scripts')
    @if (config('access.captcha.contact'))
        @captchaScripts
    @endif
    <script defer src="{{ asset('assets/js/contact.js') }}"></script>
@endpush
