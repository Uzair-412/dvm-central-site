@extends('frontend.layouts.app')
@section('title', $data['page']->meta_title)
@section('meta_keywords', $data['page']->meta_keywords)
@section('meta_description', $data['page']->meta_description)
@section('content')
    <div class="ps-page--single ps-page--vendor">
        <section class="ps-store-list">
            <div class="ps-container">
                <div class="ps-section__wrapper">
                    <div class="ps-section__left">
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Product Search</h3>
                            <div class="form-group--icon">
                                <input class="form-control" type="text" placeholder="Search..."><i class="icon-magnifier"></i>
                            </div>
                        </aside>
                        @if(isset($data['bogo_categories']))
                            <aside class="widget widget--vendor">
                                <h3 class="widget-title">CATEGORIES</h3>
                                <ul class="ps-list--arrow">
                                    @foreach($data['bogo_categories'] as $category)
                                        <li style="text-wrap: none;" id="b-li-{{ $category['id'] }}" class="b-lis"><a class="active" href="javascript:;" onclick="show_bogo_products({{ $category['id'] }});">{{ $category['name'] }}&nbsp;({{ $category['count'] }})</a></li>
                                    @endforeach
                                </ul>
                            </aside>
                        @endif
                        <div class="single-sidebar pt-5">
                            {!! \App\Models\Banner::showBanner(9, 'promo-image overflow-image') !!}
                        </div>
                    </div>
                    <div class="ps-section__right">
                        <div class="ps-shopping ps-tab-root">
                            <div class="ps-shopping__header">
                                <h1>{{ $data['page']->heading }}</h1>
                            </div>
                            <div>
                                {!! $data['page']->content  !!}
                            </div>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-shopping-product">
                                        <div class="row">
                                            @foreach($data['bogo_products'] as $product)
                                                @php
                                                    $css = '';
                                                    foreach($product->cats as $cat)
                                                    {
                                                        $css .= 'b-cat-'.$cat.' ';
                                                    }
                                                @endphp
                                                {{-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 b-products {{ $css }}"> --}}
                                                    {!! \App\Models\Product::productBlock($product, 'bogo') !!}
                                                {{-- </div> --}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection