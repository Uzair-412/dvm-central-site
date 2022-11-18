<div>
    <div class="cart-container-inner-wrapper flex flex-col w-full overflow-x-hidden overflow-y-scroll">
        <div class="cart-items-container h-full" style="width: 400px; max-width: 95vw;">
            <h2
                class="text-2xl font-semibold p-2 sm:p-4 border-b border-gray-300 border-solid flex justify-between items-center">
                <span>Cart</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer cart-close-btn transition-all duration-300 ease-in-out" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </h2>
            <div id="cart-items-header" style="max-width: 100%;">
                @if(count($miniCart) > 0)
                @foreach($miniCart as $key => $values)
                @php
                    $price = $values['attributes']['discount'] > 0 ? $values['attributes']['price_discounted'] :
                    $values['price'];
                @endphp
                    <a href="{{ $values['attributes']['link'] }}"
                        class="cart-item flex justify-between p-4 border-b border-solid border-gray-300 relative transition-all duration-300 ease-in-out hover:bg-gray-50">
                        <img class="mr-2 w-16" src="{{ $values['attributes']['image'] }}" alt="{{ $values['name'] }}" />
                        <div class="cart-item-detail-wrapper flex flex-col mx-1 mr-auto">
                            <div
                                class="cart-item-description text-black transition duration-300 ease-in-out">
                                {{ $values['name'] }}</div>
                            <div class="cart-item-price mr-1 text-sm lite-blue-color">{{ (int)$values['quantity'] }} x
                                ${{ (float)$price }}</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="delete-cart-item"
                            wire:click.prevent="removeCart({{ (int)$values['id'] }})" fill="none" viewBox="0 0 24 24"
                            stroke="#E14747">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endforeach
                @else
                    <h3 class="text-center text-red-500 mt-2" style="min-width: 250px;">Your cart is empty!</h3>
                @endif

            </div>
        </div>
    </div>
    <div
        class="subtotal-detail-wrapper bg-white border-t border-solid border-gray-300 w-full p-2 sm:p-4 relative flex flex-col justify-center">
        @if(count($miniCart) > 0)
        <h3 class="text-lg flex justify-between items-center font-semibold">
            <span>Subtotal</span>
            <span class="lite-blue-color mini-cart-total">${{ number_format($subTotal,2) }}</span>
        </h3>
        <div class="cart-cont-btn-wrapper flex justify-between mt-2 sm:mt-4">
            <a href="{{ route('frontend.cart.index') }}"
                class="btn blue-btn relative overflow-hidden lite-blue-bg-color text-white px-4 py-2 z-10 mr-2">
                View Cart </a>

            <a href="{{ route('frontend.checkout') }}"
                class="btn black-btn bg-black relative overflow-hidden text-white px-4 py-2 z-10"> Checkout
            </a>
        </div>
        @endif
    </div>
    <script>
        // cart container
        window.addEventListener('update_mini_cart', function(e){
            miniCartScript();
        });

        function miniCartScript()
        {
            let cartContainer = document.querySelector('.cart-container'),
                cartWrapper = document.querySelector('.cart-container-wrapper'),
                cartClsBtn = document.querySelectorAll('.cart-close-btn, .cart-close-btn path, .cart-container'),
                cartOpenBtn = document.querySelectorAll('.nav-cart-icon-wrapper');

            cartOpenBtn.forEach((btn) => {
                btn.addEventListener('click', () => {
                    cartContainer.classList.remove('hidden');
                    cartContainer.classList.remove('opacity-0');
                    document.body.classList.add('body-height');
                    setTimeout(() => {
                        cartWrapper.classList.add('show-nav');
                    }, 100);
                });
            });

            window.addEventListener('click', (e) => {
                cartClsBtn.forEach((btn) => {
                    if (e.target === btn) {
                        cartWrapper.classList.remove('show-nav');
                        setTimeout(() => {
                            cartContainer.classList.add('opacity-0');
                            cartContainer.classList.add('hidden');
                            document.body.classList.remove('body-height');
                        }, 300);
                    }
                });
            });
        }
        miniCartScript();
    </script>
</div>