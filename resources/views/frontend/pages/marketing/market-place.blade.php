@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/market-place.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="marketplace-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Marketplace</div>
                <p class="text-gray-200 mt-2 text-sm">DVM Central Marketplace Is A Veterinary Multi-Vendor Platform For Increasing Access To Veterinary Supplies And Simplifying Shopping.</p>
            </div>
        </section>

        <section class="marketplace-detail mt-20">
            <div class="sm-width">
                <div class="flex flex-col items-center w-full">
                    <h2 class="text-center text-2xl priamry-black font-semibold">MarketPlaces</h2>
                    <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                        DVM Central is an online veterinary marketplace that deals in various animal health products. It is designed with the intention of providing a platform where people can seek all types of veterinary assistance. It is a
                        multi-vendor platform where different sellers can showcase their products. On the other hand, buyers can make their purchases directly from the manufacturers. In addition, DVM Central offers various veterinary
                        resources to serve the veterinary community in a distinctive way.
                    </p>
                </div>

                <h2 class="text-xl priamry-black font-semibold mt-10">What's different about our marketplace?</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    DVM Central serves the veterinary community distinctively by offering everything related to veterinary on a single platform. Customers no longer have to juggle multiple websites anymore to search for veterinary supplies.
                    Instead, we gathered everything a consumer might need in one place. By bringing different veterinary vendors under one roof, we present a diverse range of animal health products one may require.
                </p>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">With DVM Central, people can now shop from different vendors on a single platform. Isn't it exciting?</p>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="left-col flex flex-col md:w-5/12 mt-6 md:mr-4">
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">DVM Central has made it incredibly convenient to avail any veterinary related instrument or product with ease including:</p>
                        <ul class="mt-2">
                            <li class="flex items-center mt-4 text-sm md:text-base text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="h4 md:w-5 h-4 md:h-5 mr-4">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                Pet Supplies
                            </li>

                            <li class="flex items-center mt-4 text-sm md:text-base text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="h4 md:w-5 h-4 md:h-5 mr-4">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                Veterinary Equipment
                            </li>

                            <li class="flex items-center mt-4 text-sm md:text-base text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="h4 md:w-5 h-4 md:h-5 mr-4">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                Medicines and Supplements
                            </li>

                            <li class="flex items-center mt-4 text-sm md:text-base text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="h4 md:w-5 h-4 md:h-5 mr-4">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                Surgical Tools
                            </li>
                        </ul>
                    </div>
                    <div class="market-img-wrapper w-full md:w-7/12 relative mt-6 bg-gray-200">
                        <img class="lazy-img absolute top-0 left-0 w-full h-auto border border-solid border-gray-100" data-src="assets/imgs/marketplace/img-1.png" alt="DVM Central" />
                    </div>
                </div>
                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    DVM Central started with the goal of becoming a one-stop shop for veterinary clinics and hospitals. Our team is constantly working hard to increase the masses' access to veterinary supplies and provide the best selection
                    of animal health-related products at affordable prices. Putting our imagination into action, we believe in going the extra mile to make sourcing of veterinary surgical instruments, equipment, and veterinary health supplies
                    convenient for veterinarians.
                </p>
                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Shop Whenever and Wherever You Want</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    We facilitate both animal healthcare practices and pet owners. Our marketplace is a source for people looking to restock their hospital supplies or purchase pet supplies.
                </p>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Get the Right Products at the Right Time!</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Vendors can reach a greater audience while customers save time by having everything in one place. DVM Central is committed to making it simpler to buy animal health products!
                </p>
                <h2 class="text-xl priamry-black font-semibold mt-10">Convenient for Everyone!</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">We strive to make selling and purchasing hassle-free for the veterinary community. Our support team is always available to assist you with any issues.</p>
            </div>
        </section>
    </div>
</main>
@endsection
@push('after-scripts')
    <script src="assets/js/market-place.js"></script>
@endpush