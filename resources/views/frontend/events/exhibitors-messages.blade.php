@extends('frontend.layouts.virtual')

@section('content')

    <div class="pb-10">
        <div class="container content-container pt-6 mx-auto xl:px-10">
            <div class="flex flex-wrap">
                <x-events.exhibitor-nav :event="$event" :data="$data" />
                <!-- center column / main content -->
                <div class="md:w-9/12">
                





                    @livewire('event-messages')






                </div>               
               
            </div>
        </div>
    </div>
    
    
    {{-- @livewire('company-intro', ['exhibitor_data' => $data['exhibitor_data']]) --}}
    @push('after-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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