@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/free-webinars.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="free-webinars-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Free Webinars</div>
                <p class="text-gray-200 mt-2 text-sm">DVM Central Is A Veterinary Community-Based Platform Offering Free And Paid Educational Resources Like Ce Courses With Certifications.</p>
            </div>
        </section>

        <section class="free-webinars-detail mt-20">
            <div class="sm-width">
                <h2 class="text-center text-2xl priamry-black font-semibold">Free Webinars</h2>
                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    DVM Central holds exclusive webinars with internationally recognized speakers aimed at educating veterinary healthcare providers on best practices to improve animal patient safety. These webinars also focus on the most
                    up-to-date scientific developments and practices related to veterinary medicine
                </p>

                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                    Our webinars are open to anyone interested in learning about veterinary subjects. You can choose your preferred webinars to learn about the topics of your choice. Our top-notch webinars provide the ideal opportunity to
                    learn on your schedule.
                </p>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Get To Know Acclaimed Webinar Speakers!</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    You can now participate in webinars led by specific professors. DVM Central offers exclusive webinars hosted by various veterinary professionals. This is your chance to learn from the best, including Dr. Jan Bellows and
                    others.
                </p>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    You can also find speakers by narrowing your search by Job Titles and Institutes. Select the speakers from whom you want to learn. Our influential expert speakers with up-to-date content ensure that you are always ahead in
                    your skills and knowledge.
                </p>

                <h2 class="text-xl priamry-black font-semibold mt-10">Taking Part in Our Webinars Has Its Benefits</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Our webinars are open to everyone, regardless of whether you are a student, teacher, or professional in the veterinary field. You can gain a lot by attending advanced and up-to-date webinars.
                </p>

                <ul class="mt-4 list-disc text-sm sm:text-base ml-8 text-gray-600">
                    <li class="mt-2">Learn from experts to stay ahead of your peers in your field</li>
                    <li class="mt-2">Easily complete your annual CPD requirements and earn certification</li>
                    <li class="mt-2">Take charge by deciding what you want to learn about</li>
                    <li class="mt-2">Gain access to our free webinars without spending</li>
                    <li class="mt-2">Learn at your own pace and from any location online</li>
                    <li class="mt-2">Search and filter by the speakers to find the best ones for you</li>
                </ul>

                <h2 class="text-xl priamry-black font-semibold mt-10">Stay Informed with Subscription</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">You can select the courses of your preference at DVM Central. Log in to your account, choose the course, and enroll in it.</p>
            </div>
        </section>
    </div>
</main>
@endsection