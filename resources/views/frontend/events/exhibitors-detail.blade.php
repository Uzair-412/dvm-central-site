
@extends('frontend.layouts.virtual')

@section('content')

    <div @if ($data['edit_mode']) x-data="side_bar()" @endif class="pb-10">
        @if ($data['edit_mode'])
            <div x-show="side_edit_bar" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40" aria-hidden="true"></div>
            <aside id="aside_edit_bar" class="hidden fixed h-screen overflow-y-auto bg-white z-50 flex-shrink-0 w-1/2 flex flex-col border-r border-b transition-all duration-300" x-show="side_edit_bar">
                <div class="p-2">
                    <div class="relative">
                        <div class="absolute top-0 right-0">
                            <button id="btn_sidebar_close" @click="sb_close()" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div x-show="edit_company_intro" class="pt-2">
                        @livewire('company-intro', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>
                    <div x-show="edit_company_categories" class="pt-2">
                        @livewire('company-categories', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>
                    <div x-show="edit_social_media" class="pt-2">
                        @livewire('social-media', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>
                    <div x-show="edit_address_details" class="pt-2">
                        @livewire('address-details', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>
                    <div x-show="edit_company_logos" class="pt-2">
                        @livewire('company-logos', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>
                    <div x-show="edit_files" class="pt-2">
                        @livewire('files-edit', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>

                    <div x-show="edit_products" class="pt-2">
                        @livewire('product-edit', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>

                    <div x-show="edit_jobs" class="pt-2">
                        @livewire('job-edit', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>

                    <div x-show="edit_giveaways" class="pt-2">
                        @livewire('giveaways-edit', ['exhibitor_data' => $data['exhibitor_data']])
                    </div>

                </div>
            </aside>
            <script>
                function side_bar() {
                    return {
                        side_edit_bar: false,
                        edit_company_intro: false,
                        edit_company_categories: false,
                        edit_social_media: false,
                        edit_address_details: false,
                        edit_company_logos: false,
                        edit_files: false,
                        edit_products: false,
                        edit_jobs: false,
                        edit_giveaways: false,
                        sb_save() {},
                        sb_open(sec) {
                            this.sb_close();
                            this.side_edit_bar = true;
                            this[sec] = true;
                        },
                        sb_close() {
                            this.side_edit_bar = this.edit_company_intro = this.edit_company_categories = this.edit_social_media = false;
                            this.edit_address_details = this.edit_company_logos = this.edit_files = this.edit_products = this.edit_jobs = false;
                            this.edit_giveaways = false;
                        }
                    }
                }
            </script>
        @endif
        <div class="container content-container pt-6 mx-auto xl:px-10">
            <div class="flex flex-wrap">
                <x-events.exhibitor-nav :event="$event" :data="$data" />
                <!-- center column / main content -->
                <div class="xl:w-2/4 md:w-2/3 w-full">
                    <div class="bg-white shadow rounded">
                        @livewire('company-logos-show', ['exhibitor_data' => $data['exhibitor_data'], 'edit_mode' =>
                        $data['edit_mode']])
                        <div class="px-5 xl:px-10 pb-10">
                            <div class="lg:text-left text-center mt-6 sm:flex border-b">
                                <div class="md:w-1/4 p-4">
                                    <a href="javascript:;" onclick="scrollToEl('div-products');">
                                        <h3 class="text-black text-sm bg-gray-200 p-2 rounded inline-block font-bold">
                                            Products
                                        </h3>
                                    </a>
                                </div>
                                <div class="md:w-1/4 p-4">
                                    <a href="javascript:;" onclick="scrollToEl('div-jobs');">
                                        <h3 class="text-black text-sm bg-gray-200 p-2 rounded inline-block font-bold">Job
                                            Listing</h3>
                                    </a>
                                </div>
                                <div class="md:w-1/4 p-4">
                                    <a href="javascript:;" onclick="scrollToEl('div-giveaways');">
                                        <h3 class="text-black text-sm bg-gray-200 p-2 rounded inline-block font-bold">
                                            Giveaways
                                        </h3>
                                    </a>
                                </div>
                                <div class="md:w-1/4 p-4">
                                    <a href="javascript:;" onclick="scrollToEl('div-docs-links');">
                                        <h3 class="text-black text-sm bg-gray-200 p-2 rounded inline-block font-bold">
                                            Documents
                                        </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="flex flex-wrap">
                                    <div class="w-full mb-4">
                                        <a name="overview"></a>
                                        <div class="heading-wrapper flex justify-between items-center" id="div-overview">
                                            <p class="text-xl font-bold">Information</p>
                                            @if ($data['edit_mode'])
                                                <p @click="sb_open('edit_company_intro')"
                                                    class="cursor-pointer text-sm primary-color">Edit</p>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="leading-6 text-gray-800 text-sm pt-2">
                                                @livewire('company-intro-show', ['exhibitor_data' =>
                                                $data['exhibitor_data']])
                                            </div>
                                            <div class="keywords mt-5 pt-5 border-t">
                                                <div class="heading-wrapper flex justify-between items-center">
                                                    <p class="text-xl font-bold">Interests</p>
                                                    @if ($data['edit_mode'])
                                                        <p @click="sb_open('edit_company_categories')"
                                                            class="cursor-pointer text-sm primary-color">Edit</p>
                                                    @endif
                                                </div>
                                                @livewire('company-categories-list', ['exhibitor_data' =>
                                                $data['exhibitor_data']])
                                            </div>
                                            <a name="social"></a>
                                            <div class="social-links mt-5 pt-5 border-t" id="div-social">
                                                <div class="heading-wrapper flex justify-between items-center">
                                                    <p class="text-xl font-bold">Social Media</p>
                                                    @if ($data['edit_mode'])
                                                        <p @click="sb_open('edit_social_media')"
                                                            class="cursor-pointer text-sm primary-color">Edit</p>
                                                    @endif
                                                </div>
                                                @livewire('social-media-list', ['exhibitor_data' =>
                                                $data['exhibitor_data']])
                                            </div>
                                            <a name="contact"></a>
                                            <div class="contact mt-5 pt-5 border-t" id="div-contact">
                                                <div class="heading-wrapper flex justify-between items-center">
                                                    <p class="text-xl font-bold">Contact Details</p>
                                                    @if ($data['edit_mode'])
                                                        <p @click="sb_open('edit_address_details')"
                                                            class="cursor-pointer text-sm primary-color">Edit</p>
                                                    @endif
                                                </div>
                                                @livewire('address-details-show', ['exhibitor_data' =>
                                                $data['exhibitor_data']])
                                            </div>
                                            <a name="products"></a>
                                            <div class="products-carasoul mt-5 pt-5 border-t" id="div-products">
                                                
                                                @livewire('product-list', ['exhibitor_data' =>
                                                $data['exhibitor_data'], 'edit_mode' => $data['edit_mode']])

                                            </div>
                                            <a name="jobs"></a>
                                            <div class="listing-carasoul mt-5 pt-5 border-t" id="div-jobs">
                                                
                                                @livewire('job-list', ['exhibitor_data' =>
                                                $data['exhibitor_data'], 'edit_mode' => $data['edit_mode']])

                                            </div>
                                            <a name="giveaways"></a>
                                            <div class="Giveaways-carasoul mt-5 pt-5 border-t" id="div-giveaways">
                                                
                                                @livewire('giveaways-list', ['exhibitor_data' =>
                                                $data['exhibitor_data'], 'edit_mode' => $data['edit_mode']])

                                            </div>
                                            <a name="docs-links"></a>
                                            <div id="div-docs-links">
                                                @livewire('files-list', ['exhibitor_data' => $data['exhibitor_data'], 'edit_mode' => $data['edit_mode']])
                                            </div>
                                            
                                            {{-- <div class="listing-carasoul mt-5 pt-5 border-t">
                                                <div class="team-heading-wrapper flex justify-between">
                                                    <p class="text-xl font-bold">Team</p>
                                                    <a href="#" class="text-sm primary-color">See More</a>
                                                </div>
                                                <div class="team-content-wrapper flex mt-4">
                                                    <div class="team-member-logo-wrapper mr-10">
                                                        <div class="flex items-center justify-center team-member-logo uppercase rounded-full text-white primary-bg w-16 h-16">
                                                            im</div>
                                                    </div>
                                                    <div class="team-wrapper flex-col">
                                                        <div class="name text-sm">Imtiaz Mughal</div>
                                                        <div class="designation text-sm">President</div>
                                                        <div class="company-name text-sm">GerVetUSA Inc.</div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- center column ends here-->
                <!-- right side column, will be used onwoard 1280px, otherwise hidden-->
                @if(trim($data['exhibitor_data']->vendor->virtual_booth_url) != null)
                    <div class="right-side hidden xl:block md:w-1/4 w-full">
                        <a href="{{ $data['exhibitor_data']->vendor->virtual_booth_url }}" target="_blank"><img class="ml-5 rounded" src="{{ $data['exhibitor_data']->vendor->virtual_booth_url . 'thumbnail.jpg' }}" alt="Visit Our Virtual Booth" /></a>
                    </div>
                @else
                    <div class="right-side hidden xl:block md:w-1/4 w-full">
                        <img class="ml-5 rounded" src="https://images.unsplash.com/photo-1632341607255-f9f648ac7d25?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" />
                    </div>
                @endif
                
                <!-- right side column ends here-->
                <!-- right side column, will be used below 768px, otherwise hidden-->
                {{-- <div class="block w-full md:hidden">
                    <div class="img-wrapper w-full flex justify-center">
                        <img class="w-full sm:w-1/2 mt-5 rounded" src="https://images.unsplash.com/photo-1632341607255-f9f648ac7d25?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" />
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    
    {{-- @livewire('company-intro', ['exhibitor_data' => $data['exhibitor_data']]) --}}
    @push('after-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @if ($data['edit_mode'])
            <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @endif
    @endpush
    @push('after-scripts')
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            // Avatar dropdown
            function dropdownHandler(element) {
                let single = element.getElementsByTagName('ul')[0]
                single.classList.toggle('hidden')
            }
            //Hamburger and mobile menu
            function MenuHandler(el, val) {
                let MainList = el.parentElement.parentElement.getElementsByTagName('ul')[0]
                let closeIcon = el.parentElement.parentElement.getElementsByClassName('close-m-menu')[0]
                let showIcon = el.parentElement.parentElement.getElementsByClassName('show-m-menu')[0]
                if (val) {
                    MainList.classList.remove('hidden')
                    el.classList.add('hidden')
                    closeIcon.classList.remove('hidden')
                } else {
                    showIcon.classList.remove('hidden')
                    MainList.classList.add('hidden')
                    el.classList.add('hidden')
                }
            }
            // slick slider for products
            $(document).ready(function() {
                $('.slick-carasoul').slick({
                    // autoplay: true,
                    dots: true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    pauseOnFocus: false,
                    pauseOnHover: false,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
            // filter catergory menu toggler
            let menuOpenBtn = document.querySelector('.menu-arrow')
            let megaMenu = document.querySelector('.mega-menu-container')
            menuOpenBtn.addEventListener('click', function() {
                megaMenu.classList.toggle('show-menu')
                menuOpenBtn.classList.toggle('rotate-arrow')
            })
        </script>


        <script>
            
        let menuBtn = document.querySelectorAll('.menu'),
                menuHolder = document.querySelectorAll('.menu-holder'),
                textMenu = document.querySelectorAll('.text-menu'),
                menuOpen = false

            for( let i = 0; i < menuHolder.length; i++) {
                window.addEventListener('click', function(e) {
                    
                    if(e.target === menuHolder[i].querySelector('.menu')) {
                    menuHolder[i].querySelector('.text-menu').classList.toggle('hidden')
                    } 
                    else if (e.target !== menuHolder[i].querySelector('.menu')) {
                    menuHolder[i].querySelector('.text-menu').classList.add('hidden')
                    }
                })
            }

        </script>


    @endpush
@endsection
