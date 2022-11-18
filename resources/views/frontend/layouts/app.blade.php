<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="@yield('meta_author', appName())">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    @yield('meta')
    <title>@yield('title', appName() . ' | Marketplace for Veterinary Instruments and Supplies')</title>

    <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
    <link rel="preconnect" href="https://unpkg.com/" />
    <link rel="preconnect" href="https://www.googletagmanager.com/" />
    <link rel="preconnect" href="https://cdn.jsdelivr.net/" />
    <link rel="preconnect" href="https://connect.facebook.net/" />
    <link rel="preconnect" href="https://www.facebook.com/" />
    <link rel="preconnect" href="https://ajax.googleapis.com/" />
    {{-- <link rel="canonical" href="abc.com" /> --}}
    {{--
    <link rel="preload" href="{{ asset('assets/font/WorkSans-Medium.ttf') }}" as="font" type="font/ttf" />
    <link rel="preload" href="{{ asset('assets/font/WorkSans-Regular.ttf') }}" as="font" type="font/ttf" /> --}}
    <link rel="preload" href="{{ asset('assets/font/Poppins-Medium.ttf') }}" as="font" type="font/ttf" />
    <link rel="preload" href="{{ asset('assets/font/Poppins-Regular.ttf') }}" as="font" type="font/ttf" />

    <meta name="msapplication-TileColor" content="#fff" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/icons/favicon/logox32.png') }}" />
    <meta name="msapplication-config" content="{{ asset('assets/icons/favicon/browserconfig.xml') }}" />

    <meta property="og:title" content="DVM Central - Market Place for Vetenerians and Distributors" />
    <meta property="og:site_name" content="DVM Central - Market Place for Vetenerians and Distributors" />
    <meta property="og:url" content="https://www.dvmcentral.com/" />
    <meta property="og:description" content="DVM Central - Market Place for Vetenerians and Distributors." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('assets/icons/favicon/social-bg.png') }}" />
    <meta property="og:image:width" content="694" />
    <meta property="og:image:height" content="347" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="https://twitter.com/GerVetUSA" />
    <meta name="twitter:creator" content="https://twitter.com/GerVetUSA" />
    <meta name="twitter:title" content="DVM Central - Market Place for Vetenerians and Distributors" />
    <meta name="twitter:description" content="DVM Central - Market Place for Vetenerians and Distributors." />
    <meta name="twitter:image" content="{{ asset('assets/icons/favicon/social-bg.png') }}" />

    <base href="/">
    @stack('before-styles')

    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ asset('assets/icons/favicon/logox16.png') }}" />
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="{{ asset('assets/icons/favicon/logox32.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" type="image/png" href="{{ asset('assets/icons/favicon/logox180.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/icons/favicon/favicon.ico') }}" />
    <link rel="mask-icon" href="{{ asset('assets/icons/favicon/white-logo.svg') }}" color="#fff" />

    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />

    {{--
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper-bundle.min.css') }}" /> --}}
    {{--
    <link href="{{ asset('assets/styles/tailwind.min.css') }}" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('assets/styles/global.css?version=0.2') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dynamic-data.css?version=0.2') }}" />
    @livewireStyles
    @stack('after-styles')
    @stack('head-area')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-229669771-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-229669771-1');
    </script>


    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1349248778885688');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1349248778885688&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body class="relative bg-gray-50">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3GQNLN"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="left-loader loader fixed top-0 left-0 bg-black h-screen flex justify-end items-center hidden">
        <img class="w-max" src="{{ asset('assets/icons/left.png') }}" alt="logo" />
    </div>
    <div class="right-loader loader fixed top-0 right-0 bg-black h-screen flex justify-start items-center hidden">
        <img class="w-max" src="{{ asset('assets/icons/right.png') }}" alt="logo" />
    </div>
    <div class="page-content">

        {{-- @include('frontend.includes.popups') --}}
        <div class="xl:sticky top-0 z-50">
            @livewire('frontend.includes.partials.header', ['rand_num'=> session()->get('rand_num')])
        </div>
        @livewire('frontend.includes.partials.navigation')
        {{-- @include('frontend.includes.partials.header') --}}
        @include('frontend.includes.partials.slider')
        @yield('content')
        @include('frontend.includes.partials.footer')
    </div>
    @stack('before-scripts')
    <!-- custom scripts-->

    {{-- <script src="{{ asset('static/js/main.js') }}"></script>
    <script src="{{ asset('static/js/custom.js') }}"></script>
    <script src="{{ asset('static/js/lazysizes.js') }}" async=""></script> --}}
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script defer src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script> --}}
    {{-- <script defer src="{{ asset('assets/js/lazysizes.min.js') }}"></script> --}}
    <script defer src="{{ asset('assets/js/global.js') }}"></script>
    <script defer src="{{ asset('static/js/custom.js?version =0.2') }}"></script>
    <script defer src="{{ asset('static/js/global-data.js?v=0.3') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    @stack('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quicklink/2.2.0/quicklink.umd.js" defer></script>
    <script>
        window.addEventListener('load', () => {
            quicklink.listen();
        });
    </script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    @if(auth()->user())
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    {{-- <script src="/firebase-messaging-sw.js"></script> --}}
    <script>
        var firebaseConfig = {
            // databaseURL: 'db-url',
            apiKey: "AIzaSyDGd7vzqa3-U7PCm91NHkkgqh25xWsQLGs",
            authDomain: "vetandtech-29bf9.firebaseapp.com",
            projectId: "vetandtech-29bf9",
            storageBucket: "vetandtech-29bf9.appspot.com",
            messagingSenderId: "346123541427",
            appId: "1:346123541427:web:e5377c505cf32ca9f209c6",
            measurementId: "G-YNSK5BXJFW"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        function startFCM() {
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function (response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route("frontend.device-token.notification") }}',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function (response) {},
                        error: function (error) {
                            console.log("error fcm", error);
                        },
                    });
                }).catch(function (error) {
                    console.log(error);
                });
        }
        messaging.onMessage(function (payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });

        startFCM();
    </script>
    @endif
    
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "DVM Central",
          "alternateName": "DVM Central | The Veterinarian's Choice - dvmcentral.com",
          "url": "https://www.dvmcentral.com/",
          "logo": "https://www.dvmcentral.com/splash/assets/img/vet-tech/logo.svg",
          "sameAs": [
            "https://www.facebook.com/vetandtech",
            "https://twitter.com/VetandTech",
            "https://www.instagram.com/vetandtechofficial",
            "https://www.linkedin.com/company/vetandtech",
            "https://www.dvmcentral.com/"
          ]
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "DVM Central",
          "url": "https://www.dvmcentral.com/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https://www.dvmcentral.com/search-results?s={search_term_string}https://www.dvmcentral.com/search-results?s=GV+Dental+Kits+and+packs+",
            "query-input": "required name=search_term_string"
          }
        }
        </script>
    @livewireScripts
</body>

</html>