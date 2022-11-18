@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/personalized-store-pages.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="store-pages-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Personalized store pages</div>
                <p class="text-gray-200 mt-2 text-sm">A Specialized Platform Designed Just For Sellers To Create Personalized Store Pages With Custom Design and Product Listings.</p>
            </div>
        </section>

        <section class="store-pages-detail mt-20">
            <div class="sm-width">
                <div class="flex flex-col items-center w-full">
                    <h2 class="text-center text-2xl priamry-black font-semibold">Personalized Store Pages</h2>
                    <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                        At DVM Central, sellers can access the dashboard after the verification process. This allows them to create captivating vendor profiles to promote their business.
                    </p>
                </div>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    A vendor can create attractive, personalized store pages for their brands to make a good impression. They even have access to these pages, ensuring each vendor has a profile corresponding to their business concept.
                </p>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="left-col flex flex-col md:w-5/12 md:mr-4 mt-6">
                        <h2 class="primary-black-color font-semibold text-xl">What does Dashboard have?</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">The dashboard will assist manufacturers and suppliers in managing their business easily. It will provide them with insights about:</p>
                    </div>
                    <div class="store-page-img-wrapper w-full md:w-7/12 relative mt-6 bg-gray-200">
                        <img class="lazy-img absolute top-0 left-0 w-full h-auto border border-solid border-gray-100" src="assets/imgs/store-pages/1mg-1.png" alt="DVM Central" />
                    </div>
                </div>

                <ul class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 text-gray-600 gap-4 list-disc text-sm sm:text-base">
                    <li class="ml-8">Orders received and in progress</li>
                    <li class="ml-8">Revenue generated through</li>
                    <li class="ml-8">Total impressions and click on your page</li>
                    <li class="ml-8">Total sales according to dates</li>
                    <li class="ml-8">Net Profit earned by the business</li>
                    <li class="ml-8">User Traffic on your pages and product</li>
                </ul>

                <h2 class="text-2xl priamry-black font-semibold mt-10">How can you personalize your vendor profile?</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Sellers can set up their personalized store pages by customizing headers, adding more pages for information, placing product banners, and listing all of their products.
                </p>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Some of the features that can be personalized are:</p>
                <ul class="mt-2 text-gray-600 list-disc ml-8 text-sm sm:text-base">
                    <li class="mt-4">Your profile page is editable as per your preference.</li>
                    <li class="mt-4">Product listings such as title, images, description, and price.</li>
                    <li class="mt-4">Showcase your catalog & images of the products in your own style</li>
                </ul>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Sellers can manage their personalized store pages through the dashboard. They will get:</p>
                <h2 class="text-2xl priamry-black font-semibold mt-10">3D Virtual Booth</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    We enable manufacturers and suppliers to showcase their products interactively using 3D Virtual Booths. With this intriguing feature, you can showcase your product more stylishly to attract more customers.
                </p>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="left-col flex flex-col md:w-5/12 md:mr-4 mt-6">
                        <h2 class="primary-black-color font-semibold text-xl">Manage Products</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Sellers can set prices and check the status of their supplies through the ‘Manage Product’ section.</p>
                        <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">You can also categorize products and edit details such as names and images of products. You can also check the stats through this page.</p>
                    </div>
                    <div class="store-page-2-img-wrapper w-full md:w-7/12 relative mt-6 bg-gray-200">
                        <img class="lazy-img absolute top-0 left-0 w-full h-auto border border-solid border-gray-100" src="assets/imgs/store-pages/img-2.png" alt="DVM Central" />
                    </div>
                </div>

                <h2 class="primary-black-color font-semibold text-xl mt-10">We Have More In-Store For You!</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    A seller can even define their policies for returns, replacements, and refunds. DVM Central will set a specific rule that can automate the return process. However, the sellers may customize and remove the return
                    preferences in the account settings.
                </p>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Isn't this everything you were looking for? So do not delay and join us as a seller to leverage all these facilities.</p>
            </div>
        </section>
    </div>
</main>
@endsection