@extends('frontend.layouts.app')
@section('title', 'Videos')
@php
    $url = URL::current();
@endphp
@push('head-area')
    <link rel="canonical" href="{{ $url }}" />
@endpush
@section('content')
    <div class="ps-container">
        <div class="row">
            <div class="ps-section__header">
                <h2>Videos</h2>
            </div>
        </div>
        <div class="row ps-section__content">
            @if($data['videos'])
                @foreach($data['videos'] as $video)
                    <div class="col-md-6 my-3">
                        @if ($video->source == 'Youtube')
                            <iframe frameborder="0" src="{{'https://www.youtube.com/embed/'.$video->video_id}}" allow="fullscreen; picture-in-picture" allowfullscreen width="100%" height="305"></iframe>
                        @elseif ($video->source == 'Vimeo')
                            <iframe frameborder="0" src="{{'https://player.vimeo.com/video/'.$video->video_id}}" allow="fullscreen; picture-in-picture" allowfullscreen width="100%" height="305"></iframe>
                        @endif
                    </div>
                @endforeach
            @else
                <p><strong>Sorry!</strong>, no videos found.</p>
            @endif
        </div>
    </div>
@endsection