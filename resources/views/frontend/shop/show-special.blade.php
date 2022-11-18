@extends('frontend.layouts.app')
@section('title', $data['page']->meta_title)
@section('meta_keywords', $data['page']->meta_keywords)
@section('meta_description', $data['page']->meta_description)
@section('content')
    <!-- Cart Page Start -->
    <div class="pt--5">
        @if(trim(strip_tags($data['page']->content)) != null)
            <div class="ps-container">
                <div class="row text-white pt-2">
                    {!! $data['page']->content !!}
                </div>
            </div>
        @endif
        @foreach($data['show_products'] as $key => $products)
            <!-- BLOCK -->
            <div style="background-color:#FFEA01;">
                <div class="ps-container">
                    <div class="row">
                        <h2 style="color:#000000!important;" class="text-white pt-2 pb-2 pl-3">{{ $key }}</h2><a name="{{ $key }}"></a>
                    </div>
                </div>
            </div>
            <div class="ps-container show-special">
                <div class="row">
                    @foreach($products as $sku)
                        @php
                            $link = null;
                            if(strstr($sku, '^'))
                            {
                                $exp = explode('^', $sku);
                                $sku = $exp[0];
                                $link = $exp[1];
                            }
                            $product = \App\Models\Product::getProductBySKU($sku);
                        @endphp
                        @if($product)
                            <div class="col-md-3 b-products">
                                <div class="card shadow-lg mt-2 mb-2" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
                                    <div class="card-body">
                                        {!! \App\Models\Product::productBlock($product, 'special', false, $link) !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- END BLOCK -->
        @endforeach
    </div>
    @if(!\Jenssegers\Agent\Facades\Agent::isMobile() && $data['show-rhs-nav'])
        <div class="sidenav">
            @foreach($data['show_products'] as $key => $products)
                <a href="{{ url()->current() . '#'. $key }}">{{ $key }}</a>
            @endforeach
        </div>
    @endif
    @push('head-area')
        <style>
            .site-wrapper {
                background-color: #2A62B2;
            }
            header {
                background-color: #FFFFFF;
            }
            .show-special .col-md-3 {
                padding-right: 7px !important;
                padding-left: 7px !important;
            }
            .show-special .pm-product {
                padding: 0px !important;
            }
            .show-special .card-body {
                min-height: 410px !important;
            }
            .sidenav {
                height: 350px;
                width: 150px;
                position: fixed;
                z-index: 1;
                top: 200px;
                right: 0;
                background-color: #111;
                overflow-x: hidden;
                padding-top: 20px;
            }
            .sidenav a {
                padding: 6px 8px 6px 16px;
                text-decoration: none;
                font-size: 14px;
                color: #818181;
                display: block;
            }
            .sidenav a:hover {
                color: #f1f1f1;
            }
            .main {
                margin-left: 160px; /* Same as the width of the sidenav */
                font-size: 28px; /* Increased text to enable scrolling */
                padding: 0px 10px;
            }
            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }
        </style>
    @endpush
@endsection