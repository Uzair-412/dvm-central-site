<script>
    var array = JSON.parse(window.localStorage.getItem("viewed_products"));
    if(array){
        document.write(`
            <section class="orders-you-like pt-10">
                <div class="orders-you-like-wrapper width">
                    <div class="orders-you-like-title-wrapper flex justify-between items-end gap-4">
                        <h3 class="deal-title text-2xl font-semibold inline tracking-wide primary-black-color">Order From What You Like</h3>
                        <a href="{{ url('products/order-you-like') }}" class="bubble-anchors relative text-xs sm:text-base text-white text-center">View All</a>
                    </div>
                <div class="orders-you-like-imgs-wrapper pt-6 pb-12 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6" id="viewed_products"></div>
            </section>
        `);
    }
</script>