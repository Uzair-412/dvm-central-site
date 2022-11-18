 <!-- page content -->
 <div>
    <main id="resource-page" class="relative">
        <div class="resource-container width mt-20">
            <div class="flex flex-col xl:flex-row">
                <div class="left-col xl:w-9/12 xl:mr-10">
                    <h1 class="news-title font-semibold text-xl sm:text-3xl leading-snug">{{ $data['News']->name }}
                    </h1>
                    <div class="mt-2 lite-blue-color text-xs sm:text-sm md:text-base">
                        On
                        <span
                            class="blog-date">{{ date('D M d, Y', strtotime($data['News']->publish_date)) }}</span>
                    </div>
                    <div class="bg-white mt-2">
                        <img class="top-0 left-0 w-full h-full" src="{{ asset('up_data/news/' . $data['News']->top_image_banner) }}"
                        alt="{{ $data['News']->top_image_banner }}" style="max-width: 100%; width=auto;" />
                        </div>
                    <div class="resource-content mt-10 text-gray-500 text-sm md:text-base">
                        {{-- <h3 class="text-lg sm:text-2xl font-semibold inline tracking-wide primary-black-color">
                            {{ $data['News']->heading_content }}</h3> --}}
                        {{-- <div class="mt-4 leading-loose dynamic-data">{{ $data['News']->short_content }}</div> --}}
                        <div class="leading-loose dynamic-data">
                            {!! $data['News']->full_content !!}
                        </div>

                    </div>
                </div>

                <div class="right-col related-resources mt-12 lg:mt-0 xl:w-3/12">
                    <h2 class="leading-snug font-semibold text-xl sm:text-3xl">Related News</h2>
                    <div class="related-news-wrapper grid sm:grid-cols-2 md:grid-cols-3 gap-3 lg:gap-6 lg:grid-cols-1 mt-5">
                        @foreach ($data['RelatedNews'] as $key => $related)
                            <a href="{{ route('frontend.resources.news.list', $related->slug) }}"
                                class="related-news card relative overflow-hidden mt-4 border border-solid border-gray-200 p-2 text-gray-500 text-sm md:text-base">
                                <span
                                    class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                                <span
                                    class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                                <span
                                    class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                                <span
                                    class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                                <div class="related-news-img-wrapper relative overflow-hidden w-full h-auto">
                                    <img class="w-full lazy-img absolute top-0 left-0 w-full h-full"
                                        data-src="{{ asset('up_data/news/' . $related['image']) }}"
                                        alt="recent-resouce" />
                                </div>
                                <div class="related-news-title mt-2 leading-snug">{{ $related['name'] }}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
 </div>
