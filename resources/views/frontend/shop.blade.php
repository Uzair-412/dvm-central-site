@extends('frontend.layouts.app')
@section('title', 'DVM Central | Marketplace for Veterinary Products | Shop Now')
@section('meta_keywords', 'Marketplace Veterinary, Veterinary Supplies, Animal Supply Store, Veterinary Products, VetandTech, DVM Central, Vet Tech, Animal Health Products, Online Shop, ')
@section('meta_description', 'DVM Central SHOP brings a range of Animal Health Products and Veterinary Supplies for veterinarians, practicing students, veterinary clinics and hospitals.')
@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/styles/index.css') }}" />
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "DVM Central",
            "url": "https://www.dvmcentral.com/",
            "logo": "https://www.dvmcentral.com/static/img/vet-and-tech-logo.png",
            "alternateName": "Market Place for Vetenerians",
            "sameAs": [
                "https://www.linkedin.com/company/vet-and-tech/"
            ],
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "(833) 906-7575",
                "contactType": "sales",
                "email": "Info@dvmcentral.com",
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
    <script defer src="{{ asset('assets/js/swiper.js') }}" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

    <script defer src="{{ asset('assets/js/index.js') }}"></script>
@endpush
