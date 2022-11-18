@extends('frontend.layouts.app')
@section('meta_keywords',  $data['product']->meta_keywords )
@section('meta_description', $data['product']->meta_description) 
@section('title',  $data['product']->meta_title )
@push('before-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
@endpush
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/product.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css') }}" />
@endpush

@php
    $title = trim($data['product']->meta_title);
    if($title == null || $title == 'NULL')
        $title = $data['product']->name;
    if($data['product']->do_index == 'N' || $data['product']->status == 'N')
        $no_index = 'NOINDEX';
    $stock_info = \App\Models\Product::printStockInformation($data['product']);
@endphp

@section('title', $title)

@if(trim($data['product']->meta_keywords) != null || trim($data['product']->competitor_skus) != null)
    @section('meta_keywords', $data['product']->meta_keywords . ', ' . $data['product']->competitor_skus)
@endif
@if(trim($data['product']->meta_description) != null)
    @section('meta_description', $data['product']->meta_description)
@endif

@if($data['product']->is_canonical == 'Y')
    @php
        if($data['product']->canonical_url != '')
            $url = $data['product']->canonical_url;
        else
            $url = URL::to( '/' . $data['product']->slug);
    @endphp
    @push('head-area')
        <link rel="canonical" href="{{ $url }}" />
    @endpush
@endif

@push('head-area')
    @if(isset($no_index))
        <META NAME="ROBOTS" CONTENT="{{ $no_index }}">
    @endif
@endpush

@section('content')
    @livewire('frontend.products.detail', [
        'product' => $data['product'], 
        'sub_products' => $data['sub_products'], 
        'images' => $data['images'], 
        'stock_info' => $stock_info, 
        'product_categories' => $data['product_categories'],
        'same_products' => $data['same_products'],
        'related_products' => $data['related_products'],
        'warranty' => $data['warranty'],
        'ratings' => $data['ratings'],
        'chat_data' => $data['chat_data'],
        'vendor_id' => $data['vendor_id']
    ])
@endsection
@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/swiper.js') }}"></script>
    <script defer src="{{ asset('assets/js/blowup.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/product.js?version=0.2') }}"></script>
    {{-- @livewireScripts --}}
    {{-- @livewire('chat-box', ['chat_type' => 'site', 'chat_data' => $data['chat_data'], 'vendor_id' => $data['vendor_id']]) --}}
@endpush
