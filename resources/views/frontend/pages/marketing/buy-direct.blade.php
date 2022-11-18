@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/buy-direct.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="buy-direct-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Buy Direct</div>
                <p class="text-gray-200 mt-2 text-sm">Get news, research papers, product launches, videos, animations, medical guides and everything related to veterinary.</p>
            </div>
        </section>

        <section class="buy-direct-detail mt-20">
            <div class="sm-width">
                <h2 class="text-center text-2xl priamry-black font-semibold">A Single Source of All Your Veterinary Needs</h2>
                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    DVM Central promote the culture of direct buying. Customers looking for veterinary supplies can now shop directly from the vendors of their choice. We are proud to host many leading manufacturers and suppliers and look
                    forward to hosting more!
                </p>
                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    Gone are the days when sellers and customers were not able to communicate before making an online purchase. Today, the lack of direct interaction is no longer an issue, and everyone prefers to shop based on their personal
                    preferences.
                </p>
                <h2 class="text-center text-2xl priamry-black font-semibold mt-6">Experience Direct Shopping Without Any Third Party Involved.</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">This is something we can help you with!</p>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Customers and sellers can connect easily on DVM Central. Customers can specify their needs to the sellers and get their orders customized as per their requirements. On the other hand, sellers can enhance their credibility
                    by fulfilling their needs. Vendors of your choice can be found directly on our site.
                </p>

                <h2 class="text-xl priamry-black font-semibold mt-10">What is best about buying from DVM Central?</h2>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Multiple vendors, direct buying, and comprehensive product information.</p>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    In a highly digitalized era, we aim to provide ease for buyers to buy from a reliable supplier comfortably. We ensure a safe environment for buyers of animal health products to shop directly from the most trustworthy
                    manufacturers. Before purchasing, customers can check out:
                </p>
                <ul class="mt-2 text-gray-600">
                    <li class="mt-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="w-4 md:w-5 h-4 md:h-5 mr-4">
                            <path
                                fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Product descriptions
                    </li>
                    <li class="mt-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="w-4 md:w-5 h-4 md:h-5 mr-4">
                            <path
                                fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Reviews
                    </li>
                    <li class="mt-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#262626" class="w-4 md:w-5 h-4 md:h-5 mr-4">
                            <path
                                fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        Photos
                    </li>
                </ul>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">It's not always easy to find a convenient and reliable veterinary store.</p>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    People can use our digital platform to shop for an unlimited number of products and receive special offers. Here is your chance to take advantage of discounts and deals.
                </p>

                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    The compelling fact is that everything we provide is now available via your mobile phone. Our mobile apps allow you to shop for products from anywhere, anytime.
                </p>
                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">We are dedicated to making animal supplies shopping quick, simple, and enjoyable. You can sign up and begin shopping right away.</p>
            </div>
        </section>
    </div>
</main>
@endsection