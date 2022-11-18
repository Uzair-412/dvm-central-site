<!-- page content -->
<div>
    <main id="pets-month-page" class="relative">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
            <h1 class="text-3xl md:text-5xl absolute top-2/4 left-2/4 text-white z-20 text-center w-full md:w-auto px-2">
                Pets Of The Month</h1>
            <img class="absolute top-0 left-0 w-full h-full object-cover" src="assets/imgs/pets-month/group-petx1920.jpg"
                srcset="assets/imgs/pets-month/group-petx1920.jpg 1920w, assets/imgs/pets-month/group-petx1024.jpg 1024w, assets/imgs/pets-month/group-petx576.jpg 576w"
                sizes="100%" alt="About" />
        </div>
        <div class="width -mt-12 lg:-mt-16 flex justify-end share-pet-details-wrapper relative z-10">
            <a href="{{ route('frontend.pet.apply') }}"
                class="bubble-anchors relative text-white text-center p-2 md:p-4 text-xs md:text-sm lg:text-base">
                Share Your Pet Details </a>
        </div>
        <div class="pets-month-container width mt-20 flex flex-col lg:flex-row pt-6">

            <div class="left-img-wrapper relative bg-white mr-0 lg:mr-6 mt-12 lg:mt-0 border border-solid border-gray-200 order-2 lg:order-1 hidden lg:inline-block">
                <img class="absolute top-0 left-0 w-full h-full lazyload"
                    src="assets/imgs/product-listing-left-banner-1630336563.jpg" alt="Product Listing-banner" />
            </div>

            <div class="order-1 lg:order-2 w-full">
                <div
                    class="pets-month-wrapper grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-12 w-full">
                    @foreach ($data['pets'] as $pet)
                        <a href="{{ route('frontend.pet_of_the_month.detail', $pet->id) }}"
                            class="pets-month flex flex-col items-center text-gray-500 card relative overflow-hidden pb-2 bg-white border border-solid border-gray-200">
                            <span
                                class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                            <span
                                class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                            <span
                                class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                            <span
                                class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                            <div class="pets-month-img-wrapper relative overflow-hidden w-full h-auto">
                                <img class="absolute top-0 left-0 w-full h-full lazyload"
                                    data-src="{{ asset('up_data/pets-of-the-month/images/' . $pet->images[0]['pet_image']) }}"
                                    alt="{{ $pet['pet_name'] }}" />
                            </div>
                            <div class="pet-detail-wrapper grid grid-cols-3 w-full py-2 px-4 text-xs md:text-sm">
                                <div class="pet-type">{{ $pet['pet_name'] }}</div>
                                <div class="pet-age text-center">{{ $pet['pet_age'] . ' Years Old' }}</div>
                                <div class="flex justify-end">
                                    <div class="pet-location w-min">{{ $pet['city'] }}</div>
                                </div>
                            </div>
                            <div class="pets-month-name lite-blue-color text-sm lg:text-base">Pet Of The Month for
                                {{ date('M, d', $pet['pet_created_time']) }}</div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
</div>
