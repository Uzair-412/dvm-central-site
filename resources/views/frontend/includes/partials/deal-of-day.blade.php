<div class="ps-deal-of-day">
    <div class="ps-container">
        <div class="ps-section__header p-3" style="background-color: #f4f4f4;     align-items: center;">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>Deals of the day</h3>
                </div>
                {{-- <div class="ps-block__right">
                    <figure>
                        <figcaption>End in:</figcaption>
                        <ul class="ps-countdown" data-time="December 30, 2021 15:37:25">
                            <li><span class="days"></span></li>
                            <li><span class="hours"></span></li>
                            <li><span class="minutes"></span></li>
                            <li><span class="seconds"></span></li>
                        </ul>
                    </figure>
                </div> --}}
            </div><a href="{{ url('products/today-deals') }}">View all</a>
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($data['deals_of_the_day'] as $product)
                    {!! \App\Models\Product::productBlock($product, 'deals_of_the_day') !!}
                @endforeach
            </div>
        </div>
    </div>
</div>