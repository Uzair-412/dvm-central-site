@extends('frontend.layouts.app')
@section('title', 'Pet of The Month')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
    .main-image {
        height: auto;
        width: 100%;
        overflow: hidden;
        display: inline-block;
        border-radius: 5px;
    }
    .main-image img {
        transition: all 0.4s ease-in-out;
        width: 100%;
    }
    .main-image img:hover {
        transform: scale(1.1);
    }
    .card.pet-detail-card {
        border: 1px dotted #ddd;
        padding: 10px;
    }
    .pet-detail-card .list .heading {
        font-weight: 500;
        color: #418ffe;
    }
    .pet-slides {
        /* padding: 17px; */
    }
    .pet-slide {
        /* box-shadow: 0px 0px 10px 0px #ddd; */
    }
    .thumbnails {
        margin: 12px 0px;
    }
    .thumbnails img {
        width: 70px;
        border: 1px solid #ddd;
        margin: 5px 5px 0px 0px;
    }
    .overlayplay {
        display: none;
        position: fixed;
        background: rgb(1 1 1 / 70%);
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1000;
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }
    .overlayplay span.close {
        right: 2rem;
        top: 2rem;
        padding: 8px 10px;
        border-radius: 100px;
        background: #418ffe;
        /* color: #fff; */
        opacity: 1;
    }
    .pet-heading .pet-title {
        margin-bottom: 0;
        font-size: 32px;
        color: #000000;
        font-weight: 600;
    }
    .published-heading {
        color: #418ffe;
        font-weight: 600;
    }

    /* ---------------- */
    /* Swiper Slider CSS */
    /* ---------------- */
    .swiper {
        width: 100%;
        height: 100%;
    }
    
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    
    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .swiper-slide {
        background-size: cover;
        background-position: center;
    }
    
    .mySwiper2 {
        height: 80%;
        width: 100%;
    }
    
    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }
    
    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        /* opacity: 0.4; */
    }
    
    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
        border: 1px solid #418ffe;
    }
    
    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-posts {
        background: #f9f9f9;
        padding: 12px;
        border-radius: 5px;
    }
