@extends('frontend.layouts.app')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/share-pet-details.css') }}" />
    <style>
        .active .multi-step-icon,
        .active .step-bar {
            border-color: #418ffe
        }
        .left-img-wrapper {
            min-height: 537px;
            max-height: 537px;
            min-width: 290px;
            max-width: 290px;
        }
    </style>
@endpush

@section('content')
    <!-- page content -->
    <main id="share-pet-details-page" class="relative">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 z-10"></div>
            <h1 class="text-3xl md:text-5xl absolute top-2/4 left-2/4 text-white z-20 text-center w-full md:w-auto px-2">Share Your Pet's Details</h1>
            <img
                class="absolute top-0 left-0 w-full h-full object-cover"
                src="assets/imgs/share-pet-details/headshot-closeup-portrait-catx1920.jpg"
                srcset="
                    assets/imgs/share-pet-details/headshot-closeup-portrait-catx1920.jpg 1920w,
                    assets/imgs/share-pet-details/headshot-closeup-portrait-catx1024.jpg 1024w,
                    assets/imgs/share-pet-details/headshot-closeup-portrait-catx768.jpg   768w,
                    assets/imgs/share-pet-details/headshot-closeup-portrait-catx576.jpg   576w
                "
                sizes="100%"
                alt="About"
            />
        </div>

        <div class="pets-month-container width mt-20 flex flex-col lg:flex-row pt-6">
            <div class="left-img-wrapper relative bg-white mr-0 lg:mr-6 mt-12 lg:mt-0 border border-solid border-gray-200 order-2 lg:order-1 hidden xl:inline-block">
                <img class="absolute top-0 left-0 w-full h-full lazyload"
                    src="assets/imgs/product-listing-left-banner-1630336563.jpg" alt="Product Listing-banner" />
            </div>
            <div class="order-1 lg:order-2 w-full text-sm md:text-base overflow-hidden">
                <h1 class="text-2xl font-semibold inline tracking-wide primary-black-color w-max sm:pb-1">Enter Your Pet's Details</h1>
                <div class="sm:mx-4 sm:p-4 mt-6">
                    <div class="flex items-center">
                        <div class="flex items-center relative step-item" id="step-1">
                            <div class="rounded-full transition duration-500 ease-in-out h-10 md:h-12 w-10 md:w-12 py-2 md:py-3 border-2 blue-border flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 28 28" stroke="#666">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
                                    />
                                </svg>
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-14 w-max sm:w-32 text-gray-500 text-xs md:text-sm hidden sm:inline-block">Basic Details</div>
                        </div>
                        <div class="flex items-center w-4/12 step-item" id="step-2">
                            <div class="flex-auto border-t-2 transition duration-500 ease-in-out step-bar" id="line-1"></div>
                            <div class="flex items-center text-white relative self-end">
                                <div class="rounded-full transition duration-500 ease-in-out h-10 md:h-12 w-10 md:w-12 py-2 md:py-3 border-2 flex justify-center multi-step-icon" id="multi-step-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 28 28" stroke="#666">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>
                                <div class="absolute top-0 -ml-10 text-center mt-14 w-max sm:w-32 text-gray-500 text-xs md:text-sm hidden sm:inline-block">Images</div>
                            </div>
                        </div>
                        <div class="flex items-center w-4/12 step-item" id="step-3">
                            <div class="flex-auto border-t-2 transition duration-500 ease-in-out step-bar" id="line-2"></div>
                            <div class="flex items-center text-gray-500 relative">
                                <div class="rounded-full transition duration-500 ease-in-out h-10 md:h-12 w-10 md:w-12 py-2 md:py-3 border-2 flex justify-center multi-step-icon" id="multi-step-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 28 28" stroke="#666">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="absolute top-0 -ml-10 text-center mt-14 w-max sm:w-32 text-gray-500 text-xs md:text-sm hidden sm:inline-block">Video</div>
                            </div>
                        </div>
                        <div class="flex items-center w-4/12 step-item" id="step-4">
                            <div class="flex-auto border-t-2 transition duration-500 ease-in-out step-bar" id="line-3"></div>
                            <div class="flex items-center text-gray-500 relative">
                                <div class="rounded-full transition duration-500 ease-in-out h-10 md:h-12 w-10 md:w-12 py-2 md:py-3 border-2 flex justify-center multi-step-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform rotate-90" fill="none" viewBox="0 0 28 28" stroke="#666">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                </div>
                                <div class="absolute top-0 -ml-10 text-center mt-14 w-max sm:w-32 text-gray-500 text-xs md:text-sm hidden sm:inline-block">Submit</div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="pet-form" action="{{ route('frontend.pet.share') }}" class="mt-6 sm:mt-12">
                    @csrf
                    <!-- images upload -->
                    <div id="basic-detail" class="">
                        <div class="flex flex-col md:grid md:grid-cols-2 gap-2 sm:gap-4 md:gap-6">
                            <div>
                                <input id="first_name" name="first_name" type="text" required placeholder="Enter first name ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="first_name_err"></small>
                            </div>
                            <div>
                                <input id="last_name" name="last_name" type="text" required placeholder="Enter last name ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="last_name_err"></small>
                            </div>
                            <div>
                                <input id="email" name="email" type="email" required placeholder="Enter email address ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="email_err"></small>
                            </div>
                            <div>
                                <input id="phone" name="phone" type="text" required placeholder="Enter phone ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="phone_err"></small>
                            </div>
                            <div>
                                <input id="pet_name" name="pet_name" type="text" required placeholder="Enter pet name ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="pet_name_err"></small>
                            </div>
                            <div>
                                <input id="pet_age" name="pet_age" type="text" required placeholder="Enter pet age ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="pet_age_err"></small>
                            </div>
                            <div>
                                <input id="address" name="address" type="text" required placeholder="Enter address ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="address_err"></small>
                            </div>
                            <div>
                                <input id="city" name="city" type="text" required placeholder="Enter city ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="city_err"></small>
                            </div>
                            <div>
                                <select id="state" name="state" required class="p-3 border border-solid border-gray-200 focus:outline-none w-full">
                                    <option value="" selected>Select state ...</option>
                                    @foreach($data['states'] as $key => $name)
                                        <option value="{{ $key }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <small class="w-full text-red-500 font-semibold" id="state_err"></small>
                            </div>
                            <div>
                                <input type="text" id="zip" name="zip" required placeholder="Enter zip ..." class="p-3 border border-solid border-gray-200 focus:outline-none w-full" />
                                <small class="w-full text-red-500 font-semibold" id="zip_err"></small>
                            </div>

                            <textarea class="p-2 md:p-3 border border-solid border-gray-200 focus:outline-none col-span-2" row="3" placeholder="Enter description ..." id="description" name="description" cols="50" rows="5" id="description"></textarea>

                            <button type="button" id="next-1" class="col-span-2 btn px-4 md:px-6 py-2 md:py-3 tracking-widest relative overflow-hidden btn black-btn z-10 primary-black-bg text-white w-max justify-self-end">Next</button>
                        </div>
                    </div>

                    <!-- images upload -->
                    <div class="hidden" id="pet-form-step-2">
                        <div class="flex flex-col md:grid md:grid-cols-2 gap-2 gap-4 md:gap-6">
                            <div class="wrapper">
                                <div>Upload an Image<span class="text-red-500">*</span></div>
                                <label for="image-1" class="flex items-center border border-solid border-gray-200 card relative overflow-hidden cursor-pointer p-2 md:p-3 mt-2 text-gray-500 bg-white">
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    <svg class="w-8 h-8 lite-blue-color" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="leading-normal ml-2">Select an Image</span>
                                    <input id="image-1" name="images[]" type="file" required class="hidden w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" />
                                </label>
                                <small class="w-full text-red-500 font-semibold" id="image-1_err"></small>
                            </div>

                            <div class="wrapper">
                                <div>Upload an Image<span> (optional)</span></div>
                                <label for="image-2" class="flex items-center border border-solid border-gray-200 card relative overflow-hidden cursor-pointer p-2 md:p-3 mt-2 text-gray-500 bg-white">
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    <svg class="w-8 h-8 lite-blue-color" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="leading-normal ml-2">Select an Image</span>
                                    <input id="image-2" name="images[]" type="file" class="hidden w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" />
                                </label>
                                <small class="w-full text-red-500 font-semibold" id="image-2_err"></small>
                            </div>

                            <div class="wrapper">
                                <div>Upload an Image<span> (optional)</span></div>
                                <label for="image-3" class="flex items-center border border-solid border-gray-200 card relative overflow-hidden cursor-pointer p-2 md:p-3 mt-2 text-gray-500 bg-white">
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    <svg class="w-8 h-8 lite-blue-color" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="leading-normal ml-2">Select an Image</span>
                                    <input id="image-3" name="images[]" type="file" class="hidden w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" />
                                </label>
                                <small class="w-full text-red-500 font-semibold" id="image-3_err"></small>
                            </div>

                            <div class="wrapper">
                                <div>Upload an Image<span> (optional)</span></div>
                                <label for="image-4" class="flex items-center border border-solid border-gray-200 card relative overflow-hidden cursor-pointer p-2 md:p-3 mt-2 text-gray-500 bg-white">
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    <svg class="w-8 h-8 lite-blue-color" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="leading-normal ml-2">Select an Image</span>
                                    <input id="image-4" name="images[]" type="file" class="hidden w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" />
                                </label>
                                <small class="w-full text-red-500 font-semibold" id="image-4_err"></small>
                            </div>

                            <div class="btn-wrapper flex justify-between col-span-2">
                                <button type="button" class="btn px-4 md:px-6 py-2 md:py-3 tracking-widest relative overflow-hidden btn black-btn z-10 primary-black-bg text-white w-max justify-self-end" onclick="hideStep('pet-form-step-2', 'basic-detail', 'step-1')">Back</button>
                                <button type="button" id="next-2" class="btn px-4 md:px-6 py-2 md:py-3 tracking-widest relative overflow-hidden btn blue-btn z-10 lite-blue-bg-color text-white w-max justify-self-end">Next</button>
                            </div>
                        </div>
                    </div>

                    <!-- video upload -->
                    <div id="pet-form-step-3" class="hidden">
                        <div class="flex flex-col md:grid md:grid-cols-2 gap-2 gap-4 md:gap-6">
                            <div class="wrapper">
                                <div>Upload a Video<span class="text-red-500">*</span></div>
                                <label for="video" class="flex items-center border border-solid border-gray-200 card relative overflow-hidden cursor-pointer p-2 md:p-3 mt-2 text-gray-500 bg-white">
                                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                    <svg class="w-8 h-8 lite-blue-color" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="leading-normal ml-2">Select a Video</span>
                                    <input id="video" name="video" type="file" class="hidden w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none" />
                                </label>
                            </div>

                            <div class="btn-wrapper flex justify-between col-span-2">
                                <button type="button" class="btn px-4 md:px-6 py-2 md:py-3 tracking-widest relative overflow-hidden btn black-btn z-10 primary-black-bg text-white w-max justify-self-end" onclick="hideStep('pet-form-step-3', 'pet-form-step-2', 'step-2')">Back</button>
                                <button type="submit" class="btn px-4 md:px-6 py-2 md:py-3 tracking-widest relative overflow-hidden btn blue-btn z-10 lite-blue-bg-color text-white w-max justify-self-end">Submit</button>
                            </div>
                        </div>
                    </div>

                    <!-- thank you -->
                    <div class="thank-you flex justify-center w-full relative hidden" id="pet-form-step-4">
                        <lottie-player class="lottie-player" src="{{ asset('assets/lottie/lf30_editor_oi3bx5ty.json') }}" background="transparent" speed="1" loop autoplay></lottie-player>
                        <h1 class="text-3xl md:text-5xl font-semibold absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 text-center z-10">Thank You</h1>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('after-scripts')
