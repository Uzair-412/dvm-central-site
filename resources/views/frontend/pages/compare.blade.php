@extends('frontend.layouts.app')
@section('meta_keywords', 'comparison-search')
@section('meta_description', 'Compare detailed specifications of products')
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('static/css/chosen.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="my-5 text-center">
                    <h1 class="h1 text-muted">You Can Compare Maximum 3 Products</h1>
                </div>
                <div class="my-5">
                    <form class="ps-form--quick-search my-2 flex" action="{{ url('comparison-search') }}" method="POST">
                        @csrf   
                        <select class="form-control border" name="name[]" id="search_product" multiple required>
                            @foreach ($data['products']  as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
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


    @push('after-scripts')
        <script src="{{ asset('static/js/chosen.js') }}"></script>
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