</style>
<div class="ps-container">
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="ps-layout--shop" data-select2-id="9">
            @include('frontend.includes.partials.left-bar-for-shop')
            <div class="ps-layout__right" data-select2-id="8">
                <div class="pet-heading">
                    <div class="d-flex flex-wrap justify-content-between w-100 align-items-center">
                        <h1 class="pet-title">{{ $pet->pet_name }}</h1>
                        <a href="{{ route('frontend.pet.apply') }}" class="ps-btn ps-btn--black">Share Your Pet
                            Details</a>
                    </div>
                    <p></p>
                </div>
                <div class="ps-shopping">
                    <div class="ps-shopping-product">
                        <div><span class="text-capitalize published-heading">Pet Published on:</span> {{ date('M d, Y',$pet['pet_created_time']) }}</div>
                        <div class="card pet-detail-card mb-5">
                            <div class="p-2 row">
                                <div class="col-md-5" style="border-right: 1px dotted #ddd;">
                                    <div class="swiper mySwiper2">
                                        <div class="swiper-wrapper">
                                            @foreach($pet->images as $key => $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('up_data/pets-of-the-month/images/'.$image['pet_image']) }}"
                                                    alt="{{ $pet->pet_name }}" />
                                            </div>
                                            @endforeach
                                            <div class="swiper-slide" style="background: rgb(249, 249, 249);">
                                                <video controls style=" width: 100%; ">
                                                    <source src="{{ asset('up_data/pets-of-the-month/videos/'.$pet->video) }}" type="video/mp4" />
                                                    <source src="{{ asset('up_data/pets-of-the-month/videos/'.$pet->video) }}" type="video/ogg" />
                                                </video>
                                            </div>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div thumbsSlider="" class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach($pet->images as $key => $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('up_data/pets-of-the-month/images/'.$image['pet_image']) }}"
                                                    alt="{{ $pet->pet_name }}" />
                                            </div>
                                            @endforeach
                                            <div class="d-flex flex-wrap justify-content-center align-items-center video-thumbnail swiper-slide"
                                                style="width: 70px;height: auto;background:#f8f8f8;border: 1px solid #418ffe;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    style="color: #418ffe;width: 30px;">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="overlayplay">
                                        <div class="d-flex align-items-center flex-wrap justify-content-center w-100">
                                            <video controls style=" width: 500px; ">
                                                <source src="{{ asset('up_data/pets-of-the-month/videos/'.$pet->video) }}" type="video/mp4" />
                                                <source src="{{ asset('up_data/pets-of-the-month/videos/'.$pet->video) }}" type="video/ogg" />
                                            </video>
                                            <span class="position-absolute close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="pet-slides">
                                        <div class="pet-slide d-flex flex-wrap justify-content-center">
                                            <div class="main-image">
                                                <img class="" src="{{ asset('up_data/pets-of-the-month/images/'.$pet->images[0]['pet_image']) }}" alt="{{ $pet->pet_name }}" />
                                            </div>
                                        </div>
                                        <div class="thumbnails d-flex flex-wrap">
                                            @foreach($pet->images as $key => $image)
                                            <img class="thumb-images" id="{{ $key }}" src="{{ asset('up_data/pets-of-the-month/images/'.$image['pet_image']) }}"
                                                alt="{{ $pet->pet_name }}" />
                                            @endforeach
                                            <div class="d-flex flex-wrap justify-content-center align-items-center video-thumbnail" style="width: 70px;height: 70px;background:#f8f8f8;margin:5px 5px 0px 0px;border: 1px solid #418ffe;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="color: #418ffe;width: 30px;">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-7">
                                    <div class="list">
                                        <p><span class="heading text-capitalize">Pet age:</span> {{ $pet->pet_age .' Years Old' }}</p>
                                        <p><span class="heading text-capitalize">Pet Owner:</span> {{ $pet->first_name }} {{ $pet->last_name }}</p>
                                        <p><span class="heading text-capitalize">Contact #:</span> {{ $pet->phone }}</p>
                                        <p><span class="heading text-capitalize">Address:</span> {{ $pet->address }}, {{ $pet->city }}, {{ $state->name }}, {{ $pet->zip }}</p>
                                        <p><span class="heading text-capitalize">Description:</span></p>
                                        <p>{{ $pet->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-shopping">
                    <div class="ps-shopping-product">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="pet-title">Pets</h3>
                                <div class="related-posts">
                                    @foreach($pets as $pet)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 p-0">
                                        <div class="card bg-dark">
                                            <a href="{{ route('frontend.pet_of_the_month.detail', $pet->id) }}">
                                                <img style="object-fit: cover;" class="card-img-top"
                                                    src="{{ asset('up_data/pets-of-the-month/images/'.$pet->images[0]['pet_image']) }}"
                                                    alt="{{ $pet['pet_name'] }}">
                                            </a>
                                            <div>
                                                <table class="table mb-0 text-white text-center">
                                                    <tr>
                                                        <td>{{ $pet['pet_name'] }}</td>
                                                        <td>{{ $pet['pet_age'] .' Years Old' }}</td>
                                                        <td>{{ $pet['city'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Pet of The Month for {{ date('M, d',$pet['pet_created_time']) }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-scripts')
    <script>
        // thumbImages = document.querySelectorAll('.thumb-images');
        // thumbImages.forEach((image) => {
        //     image.addEventListener('click', (e) => {
        //         document.querySelector('.main-image img').setAttribute('src', e.target.getAttribute('src'));
        //     });
        // });

        // videoThumb = document.querySelector('.video-thumbnail');
        // videoThumb.addEventListener('click', function () {
        //     document.body.style.overflow='hidden';
        //     document.querySelector('.overlayplay').style.display = 'flex';
        //     setTimeout(() => {
        //         document.querySelector('.overlayplay').style.opacity = 1;
        //     }, 100);
        // });
        
        // OverlayClose = document.querySelector('.overlayplay span.close');
        // OverlayCloseBtns = document.querySelectorAll('.overlayplay span.close, .overlayplay span.close i');
        // OverlayClose.addEventListener('click', (e) => {
        //     OverlayCloseBtns.forEach((btn) => {
        //         if (e.target === btn) {
        //             document.querySelector('.overlayplay').style.opacity = 0;
                
        //             setTimeout(() => {
        //                 document.querySelector('.overlayplay').style.display = 'none';
        //                 document.body.style.overflow='auto';
        //             }, 300);
        //         }
        //     });
        // });
    </script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
          });

          var swiper2 = new Swiper(".mySwiper2", {
            grabCursor: true,
            effect: "creative",
            creativeEffect: {
                prev: {
                    shadow: true,
                    translate: [0, 0, -400],
                },
                next: {
                    translate: ["100%", 0, 0],
                },
            },
            // spaceBetween: 10,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            thumbs: {
              swiper: swiper,
            },
          });
    </script>
@endpush