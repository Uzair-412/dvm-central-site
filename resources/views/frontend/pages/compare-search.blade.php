@extends('frontend.layouts.app')
@section('meta_keywords', 'comparison-search')
@section('meta_description', 'Compare detailed specifications of products') 
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('static/css/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('static/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
@endpush
@section('content')
    <div class="container">
        <input type="hidden" id="productSection" name="Comparison Products" value="Comparison Products Page">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="m-2">
                    <form class="ps-form--quick-search my-2 flex" action="{{ route('frontend.comparison_search') }}" method="POST">
                        @csrf
                        <select class="form-control border" name="name[]" id="search_product" multiple required>
                            @foreach ($data['product']  as $product)
                                <?php $key = array_search($product->id, array_column($data['products'], 'id'));  ?>
                                <option value="{{ $product->id }}" @if(is_int($key)) selected @endif>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" aria-label="Add Product to Compare" class="float-right">Add</button>
                        <div class="ps-panel--search-result shadow-lg">
                            <div class="ps-panel__content">
                                <div class="ps-product ps-product--wide ps-product--search-result">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="my-3">
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--compare">
                        <tbody>
                            <tr>
                                <td class="heading"></td>
                                @if (count($data['products']) > 1)
                                    @foreach ($data['products'] as $item)
                                        @php
                                            $data['ids'] = array_column($data['products'], 'id');
                                        @endphp 
                                        <form action="{{ route('frontend.comparison_id') }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item['id']}}">
                                            @foreach ($data['ids'] as $id)
                                            <input type="hidden" name="ids[]" value="{{$id}}">
                                            @endforeach
                                            
                                            <td><button aria-label="Remove Product" class="btn btn-lg" type="submit">Remove</button></td>
                                        </form>
                                    @endforeach
                                @endif
                            </tr>
                            <tr>
                                <td class="heading">Product Name</td>
                                @foreach ($data['products'] as $item)
                                    <td>
                                        <div class="ps-product--compare"><a href="{{url($item['slug'])}}" aria-label="{{ $item['name'] }}">
                                            @if( $item['image'] != '')
                                                @php
                                                    $path = 'products/images/medium/' .  $item['image'];
                                                @endphp
                                                <img class="w-100" src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket'}}" alt="{{  $item['name'] }}" style="width: 400px !important">
                                            @else 
                                                <img class="w-100" src="https://via.placeholder.com/400x400" alt="{{ $item['name'] }}" style="width:400px">
                                            @endif
                                            </a>
                                            <div class="ps-product__content"><a href="{{url($item['slug'])}}" aria-label="{{ $item['name'] }}">{{ $item['name'] }}</a></div>
                                        </div>
                                    </td>                                
                                @endforeach
                            </tr>
                            <tr>
                                <td class="heading">Product Description</td>
                                @foreach ($data['products'] as $item)
                                    <td>
                                        <div class="ps-product--compare">
                                            <div class="ps-product__content text-justify">{{ Str::limit($item['short_description'], 250) }}</div>
                                        </div>
                                    </td>                                
                                @endforeach
                            </tr>
                            <tr>
                                <td class="heading">Rating</td>
                                @foreach ($data['products'] as $item)
                                    <td>
                                        @php
                                            $rating = App\Models\Review::where(['status'=> 'Y','product_id'=> $item['id']])->get();
                                            $ratingcount = round($rating->avg('rating'));
                                        @endphp
                                        <div class="d-flex">
                                            <b>{{ $rating->avg('rating') == NULL ? '0.00' : round($rating->avg('rating')) }} Star </b>
                                            <select class="ps-rating" data-read-only="true">
                                                @for ($i=1; $i <= $ratingcount; $i++ )
                                                    <option value="1">{{$i}}</option>
                                                @endfor 
                                                @for ($i=5; $i>$ratingcount; $i--)
                                                    <option value="0">{{$i}}</option>
                                                    <option value="2">{{$i}}</option>
                                                @endfor
                                            </select>   
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="heading">Views</td>
                                @foreach ($data['products'] as $item)
                                    <td>
                                        <b>
                                            {{ $item['views'] }}
                                        </b>
                                    </td>
                                @endforeach
                            </tr>
                            {{-- Testing --}}
                            <tr>
                                <td class="heading">Price</td>
                                @foreach ($data['products'] as $item)
                                    
                                    @if ($item['type'] != "variation")
                                        <td>
                                            @if ($item['price_discounted_end'] < date('Y-m-d'))
                                                <h4 class="price">$ {{$item['price']}} </h4>
                                            @else
                                                @if ($item['price_discounted'] != NULL || $item['price_discounted'] != 0 || $item['price_discounted'] != '')
                                                    <h4 class="price sale">$ {{$item['price']}} <del>${{$item['price_catalog']}}</del> <small>(-{{round(((($item['price_catalog'])-($item['price']))/$item['price_catalog'])*100,2)}}%)</small> </h4>
                                                @else
                                                    <h4 class="price">-</h4>
                                                @endif
                                            @endif
                                        </td>
                                    @else
                                        <td class="ps-product__price sale"><span>-</span> </td>
                                    @endif
                                    
                                @endforeach
                            </tr>
                            <tr>
                                <td class="heading">Availability</td>
                                @foreach ($data['products'] as $item)
                                    <td>
                                        <span class="{{ $item['in_stock'] == 'Y' ? 'in-stock' : 'out-stock'}}">
                                            {{ $item['in_stock'] == 'Y' ? 'In Stock' : 'Out of Stock'}}
                                        </span>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="heading">Sold By</td>
                                @foreach ($data['products'] as $item)
                                    @php
                                        $name = App\Models\Vendor::where('id',$item['vendor_id'])->first();
                                    @endphp
                                    <td><a class="sold-by" href="{{url($name['slug'])}}" aria-label="{{ $name['name'] }}">{{$name['name']}}</a></td>
                                @endforeach
                            </tr>
                            {{-- Testing --}}
                            <tr>
                                <td class="heading">Item Weight</td>
                                @foreach ($data['products'] as $item)
                                    <td>{{$item['weight']}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="heading">Buy Now</td>
                                @foreach ($data['products'] as $item)
                                    <td>
                                        @if ($item['type'] != "variation")
                                            <form class="frm_add_to_cart" method="post" action="cart">
                                                @csrf
                                                <input type="hidden" name="product_id" class="product_id" value="{{$item['id']}}">
                                                <button type="submit" aria-label="Add to cart" class="ps-btn ps-btn--black" onclick="this.form.cmd.value='add2cart';">Add to cart</button>
                                                <input type="hidden" name="cmd" id="cmd" value="add2cart" />
                                            </form>
                                        @else
                                            <a class="ps-btn" href="{{url($item['slug'])}}" aria-label="Product Link">Details</a>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    @push('after-scripts')
        <script src="{{ asset('static/js/chosen.js') }}"></script>
        <script src="{{ asset('static/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
        <script>
            $("#search_product").chosen({
                max_selected_options: 3,
            });
            var myVar = setInterval(function(){ 
                $('.frm_add_to_wishlist').on('submit', function (e) {
                    e.preventDefault();
                    var frm_data = $(this).serialize();
                    $.ajax({
                        method: "POST",
                        url: "/dashboard/wishlist/store",
                        data: frm_data
                    })
                    .done(function (msg) {
                        if(msg.status == 1){
                            swal({
                                text: msg.message,
                                icon: 'success',
                                buttons: {
                                    confirm: {
                                        text: "View Wishlist",
                                        value: true,
                                        visible: true,
                                        className: "",
                                        closeModal: true
                                    },
                                    cancel: {
                                        text: "Continue Shopping",
                                        value: false,
                                        visible: true,
                                        className: "",
                                        closeModal: true,
                                    }
                                },
                                timer: 3000,
                            }).then((result) => {
                                if (result) {
                                    console.log(msg.message);
                                    window.location.href = '/dashboard/wishlist';
                                }
                            });
                            $('#heart').remove();
                            tr_star = `<i id="heart">${msg.total}</i>`;
                            $("#wishlist").append(tr_star);
                        }else{
                            $('#heart').remove();
                            tr_star = `<i id="heart">${msg.total}</i>`;
                            $("#wishlist").append(tr_star);
                            swal({
                                text: msg.message,
                                icon: 'success',
                                buttons: {
                                    confirm: {
                                        text: "View wishlist",
                                        value: true,
                                        visible: true,
                                        className: "",
                                        closeModal: true
                                    },
                                    cancel: {
                                        text: "Continue Shopping",
                                        value: false,
                                        visible: true,
                                        className: "",
                                        closeModal: true,
                                    }
                                },
                            }).then((result) => {
                                if (result) {
                                    console.log(msg.message);
                                    window.location.href = '/dashboard/wishlist';
                                }
                            });
                        }
                    });
                });
                clearInterval(myVar);
            }, 3000);
        </script>
    @endpush
@endsection