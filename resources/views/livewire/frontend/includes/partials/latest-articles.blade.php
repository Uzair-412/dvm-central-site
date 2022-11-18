<div>
    <!-- latest articles -->
    @if(count($articles) > 0)
        <section class="latest-articles pt-20">
            <div class="latest-articles-wrapper width">
                <div class="latest-articles-title-wrapper flex justify-between items-end gap-4">
                    <h3 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color">Latest Articles</h3>
                    <a href="{{ route('frontend.blog') }}" class="bubble-anchors relative text-xs sm:text-base text-white text-center">View All</a>
                </div>

                <div class="blogs-imgs-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 pt-6 gap-4 xl:gap-6">
                    @foreach ($articles as $article)
                        <a href="{{url('blog').'/'.$article->slug }}" class="blog p-2 text-center flex flex-col items-center card relative overflow-hidden bg-white border border-solid border-gray-200">
                        <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                        <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                        <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                        <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
                        <div class="img border-b border-solid border-gray-200 pb-2">
                            <img class=lazyload data-src="{{ asset('up_data/blog/'.$article->image_thumbnail) }}" data-srcset="{{ asset('up_data/blog/'.$article->image_thumbnail) }}"
                                sizes="(max-width:576px) 100%, (max-width: 1024px) 350px, (max-width: 1440px) 276px, 315px" alt="How to treat your dog" />
                        </div>
                        <h3 class="font-semibold lite-blue-color text-center text-base md:text-lg mt-4">{{ $article->name }}</h3>
                        @php
                            $string = strip_tags($article->short_content);
                            $length = 100;
                            if (strlen($string) > $length) {

                                // truncate string
                                $stringCut = substr($string, 0, $length);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '...';
                            }
                        @endphp
                        <p class="mt-2 text-gray-500 leading-normal text-sm md:text-base">{{ $string }}</p>
                        <div class="post-date mt-2 text-gray-500">{{ date('d-m-Y',strtotime($article->publish_date)) }}</div>

                    </a>
                    @endforeach
                </div>

            </div>
        </section>
    @endif
</div>
