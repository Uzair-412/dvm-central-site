@extends('frontend.layouts.app')
@section('title', $data['meta_title'])
@section('meta_description', $data['meta_description'])
@php
    $url = URL::current();
@endphp
@push('after-styles')
<link rel="stylesheet" href="{{ asset('assets/styles/faq.css') }}" />
@endpush
@push('head-area')
    <link rel="canonical" href="{{ $url }}" />
@endpush
@section('content')
    {{-- <div class="ps-page--single">
            <div class="ps-container content-height">
                <div class="ps-section-title">
                    <h1>Frequently Asked Questions</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--faqs">
                            <tbody class="faqs-wrapper">
                                @if($data['faqs'])
                                @else
                                    <p><strong>Sorry!</strong>, no FAQ's found.</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       
        <div class="ps-call-to-action">
            <div class="container">
                <h3>Need Help - We’re Here to Help You! <a href="{{ route('frontend.contact') }}">Contact us</a></h3>
            </div>
        </div>
    </div> --}}

    <main id="faq-page" class="relative">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
            <h1 class="text-3xl md:text-5xl absolute top-2/4 left-2/4 text-white z-20 text-center w-full md:w-auto px-2">
                Frequently Asked Questions (FAQ)</h1>
            <img class="absolute top-0 left-0 w-full h-full object-cover" src="assets/imgs/faq/faqx1440.jpg"
                srcset="assets/imgs/faq/faqx1920.jpg 1920w, assets/imgs/faq/faqx1440.jpg 1440w, assets/imgs/faq/faqx1024.jpg 1024w"
                sizes="100%" alt="FAQ" />
        </div>
        <div class="faqs-container sm-width">
            <div class="faqs-wrapper grid grid-cols-1 text-sm sm:text-base mt-20">
                @if(count($data['faqs'])>0)
                    @foreach($data['faqs'] as $faq)
                        <div class="q-a-wrapper my-6">
                            <div class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bg-white border border-l-0">
                                <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                                <div class="question">{{ $faq->question }}</div>
                            </div>
                        
                            <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                                <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                                <div class="answer">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question">Can A Buyer Provide Feedback/Rating To A Seller On DVM Central Website?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">Yes, buyers can provide their rating and feedback to the seller by using their
                                email.</div>
                        </div>
                    </div>
        
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question">Can I See The Competitive Prices Of Different Sellers?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">Yes, each product price can be seen in front of the product catalog.</div>
                        </div>
                    </div>
        
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question">Can I Search The Product By Its Brand Name?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">
                                Yes, a buyer can search the product with its brand name, and then the buyer can contact the
                                seller and place the order via
                                <a class="underline-links relative overflow-hidden lite-blue-color font-semibold inline-flex"
                                    href="https://www.dvmcentral.com/">DVM Central
                                </a>.
                                
                            </div>
                        </div>
                    </div>
        
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question leading-none">I Am Ready To Purchase. Where Do I Start?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">
                                Visit <a
                                    class="underline-links relative overflow-hidden primary-black-color font-semibold inline-flex"
                                    href="https://www.dvmcentral.com/">DVM Central</a> to explore the surgical instruments of
                                various leading veterinary
                                manufacturers and suppliers. Specifically, you can enter the instrument's name in the search bar
                                to search instruments.
                            </div>
                        </div>
                    </div>
        
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question leading-none">How Do I Become A DVM Central Vendor?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">If you are willing to sell your surgical instruments on DVM Central, check the
                                seller policy to set up your shop. Ensure to meet the criteria of DVM Central for setting up
                                your global business.</div>
                        </div>
                    </div>
        
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question leading-none">How To Send A Product Inquiry To The Seller?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">
                                A buyer can send an inquiry to the seller by searching the product's name in the search bar, and
                                then the buyer can see the list of suppliers. When the buyer clicks on the supplier, they can
                                contact the seller.
                            </div>
                        </div>
                    </div>
        
                    <div class="q-a-wrapper my-6">
                        <div
                            class="question-wrapper font-semibold p-2 sm:p-3 flex items-center relative overflow-hidden bbg-white border border-l-0">
                            <span class="lite-blue-color text-3xl md:text-5xl mr-2">Q.</span>
                            <div class="question leading-none">What Is A Verified Vendor?</div>
                        </div>
        
                        <div class="answer-wrapper text-gray-500 p-2 sm:p-3 flex items-center relative overflow-hidden mt-2 bg-white border border-l-0">
                            <span class="primary-black-color text-3xl sm:text-5xl mr-2">A.</span>
                            <div class="answer">Vendors whose emails, contact details, and company names are verified with the
                                help of a call by DVM Central are known as verified vendors.</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
    {{-- <div class="container">
        <div class="row mb-5 mt-3">
            <div class="ps-section__header">
                <h2>Frequently Asked Question's</h2>
            </div>
        </div>
        <div class="row ps-section__content">
            @if($data['faqs'])
                <div class="accordion" id="accordion">
                    @foreach($data['faqs'] as $faq)
                        <div class="card shadow-lg">
                            <div class="card-header" id="{{ 'heading'. $faq->id }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link <?php echo $loop->first ? '' : 'collapsed'; ?>" data-toggle="collapse" data-target="#{{ 'collapse'. $faq->id }}" aria-expanded="<?php echo $loop->first ? 'true' : 'false'; ?>" aria-controls="{{ 'collapse'. $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h5>
                            </div>
                            <div id="{{ 'collapse'.  $faq->id }}" class="collapse <?php echo $loop->first ? 'show' : ''; ?>" aria-labelledby="{{ 'heading'. $faq->id }}" data-parent="#accordion" style="">
                                <div class="card-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p><strong>Sorry!</strong>, no FAQ's found.</p>
            @endif
        </div>
    </div> --}}
@endsection