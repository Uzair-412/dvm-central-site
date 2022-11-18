@extends('frontend.layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/ce-courses.css">
@endpush
@section('content')
<main class="page-content">
    <!-- nav cart container-->
    <div class="ce-courses-container">
        <section class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden px-2 py-6 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">CE Courses</div>
                <p class="text-gray-200 mt-2 text-sm">DVM Central Is A Veterinary Community-Based Platform Offering Free And Paid Educational Resources Like Ce Courses With Certifications.</p>
            </div>
        </section>

        <section class="ce-courses-detail mt-20">
            <div class="sm-width">
                <div class="flex flex-col items-center w-full">
                    <h2 class="text-center text-2xl priamry-black font-semibold">CE Courses</h2>
                    <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                        DVM Central is a veterinary marketplace and an educational platform that provides top-notch online continuing education. You can select from our diverse range of veterinary CE courses.
                    </p>
                </div>

                <h2 class="text-xl priamry-black font-semibold mt-10">CE Courses</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Take our interactive and skill-building courses to earn your continuing education credit points. It will keep you up-to-date on the latest veterinary developments, research, and protocols.
                </p>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Our secondary learning options are available for all veterinary professionals, including veterinarians, veterinary nurses, technicians, students, and other staff. Maintain your license by earning your annual credits with
                    our CE courses.
                </p>

                <h2 class="text-center text-2xl priamry-black font-semibold mt-10">Experience the Best Veterinary Continuing Education Online!</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    Having our online CE courses at your disposal means you no longer need to travel anywhere and can earn credits remotely. You can find courses that fit your busy schedule and start learning from anywhere.
                </p>

                <h2 class="text-xl priamry-black font-semibold mt-10">How to leverage courses?</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">
                    We provide courses to facilitate continuing education for the veterinary community. We strive to make veterinary education more accessible for busy professionals.
                </p>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">Our CE courses are designed to facilitate you in the following ways:</p>

                <ul class="mt-4 grid sm:grid-cols-2 lg:grid-cols-3 text-gray-600 gap-4 list-disc text-sm sm:text-base">
                    <li class="ml-8">Enroll in various</li>
                    <li class="ml-8">You can choose between free and paid courses</li>
                    <li class="ml-8">You can earn your annual CE credits remotely</li>
                    <li class="ml-8">Great scheduling flexibility to choose ones that fit your available time</li>
                    <li class="ml-8">Attend online from anywhere without worrying about commuting</li>
                    <li class="ml-8">You can get certification when you complete your course</li>
                </ul>

                <h2 class="text-xl priamry-black font-semibold mt-10">How To Access CE Courses?</h2>

                <p class="text-gray-600 text-sm md:text-base mt-4 leading-loose">You can select the courses of your preference at DVM Central. Log in to your account, choose the course, and enroll in it.</p>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="left-col flex flex-col md:w-5/12 md:mr-4">
                        <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">
                            We understand that veterinary education isn't one-size-fits-all, which is why we've provided many courses to help you find what's right for you. You can find courses specializing in medical science, diagnostic
                            applications, therapeutic standards, animal treatment principles, and much more.
                        </p>
                    </div>
                    <div class="course-img-wrapper w-full md:w-7/12 relative mt-6 bg-gray-200">
                        <img class="lazy-img absolute top-0 left-0 w-full h-auto border border-solid border-gray-100" src="/assets/imgs/ce-courses/img-1.png" alt="DVM Central" />
                    </div>
                </div>

                <p class="text-gray-600 text-sm md:text-base mt-10 leading-loose">DVM Central help you to:</p>
                <ul class="mt-2 text-gray-600 list-disc ml-8 italic text-sm sm:text-base">
                    <li class="mt-2">Earn CE Credits to improve your chances of a pay raise and promotions</li>
                    <li class="mt-2">GTake courses taught by experts in their fields</li>
                    <li class="mt-2">Network with professionals and stay up-to-date on the latest discoveries</li>
                </ul>

                <p class="text-gray-600 text-sm md:text-base mt-6 leading-loose">Our CE course will enhance the quality of services your veterinary practice offers. So sign up and get started on your continuing education.</p>
            </div>
        </section>
    </div>
</main>
@endsection