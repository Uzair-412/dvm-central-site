@extends('frontend.layouts.app')
@section('title', 'Resources - '. $data['News']->meta_title)
@section('meta_keywords', $data['News']->meta_keywords)
@section('meta_description', $data['News']->meta_description)

@push('after-styles')
    <style>
        .main-heading {
            font-weight: 500;
            color: #000000;
            font-size: 30px;
            text-transform: capitalize;
        }
    
        .sub-heading {
            font-weight: 500;
            color: #000000;
            font-size: 20px;
            text-transform: capitalize;
            text-decoration-line: underline;
        }
    </style>
@endpush

@section('content')
    @if($data['News']->top_image_banner!='')
        <div>
            <img src="{{ asset('up_data/news/'.$data['News']->top_image_banner) }}" style="width: 100vw;" />
        </div>
    @endif
    <div class="ps-page--simple">
        <div class="ps-section--shopping ps-shopping-cart">
            <div class="ps-container">
                {{-- <div class="ps-section__header clearfix">
                    <h1 class="float-left">News Feed</h1>
                </div> --}}

                <div class="row mt-50">
                    <div class="col-md-9">
                        <h4 class="float-left w-100 main-heading">{{ $data['News']->name }}</h4>
                        <p>On {{ date('D M d, Y',strtotime($data['News']->publish_date)) }}</p>
                        <img class="border" src="{{ asset('up_data/news/'.$data['News']->image) }}" alt="{{ $data['News']->name }}" style="width: 100%;" />
                        <div class="mt-3">
                            <h4 class="sub-heading" class="text-capitalize">{{ $data['News']->heading_content }}</h4>
                            <div>{{ $data['News']->short_content }}</div>
                            <div>{!! $data['News']->full_content !!}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="float-left w-100 main-heading">Related News</h4>
                        <div class="row">
                            @foreach($data['RelatedNews'] as $key => $related)
                                <div class="col-md-12 py-4">
                                    <a href="{{ route('frontend.resources.news.list', $related->slug) }}" class="border" style="display: block;">
                                        <div class="card bg-dark">
                                            <img style="object-fit: cover;height: 225px;" class="card-img-top"
                                                src="{{ asset('up_data/news/'.$related['image']) }}" alt="Veterinarians Administer COVID-19 Vaccines">
                                            <div class="card-body">
                                                <p class="card-text text-center text-white">{{ $related['name'] }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection