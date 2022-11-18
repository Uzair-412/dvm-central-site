<div>
    <section class="hot-selling-items pt-10">
        <div class="hot-selling-items-wrapper width">
            <div class="hot-selling-items-title-wrapper flex gap-4 justify-between items-end">
                <h3 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color w-max">Special Offers</h3>
                <a href="{{ url('products/special-offer') }}" class="bubble-anchors relative text-xs sm:text-base text-white self-end text-center">View All</a>
            </div>
            @livewire('frontend.products.products-list', ['products_list'=>$featured_products, 'type'=>'landscape',
            'caption' => 'Featured!', 'allowCaption'=>true])
        </div>
    </section>
</div>
