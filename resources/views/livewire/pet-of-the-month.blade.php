<!-- page content -->
<div>
    <main id="pet-month-page" class="relative">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-40 z-10"></div>
            <h1 class="text-3xl md:text-5xl absolute top-2/4 left-2/4 text-white z-20 text-center w-full md:w-auto px-2">
                Pet Of The Month</h1>
            <img class="absolute top-0 left-0 w-full h-full object-cover" src="assets/imgs/pets-month/pet-monthx1920.jpg"
                srcset="assets/imgs/pets-month/pet-monthx1920.jpg 1920w,
                    assets/imgs/pets-month/pet-monthx1440.jpg 1440w,
                    assets/imgs/pets-month/pet-monthx1024.jpg 1024w,
                    assets/imgs/pets-month/pet-monthx768.jpg   768w,
                    assets/imgs/pets-month/pet-monthx576.jpg   576w" sizes="100%" alt="Pet Of The Month" />
        </div>

        <div class="pet-month-container width mt-20 flex flex-col xl:flex-row sm:pt-6 w-full">


            <div class="left-img-wrapper relative bg-white mr-0 lg:mr-6 mt-12 lg:mt-0 border border-solid border-gray-200 order-2 lg:order-1 hidden xl:inline-block">
                <img class="absolute top-0 left-0 w-full h-full lazyload"
                    src="assets/imgs/product-listing-left-banner-1630336563.jpg" alt="Product Listing-banner" />
            </div>

            <div class="order-1 xl:order-2 w-full xl:w-9/12 relative">

                <div class="pet-month-wrapper flex flex-col md:flex-row w-full relative">
                    <div class="flex flex-col w-full md:w-6/12 relative mr-6">
                        <div class="pet-month-imgs-container swiper mySwiper w-full relative p-4 sm:p-6 bg-white border border-solid border-gray-200 text-xs md:text-sm md:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-next -mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="#418ffe">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-prev -ml-1" fill="none" viewBox="0 0 24 24"
                                stroke="#418ffe">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            <div class="pet-month-imgs-wrapper swiper-wrapper relative w-full">
                                @foreach ($data['images'] as $images)
                                    <div class="pet-month-img-wrapper swiper-slide relative w-full h-auto overflow-hidden">
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                        <img class="pet-month-img absolute top-0 left-0 w-full h-full swiper-lazy"
                                            data-src="{{ asset('up_data/pets-of-the-month/images/' . $images->pet_image) }}"
                                            alt="{{ $images->pet_image }}" />
                                    </div>
                                @endforeach



                            </div>
                        </div>
                        <div class="swiper mySwiper pet-month-thumbsSlider w-full mt-4 bg-white border border-solid border-gray-200">
                            <div class="swiper-wrapper py-2">
                                @foreach ($data['images'] as $images)
                                    <div class="swiper-slide cursor-pointer flex justify-center w-max bg-gray">

                                        <img class="thumbnail-img border border-solid border-gray-200"
                                            src="{{ asset('up_data/pets-of-the-month/images/' . $images->pet_image) }}"
                                            alt="{{ $images->pet_image }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div
                        class="pet-details-container w-full md:w-6/12 border border-solid border-gray-200 p-2 sm:p-4 md:p-6 bg-white mt-6 md:mt-0 text-xs sm:text-sm md:text-base relative overflow-hidden">
                        <div class="pet-detail wrapper flex flex-col relative z-10">

                            <div class="pet-detail flex items-center">
                                <div class="lite-blue-color">Pet Name:</div>
                                <div class="pet-age ml-2 text-gray-500">{{ $data['pet']['pet_name'] }}</div>
                            </div>
                            <div class="pet-detail flex items-center">
                                <div class="lite-blue-color">Pet Age:</div>
                                <div class="pet-age ml-2 text-gray-500">{{ $data['pet']['pet_age'] }}</div>
                            </div>
                            <div class="pet-detail flex mt-2 items-center">
                                <div class="lite-blue-color">Pet Owner:</div>
                                <div class="pet-owner ml-2 text-gray-500">{{ $data['pet']['first_name'] }}
                                    {{ $data['pet']['last_name'] }}
                                </div>
                            </div>
                            <div class="pet-detail flex mt-2 items-center">
                                <div class="lite-blue-color">Contact No:</div>
                                <div class="pet-owner-contact ml-2 text-gray-500">{{ $data['pet']['phone'] }}</div>
                            </div>
                            <div class="pet-detail flex mt-2">
                                <div class="lite-blue-color">Address:</div>
                                <address class="pet-owner-address ml-2 text-gray-500">
                                    {{ $data['pet']['address'] }},{{ $data['pet']['city'] }},{{ $data['state']['name'] }},{{ $data['pet']['zip'] }}
                                </address>
                            </div>
                            <div class="pet-detail flex mt-2">
                                <div class="lite-blue-color">Description:</div>
                                <div class="pet-description ml-2 text-gray-500">{{ $data['pet']['description'] }}
                                </div>
                            </div>
                            <div class="pet-detail flex mt-2">
                                <div class="lite-blue-color">Pet Published On:</div>
                                <div class="pet-description ml-2 text-gray-500">
                                    {{ date('M d, Y', $data['pet']['pet_created_time']) }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @if(@$data['pet']['video'])
                    <div class="flex flex-col w-full md:w-6/12 relative mr-6 mt-6">
                        <video controls style=" width: 100%; ">
                            <source src="{{ asset('up_data/pets-of-the-month/videos/' . $data['pet']['video']) }}" type="video/mp4" />
                        </video>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-between relative w-full py-2 width mt-20">
            <div class="text-lg sm:text-xl font-semibold leading-none">Others Pets Of The Month</div>

            <div class="swiper-buton-wrapper h-8 w-16 relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-next" fill="none"
                    viewBox="0 0 24 24" stroke="#418ffe">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-8 sm:w-8 swiper-button-prev" fill="none"
                    viewBox="0 0 24 24" stroke="#418ffe">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
        </div>

        <div class="width">
            <div class="other-pets-month-container swiper mySwiper relative overflow-hidden">
                <div class="pets-month-wrapper gap-y-12 w-full swiper-wrapper">
                    @foreach ($data['pets'] as $pet)
                        <a href="{{ route('frontend.pet_of_the_month.detail', $pet->id) }}"
                            class="pets-month swiper-slide flex flex-col items-center text-gray-500 card relative overflow-hidden pb-2 bg-white border border-solid border-gray-200">
                            <span
                                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                            <span
                                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                            <span
                                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                            <span
                                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <div class="pets-month-img-wrapper relative overflow-hidden w-full h-auto">
                                <img class="absolute top-0 left-0 w-full h-full swiper-lazy"
                                    src="{{ asset('up_data/pets-of-the-month/images/' . $pet->images[0]['pet_image']) }}"
                                    alt="{{ $pet['pet_name'] }}">
                            </div>
                            <div class="pet-detail-wrapper grid grid-cols-3 w-full py-2 px-4 text-xs md:text-sm">
                                <div class="pet-type">{{ $pet['pet_name'] }}</div>
                                <div class="pet-age text-center">{{ $pet['pet_age'] . ' Years Old' }}</div>
                                <div class="flex justify-end">
                                     <div class="pet-location w-min">{{ $pet['city'] }}</div>
                                </div>
                               
                            </div>
                            <div class="pets-month-name lite-blue-color text-sm lg:text-base px-2">Pet Of The Month for
                                {{ date('M, d', $pet['pet_created_time']) }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="width relative overflow-hidden mt-4">
            <div class="swiper-scrollbar w-full"></div>
        </div>
    </main>
</div>
