<!-- page content -->

<div>
    <main id="resources-page" class="relative">
        <div class="resources-container">
            <div class="header-img w-full h-full relative overflow-hidden">
                <div
                    class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-4">
                    <div class="text-2xl font-semibold text-white">Vet Resources</div>
                    <div class="text-xl text-white mt-2 font-semibold" style="color: #003067;">Free Vet Resources for
                        Everyone</div>
                    <p class="text-gray-200 mt-2 text-sm">Get news, research papers, product launches, videos,
                        animations,
                        medical guides and everything related to veterinary.</p>
                </div>
            </div>

           <div class="news-feed-wrapper width mt-20">
                <div class="news-feed-title-wrapper flex justify-between items-end gap-4">
                    <h1 class="text-2xl font-semibold inline tracking-wide primary-black-color">Explore The Resources Just For You</h1>
                </div>

                <div class="news-feed-wrapper grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-12 w-full pt-6">
                    <a href="{{ route('frontend.resources.news') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/news.jpg')}}" alt="News" />
                        </div>
                    </a>

                    <a href="{{ route('frontend.resources.programs') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/edu-pro.jpg')}}" alt="Educational Programs" />
                        </div>
                    </a>

                    <a href="{{ route('frontend.resources.online-resources') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/resources.jpg')}}" alt="Online Resources" />
                        </div>
                    </a>

                    <a href="{{ route('frontend.resources.associations') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/association.jpg')}}" alt="Associations" />
                        </div>
                    </a>

                    <a href="{{ route('frontend.resources.surgical-procedures') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/sur-pro.jpg')}}" alt="Surgical Procedure" />
                        </div>
                    </a>

                    <a href="{{ route('frontend.shows') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/shows.jpg')}}" alt="Trade Shows" />
                        </div>
                    </a>

                    <a href="/blog" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/blogs.jpg')}}" alt="Blogs" />
                        </div>
                    </a>

                    <a href="/resources/common-diseases" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/diseases.jpg')}}" alt="Common Diseases" />
                        </div>
                    </a>

                    <a href="{{ route('frontend.course.category') }}" class="news-feed flex flex-col items-center text-gray-500 card relative overflow-hidden p-4 bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="news-feed-img-wrapper relative overflow-hidden w-full h-auto">
                            <img class="absolute top-0 left-0 w-full h-full lazyload" data-src="{{asset('assets/imgs/resources/courses.jpg')}}" alt="Courses" />
                        </div>
                    </a>
                </div>
            </div>

            
        </div>
    </main>
</div>
