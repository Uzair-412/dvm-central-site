@extends('frontend.layouts.app')
@section('title', 'Resources')
@push('after-styles')
<style>
    .resources-listing {
        padding-top: 0px;
        background: #f1f1f1;
        padding-bottom: 70px;
    }
    .newsfeed-wrapper {
        padding-top: 70px;
    }
    .newsfeed-wrapper .header {
        margin-bottom: 35px;
        border-bottom: 1px solid #ccc;
    }
    .newsfeed-wrapper .header h1 {
        margin-bottom: 0;
        font-weight: 500;
        font-size: 24px;
        line-height: 1.3 !important;
    }
    .newsfeed-wrapper .card {
        background: #33b3c0;
        box-shadow: -2px 1rem 3rem rgb(131 131 131 / 18%);
    }
</style>
@endpush
@section('content')
<div><img src="static/img/vet-resources.jpg" style="width: 100vw;" /></div>
<div class="ps-page--simple">
    <div class="ps-section--shopping ps-shopping-cart resources-listing">
        <div class="ps-container">
            <div class="newsfeed-wrapper">
                <div class="header d-flex justify-content-between">
                    <h1 class="">News Feed</h1>
                </div>
                <div class="row">
                    @foreach($data['News'] as $key => $news)
                        <div class="col-md-3 mb-4">
                            <a href="{{ route('frontend.resources.news.list', $news->slug) }}">
                                <div class="card">
                                    <img style="object-fit: cover;height: 225px;" class="card-img-top"
                                        src="{{ asset('up_data/news/'.$news['image']) }}"
                                        alt="{{ $news['name'] }}" />
                                    <div class="card-body">
                                        <p class="card-text text-center text-white">{{ $news['name'] }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @php
                        $pagination = $data['News']->appends( request()->except('page') )->links();
                    @endphp
                    @if(!empty(trim($pagination)))
                        <div class="ps-pagination w-100">
                            {!! $pagination !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection