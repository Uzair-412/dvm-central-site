@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/guides.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="guides-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Guides</div>
                <p class="text-gray-200 mt-2 text-sm">Access Guides And Other Resources To Further Your Careers And Remain Updated With Latest Veterinary Practices, Innovations & Instruments.</p>
            </div>
        </section>

        <section class="guides-detail mt-20">
            <div class="sm-width">
                <h2 class="text-center text-2xl priamry-black font-semibold">Guides</h2>
                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">DVM Central aims to optimize animal care through veterinary-related guides that are a valuable source of information for the whole veterinary community.</p>

                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    Anyone can benefit from our free guides to broaden their knowledge. You can read about the latest findings on animal diseases and veterinary surgical procedures. The blog section brings you the latest pet health topics,
                    veterinary business information, and happenings in the veterinary world.
                </p>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Enlighten Yourself With Authentic Information!</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Our guides are not only for those in the veterinary field but also for pet owners concerned about their pets.</p>

                <h2 class="text-xl priamry-black font-semibold mt-10">What do the DVM Central Guides contain?</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">We offer guides that provide diverse information related to animal health. We have:</p>

                <div class="grid sm:grid-cols-2 mt-6 gap-4">
                    <div>
                        <h2 class="text-xl priamry-black font-semibold">Common Diseases</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">
                            Read about the medicine and treatments for common animal diseases. We provide information on how to keep your animals healthy. Obtain insights on how to differentiate between healthy and diseased animals.
                        </p>
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">Gain knowledge about common animal diseases and treatments to keep animals in good health.</p>
                    </div>

                    <div>
                        <h2 class="text-xl priamry-black font-semibold">Surgical Procedures</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">
                            Enlighten yourself with authentic information on diverse veterinary surgical procedures. Read about detailed pre-and post-surgical care for your pets. Acquire an understanding of surgery's risks, prevention, and
                            other factors.
                        </p>
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">Enlighten yourself with the latest research and updates on animal surgical procedures through our guides.</p>
                    </div>
                </div>

                <h2 class="text-center text-xl priamry-black font-semibold mt-10">Insightful Blogs</h2>

                <div class="md:w-7/12 mx-auto text-center">
                    <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                        Explore our insightful blogs to stay abreast of the latest veterinary related trends, new technology for animal care, veterinary events, and everything about the veterinary community.
                    </p>
                    <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Learn about the most recent developments in the veterinary world through our blog posts.</p>
                </div>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Unlimited Veterinary Resources At Your Disposal</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Keep up-to-date with the latest practices, innovations, and instruments through our guides. An excellent opportunity to discover helpful information through our diseases, surgical procedures, and blog pages.
                </p>
            </div>
        </section>
    </div>
</main>
@endsection