@extends('frontend.layouts.app')
@section('title', 'DVM Central | Marketplace for Veterinary Instruments and Supplies')
@section('meta_keywords', 'DVM Central')
@section('meta_description', 'DVM Central International a reliable marketplace for buying and selling veterinary medical equipment and supplies for veterinarians worldwide. Get started!')
@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/index.css') }}" />
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "DVM Central",
            "url": "https://www.dvmcentral.com/",
            "logo": "https://www.DVM Central.com/static/img/vet-and-tech-logo.png",
            "alternateName": "Market Place for Vetenerians",
            "sameAs": [
                "https://www.linkedin.com/company/vet-and-tech/"
            ],
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "(833) 906-7575",
                "contactType": "sales",
                "email": "Info@DVMCentral.com",
                "areaServed": "US",
                "availableLanguage": "en"
            }]
        }
    </script>
@endpush
@section('content')
    <main id="home-page" class="relative">
        <input type="hidden" id="homePage" name="Home Page" value="Home Page">
        <input type="hidden" name="pageTitle" id="pageTitle" value="Home Page" />
        @include('frontend.includes.partials.business-type')
        {{-- @include('frontend.includes.partials.deal-of-day') --}}
        @include('frontend.includes.partials.home-banner')
        @include('frontend.includes.partials.top-categories')
        {{-- @include('frontend.includes.partials.hot-selling-items', ['hot_products'=> $data['hot_products']]) --}}
        @livewire('frontend.includes.partials.hot-selling-items')
        @include(
            'frontend.includes.partials.order-from-what-you-like'
        )
        @livewire('frontend.includes.partials.special-offer')
        {{-- @include('frontend.includes.partials.special-offer') --}}
        @include(
            'frontend.includes.partials.bottom-banner-and-offers'
        )
        @livewire('frontend.includes.partials.latest-articles')
    </main>
@endsection
@push('after-scripts')
    <script defer src="https://unpkg.com/swiper@7/swiper-bundle.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script defer src="{{ asset('assets/js/index.js') }}"></script>
@endpush
