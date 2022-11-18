@extends('frontend.layouts.app')
@section('title', $data['vendor']->name)
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('static/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
@endpush
@section('content')
    @if($data['banner_header'] != '')
        @php
            $path = 'banners/vendor/' . $data['banner_header']->image;
        @endphp
        <img class="w-100" src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/1519x304.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{ $data['banner_header']->name }}">
    @else
        <img class="w-100" src="https://via.placeholder.com/1519x304.png?text=Banner+Top" alt="">
    @endif
    <div class="ps-container vendor-nav">
        <input type="hidden" name="VendorSearch" value="Vendor Search Page">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ $data['vendor']->slug }}">{{ $data['vendor']->name }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach ($data['page_list']->take(3) as $page)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$page->slug}}">{{$page->name}}</a>
                        </li>
                    @endforeach
                    @if (($data['page_list']->count() > 3))
                        <div class="menu--product-categories">
                            <div class="menu__toggle">
                                <i class="fa fa-caret-down pt-3" aria-hidden="true"></i>
                            </div>
                            <div class="menu__content">
                                <ul class="menu--dropdown list-unstyled">
                                    @foreach ($data['page_list']->skip(3) as $page)
                                        <li><a href="{{$page->slug}}">{{$page->name}}</a></li>
                                    @endforeach 
                                </ul>
                            </div>
                        </div>
                    @endif
                </ul>
                <form class="form-inline my-2 my-lg-0 flex-nowrap" action="search-result" id="search-results" method="get">
                    <input type="hidden" name="id" id="id" value="{{$data['vendor']->user}}" placeholder="Search in Store" aria-label="Search">
                    <input class="form-control mr-sm-2 vendor-search-field" name="s" id="search_input1" type="search" placeholder="Search in Store" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0 btn-lg" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
    <div class="ps-container">
        <div class="ps-page--shop" id="shop-sidebar">
            <div class="ps-layout--shop">
                @include('frontend.includes.partials.left-bar-for-shop')
                <div class="ps-layout__right" data-select2-id="8">
                    <div class="ps-page__header">
                        <h3>Search Results for "{{$data['search'] }} </h3>
                    </div>
                    @forelse ($data['list-products'] as $deals)
                        {!! \App\Models\Product::productBlock($deals, 'list', true) !!}
                        {{-- <div class="ps-shopping-product">
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail d-flex align-items-center">
                                    <a href="{{url($deals->slug)}}">
                                        @if($deals->image != '' || $deals->image != NULL )
                                            @php
                                                $path = 'products/images/thumbnails/' . $deals->image;
                                            @endphp
                                            <img class="lazyload w-100" data-src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/189X189.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{ $deals->name }}">
                                        @else
                                            <img class="lazyload w-100" data-src="{{url('up_data/na.webp')}}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="p-5">
                                    <div class="ps-product__content"><a class="ps-product__title" href="{{url($deals->slug)}}">{{$deals->name}}</a>
                                        <div class="row">
                                            <div class="col">
                                                <div class="ps-product__rating">
                                                    @php
                                                        $rating = App\Models\Review::where(['status'=> 'Y','product_id'=> $deals->id])->get();
                                                        $ratingcount = round($rating->avg('rating'));
                                                    @endphp
                                                    <select class="ps-rating" data-read-only="true">
                                                        @for ($i=1; $i <= $ratingcount; $i++ )
                                                            <option value="1">{{$i}}</option>
                                                        @endfor 
                                                        @for ($i=5; $i>$ratingcount; $i--)
                                                            <option value="0">{{$i}}</option>
                                                            <option value="2">{{$i}}</option>
                                                        @endfor
                                                    </select><span>{{ $rating->avg('rating') == NULL ? '0.00' : round($rating->avg('rating'), 2) }} Star </span>
                                                </div>
                                                <p class="ps-product__vendor">Sold by: <a href="{{url($deals->vendor->slug)}}">{{$deals->vendor->name}}</a></p>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex justify-content-end w-100 mb-2">
                                                    @auth
                                                        <form class="frm_add_to_wishlist" method="post" action="{{url('dashboard/wishlist/store')}}">
                                                            @csrf
                                                            <input type="hidden" name="product_id" class="product_id" value="{{$deals->id}}" />
                                                            <button class="btn py-0" type="submit" data-placement="top" title="Add to Whishlist"><i class="icon-heart" style="font-size : 30px"></i></button>
                                                        </form>
                                                    @endauth
                                                    @guest
                                                        <a href="/login" data-placement="top" title="Add to Whishlist"><i class="icon-heart" style="font-size : 30px"></i></a>
                                                    @endguest
                                                    <form method="post" action="comparison-search">
                                                        @csrf
                                                        <input type="hidden" name="name" value="{{$deals->name}}" />
                                                        <button class="btn py-0" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars" style="font-size : 30px"></i></a>
                                                    </form>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__shopping">
                                            @if($deals->type != 'variation')
                                                @if ($deals->price_discounted_end < date('Y-m-d'))
                                                    <h4 class="ps-product__price sale"><span>$ {{$deals->price_catalog}}</span> </h4>
                                                @else
                                                    <h4 class="ps-product__price sale"><span>$ {{$deals->price}}</span> <del>${{$deals->price_catalog}}</del> <small>(-{{round((($deals->price_catalog-$deals->price)/$deals->price_catalog)*100,2)}}%)</small> </h4>
                                                @endif
                                            @endif
                                            @if($deals->type == 'variation')
                                                <a type="submit" class="ps-btn" href="{{url($deals->slug)}}">Read Details</a>
                                            @else
                                                <form class="frm_add_to_cart" method="POST" action="cart">
                                                    @csrf
                                                    <div class="ps-product__shopping d-flex">
                                                        <input type="hidden" name="product_id" class="product_id" value="{{$deals->id}}">
                                                        <button type="submit" class="ps-btn ps-btn--black btn_add_to_cart mr-3" onclick="this.form.cmd.value='add2cart';">Add to cart</button>
                                                        <button type="submit" class="ps-btn" onclick="this.form.cmd.value='buynow';">Buy Now</button>
                                                    </div>
                                                    <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @empty
                        <h3>Sreach Not Found</h3>
                    @endforelse
                    <div class="ps-pagination">
                        {!! $data['list-products']->appends( request()->except('page') )->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('head-area')
        <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/tooltipster/dist/css/tooltipster.bundle.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('static/plugins/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-shadow.min.css') }}"/>
    @endpush
    @push('after-scripts')
        <script type="text/javascript" src="{{ asset('static/plugins/tooltipster/dist/js/tooltipster.bundle.min.js') }}"></script>
        <script src="{{ asset('static/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    @endpush
@endsection