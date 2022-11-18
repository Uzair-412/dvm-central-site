@extends('frontend.layouts.app')
@section('title', 'Downloads')
@push('head-area')
    <link rel="canonical" href="{{ URL::to('/downloads') }}" />
    <link rel="amphtml" href="{{ URL::to('/downloads') }}?amp=1" />
@endpush
@section('content')
    <!-- Cart Page Start -->
    <div class="ps-page--simple">
        <div class="ps-container">
            <div class="ps-section-title">
                <h1>Downloads</h1>
            </div>
            @if($data['flyers'])
                <section class="ps-section__content">
                    <div class="row">
                        @foreach($data['flyers'] as $post)
                            @php
                                $image = '/up_data/flyers/images/'.$post->image;
                                $link = '/up_data/flyers/pdfs/'.$post->pdf_file;
                            @endphp
                            <div class="col-md-3 my-5">
                                <div class="card shadow-lg text-center ps-product" style="width:30rem">
                                    <div class="card-body ps-product__thumbnail">
                                        <a class="ps-block__overlay" aria-label="{{ $post->name }}" href="{{ $link }}" target="_blank"><img class="card-img-top" src="{{ $image }}" title="{{ $post->name }}" alt="{{ $post->name }}"></a>
                                        <p class="card-text text-center h1 ps-product__actions p-5">{{ $post->name }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        <div class="text-center">
                            {!! $data['flyers']->appends( request()->except('page') )->links() !!}
                        </div>
                    </div>
                </section>
            @else
                <p><strong>Sorry!</strong>, no flyers found.</p>
            @endif
        </div>
    </div>
@endsection