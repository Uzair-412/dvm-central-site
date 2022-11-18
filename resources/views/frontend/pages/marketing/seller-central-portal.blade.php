@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/seller-central-portal.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="seller-central-portal-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Seller Central Portal</div>
                <p class="text-gray-200 mt-2 text-sm">Become A Vet & Tech Seller To Showcase Your Entire Product Range On Seller Central Portal With 3D Virtual Booth And Personalized Pages.</p>
            </div>
        </section>

        <section class="seller-central-portal-detail mt-20">
            <div class="sm-width">
                <div class="flex flex-col items-center w-full">
                    <h2 class="text-center text-2xl priamry-black font-semibold">Seller Central Portal</h2>
                    <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                        DVM Central offers a specialized platform designed exclusively for sellers. Manufacturers or wholesalers of veterinary products can join our platform to grow their business.
                    </p>
                </div>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    We aim to bring suppliers and buyers under the same roof, so they can communicate directly. This would allow sellers to maximize the potential of their business. We have a perfect combination of best-of-breed technology
                    and a dedicated team to help businesses grow!
                </p>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="left-col flex flex-col">
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                            DVM Central takes pride in bringing the whole veterinary community to a single platform where sellers get an opportunity to scale their business. This is an ideal chance for manufacturers of animal health
                            products, veterinary supplies, and instruments to showcase their entire product range. Our seller central portal offers a comprehensive catalog allowing vendors to sell any animal health-related products.
                        </p>
                    </div>
                    <!-- <div class="portal-img-wrapper w-full md:w-7/12 relative mt-6 bg-gray-200">
                        <img class="lazy-img absolute top-0 left-0 w-full h-auto border border-solid border-gray-100" data-src="assets/imgs/seller-central-portal/img-1.png" alt="DVM Central" />
                    </div> -->
                </div>

                <h2 class="text-xl priamry-black font-semibold mt-10">Why Sell Veterinary Supplies With Us?</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">We offer an exclusive set of tools for sellers to grow their brands.</p>
                <ul class="mt-4 grid sm:grid-cols-2 lg:grid-cols-3 text-gray-600 gap-4 list-disc text-sm sm:text-base">
                    <li class="ml-8">Sellers can create their own product catalog to showcase their supplies.</li>
                    <li class="ml-8">Make personalized pages to get themselves to stand out.</li>
                    <li class="ml-8">Use traffic drivers such as deals & coupons to boost sales.</li>
                    <li class="ml-8">List up to 150 items for free every month and only pay when they sell.</li>
                    <li class="ml-8">Have unlimited visitors browse through your products.</li>
                    <li class="ml-8">Get detailed sales analytics & revenue insights.</li>
                </ul>

                <h2 class="text-xl priamry-black font-semibold mt-10">Your Business Is Our Priority!</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    We promote direct buying to help sellers earn loyal customers. We offer an exclusive set of services to both new and established sellers. Make the most out of this opportunity to become a top-tier seller.
                </p>

                <div class="flex flex-col lg:flex-row">
                    <div class="left-col flex flex-col lg:mr-4">
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                            Grow your online business alongside us. You can join us by filling in the form. After sending the information, your verification will be completed within 48 hours.
                        </p>
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">You can start selling with us as a registered seller.</p>
                        <h2 class="text-xl priamry-black font-semibold mt-10">What Do Our Registered Sellers Get?</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Sellers get their own dashboard, where they can:</p>
                        <ul class="mt-2 text-gray-600 list-disc ml-8 text-sm sm:text-base">
                            <li class="mt-4">Make Customized Pages</li>
                            <li class="mt-4">Gain Sales Analytics</li>
                            <li class="mt-4">Manage Inventory</li>
                            <li class="mt-4">Get Order & Revenue insights</li>
                            <li class="mt-4">See Traffic & Impressions</li>
                            <li class="mt-4">Set Payment method</li>
                        </ul>
                    </div>
                    <div class="portal-2-img-wrapper w-full sm:w-7/12 relative mt-6 overflow-hidden self-center mt-6">
                        <img class="lazy-img absolute top-0 left-0 w-full h-auto border border-solid border-gray-100" src="/assets/imgs/seller-central-portal/img-2.png" alt="DVM Central" />
                    </div>
                </div>

                <h2 class="primary-black-color font-semibold text-xl mt-10">We Take Your Privacy Very Seriously!</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    We structured to be transparent, secure, and reliable for animal health product suppliers. You can add your information with confidence. We make every possible effort to prevent unfair trade practices and protect privacy
                    rights.
                </p>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Join us to reach the veterinary market effectively. We look forward to growing with you.</p>
            </div>
        </section>
    </div>
</main>
@endsection