<script defer src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    let errors = {firstname: '', lastname: ''}
    let isSubmit = false;
    document.getElementById('pet-form').addEventListener('submit', SharePetDetails);
    document.getElementById('next-1').addEventListener('click', step1);
    document.getElementById('next-2').addEventListener('click', step2);

    document.getElementById('image-1').addEventListener('change', uploadFile);
    document.getElementById('image-2').addEventListener('change', uploadFile);
    document.getElementById('image-3').addEventListener('change', uploadFile);
    document.getElementById('image-4').addEventListener('change', uploadFile);

    document.getElementById('video').addEventListener('change', uploadVideo);

    async function validate(after='')
    {
        isSubmit = true;
        let validForm;
        if(after!='')
        {
            validForm = $(`#${after} input[required], select[required], textarea[required]`);
        }
        else
        {
            validForm = $(`input[required], select[required], textarea[required]`);
        }
        
        await validForm.each(function() {
            let id = $(this).attr('id');
            if($(this).attr('type')!='file' || $(this).prop('tagName')=='SELECT' || $(this).prop('tagName')=='TEXTAREA')
            {
                if($(this).val()=='')
                {
                    $(`#${id}_err`).show().text('This field is required.');
                    isSubmit = false;
                }
                else
                {
                    $(`#${id}_err`).hide().text('');
                }
            }
            else
            {
                if($(this)[0].files.length==0)
                {
                    $(`#${id}_err`).show();
                    $(`#${id}_err`).text('This field is required.');
                    isSubmit = false;
                }
                else
                {
                    $(`#${id}_err`).hide();
                    $(`#${id}_err`).text('');
                }
            }
        });
    }

    async function step1()
    {
        await validate('basic-detail')
        if(isSubmit==true)
        {
            hideStep('basic-detail', 'pet-form-step-2', 'step-2');
        }
    }
    async function step2()
    {
        await validate('pet-form-step-2')
        if(isSubmit==true)
        {
            hideStep('pet-form-step-2', 'pet-form-step-3', 'step-3');
        }
    }

    // Image uploading functions
    async function uploadFile(event)
    {
        let id = $(this).attr('id');
        event.target.previousElementSibling.innerHTML=$(this)[0].files[0].name;
        if($(this)[0].files[0].type=='image/png' || $(this)[0].files[0].type=='image/jpg' || $(this)[0].files[0].type=='image/jpeg' || $(this)[0].files[0].type=='image/gif')
        {
            $(`#${id}_err`).text('');
            isSubmit=true;
            $('#next-2').attr('disabled', false);
        }
        else
        {
            $(`#${id}_err`).text('Image is not in valid formate!');
            isSubmit=false;
            $('#next-2').attr('disabled', true);
        }
        await checkImage(event.target)
    }

    let isImgErrorArray = [false,false,false,false];
    async function checkImage(self) {
        let indexOfImgErrorArray = parseInt(self.getAttribute('id').split('-')[1]);
        let url = URL.createObjectURL(self.files[0]);
        const img = new Image();
        img.src = url;
        img.onload = async function() {
            if(this.width !== this.height){
                isImgErrorArray[indexOfImgErrorArray-1] = true;
                self.parentElement.nextElementSibling.innerHTML = 'image dimension must be in square formate e.g. 200 x 200!';
            }
            else
            {
                self.parentElement.nextElementSibling.innerHTML = '';
                isImgErrorArray[indexOfImgErrorArray-1] = false;
            }

            let imgErrCount = 0;
            await isImgErrorArray.map(function(err) {
                if(err == true)
                {
                    imgErrCount++;
                }
            });
            if(imgErrCount > 0)
            {
                document.querySelector("#next-2").setAttribute('disabled', true);
            }
            else
            {
                document.querySelector("#next-2").removeAttribute('disabled');
            }
        }
    }

    // Video uploading functions
    function uploadVideo(event)
    {
        let id = $(this).attr('id');
        $(this).next('label').text($(this)[0].files[0].name);
        if($(this)[0].files[0].type=='video/mp4' || $(this)[0].files[0].type=='video/mov' || $(this)[0].files[0].type=='video/wmv')
        {
            $(`#${id}_err`).text('');
            isSubmit=true;
            $('#share').attr('disabled', false);
        }
        else
        {
            $(`#${id}_err`).text('Video is not in valid formate!');
            isSubmit=false;
            $('#share').attr('disabled', true);
        }
    }

    async function SharePetDetails (event)
    {
        event.preventDefault();
        if(isSubmit==true)
        {
            $.ajax({
                method: 'POST',
                url: event.target.action,
                data : new FormData(this),
                contentType:false,
                processData:false,
                success: function (response) {
                    if(response==1)
                    {
                        $('#pet-form').trigger("reset");
                        hideStep('pet-form-step-3', 'pet-form-step-4', 'step-4');
                    }
                }
            })
        }
        return false;
    }

    function hideStep(id, next, activeId)
    {
        let count = activeId.split('-')[1];
        
        $('.step-item').each(function(){
            let stepNumber = $(this).attr('id').split('-')[1];
            if(stepNumber!=undefined)
            {
                if(Number(stepNumber) > Number(count))
                {
                    $(this).removeClass('active')
                }
                else
                {
                    $(this).addClass('active');
                }
            }
        });

        $('#'+id).addClass('opacity-0');
        setTimeout(() => {
            $('#'+id).addClass('hidden');
            $('#'+next).removeClass('hidden');
        }, 300);
        setTimeout(() => {
            $('#'+next).removeClass('opacity-0');
            $('#'+next).addClass('opacity-100');
        }, 400);
    }

    $(".onlyNumbers").keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode;
        if (String.fromCharCode(charCode).match(/[^0-9]/g) || e.target.value.length>2)
        {
            return false;
        }
   });
</script>
@endpush
