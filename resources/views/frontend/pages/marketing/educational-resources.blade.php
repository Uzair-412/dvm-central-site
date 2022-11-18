@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/educational-resources.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="educational-programs-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Educational Resources</div>
                <p class="text-gray-200 mt-2 text-sm">Explore DVM Central Educational Programs, Online Resources, and Affiliated Associations For Up-To-Date Veterinary-Related Information.</p>
            </div>
        </section>

        <section class="educational-programs-detail mt-20">
            <div class="sm-width">
                <h2 class="text-center text-2xl priamry-black font-semibold">Educational Resources</h2>
                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    DVM Central offers premium educational resources to support veterinarians, nurses, and technicians. Our diversified resources also assist students in evaluating career opportunities in veterinary medicine. You can
                    enlighten yourself by exploring our various pages. Our educational programs, information on animal diseases, and affiliated associations provide the latest veterinary developments. We are committed to making veterinary
                    programs, events, organizations, and knowledge more accessible.
                </p>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Join The Unrivalled Veterinary Platform for E-learning</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    This is an excellent opportunity for people to stay up-to-date on the latest findings, methods, and techniques in their field. Anyone interested in the most recent discoveries can find many valuable resources on our pages.
                </p>

                <h2 class="text-xl priamry-black font-semibold mt-10">Find the right program for you!</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Educational Program includes all the most recent programs to assist people looking for studies. You can explore and choose the studies that interest you based on your preferences.
                </p>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">You can easily explore DVM Central resources with a simple search. Narrow your choices by filtering through education type, state, and city.</p>

                <h2 class="text-xl priamry-black font-semibold mt-10">Looking For Relevant Organizations and Links?</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">We feature more sources for you to search!</p>

                <div class="grid sm:grid-cols-2 mt-6 gap-4">
                    <div>
                        <h2 class="text-xl priamry-black font-semibold">Associations</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">
                            We can assist you if you have difficulty locating an appropriate veterinary establishment. On our association pages, you can find associations and government organizations dedicated to advancing the veterinary
                            world.
                        </p>
                    </div>

                    <div>
                        <h2 class="text-xl priamry-black font-semibold">Online resources</h2>
                        <p class="text-gray-600 text-sm md:text-base mt-2 leading-loose">
                            We can help you if you need information on a specific topic. We've organized our learning database into categories based on your specific requirements. We have got you covered with simple education and resources.
                        </p>
                    </div>
                </div>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Join our Comprehensive Platform to Gain Access to Veterinary Education!</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    You can explore and read through various resources to keep up with the latest updates in the veterinary world. We are committed to assisting veterinarians in reaching new levels of growth and success.
                </p>
            </div>
        </section>
    </div>
</main>
@endsection